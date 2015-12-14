jQuery(document).ready(function($){
  function timePrevision(){
    $('.time-prevision li:nth-child(1)').remove();
    $('.time-prevision li:last-child').remove();
  }
  var domain = 'http://'+window.location.hostname + window.location.pathname;
  var cssURL = 'http://'+window.location.hostname+"/css";
  var scriptURL = 'http://'+window.location.hostname+"/js";

  function removeAccentuation(string) {
    var acentos = ["\u00e1", "\u00e0", "\u00e2", "\u00e3", "\u00f3", "\u00f2", "\u00f5", "\u00f4", "\u00ed", "\u00ec", "\u00ee", "\u00e9", "\u00e8", "\u00ea", "\u00fa", "\u00f9", "\u00fb", "\u00E7"],
      letras = ["a", "a", "a", "a", "o", "o", "o", "o", "i", "i", "i", "e", "e", "e", "u", "u", "u", "Ã§"];

    for (var len = letras.length, i = len - 1; i >= 0; i--) {
    //Improved Native For-Loop
    string = string.replace(acentos[i], letras[i]);
   }

   return string;
  }

  // PREVISÃƒO DO TEMPO
  if($('.time-prevision').length!=0){
    timePrevision();
  }

  // BANNER INDEX

    $.simpleWeather({
      zipcode: '',
      woeid: '455831',
      location: '',
      unit: 'c',
      distance: 'km',
      success: function(weather) {
        // html = '<p class="cidade">Goi&acirc;nia, GO</p>';
        //<span>atualizada &agrave;s '+weather.updated+'</span>
        // html += '<p class="previsao">Previs&atilde;o para hoje </p>'
        html = '<div class="graficos">';
          // html += '<img width="125px" class="icone" src="'+weather.image+'">';
          html += '<div class="dados" style="background-image:url('+ weather.image +')">';
            html += '<div class="temp">Goi&acirc;nia, GO</div>';
            html += '<div class="condicao">Média de '+weather.temp+'&deg;C</div>';
            html += '<div class="condicao"><p class="min left">Min. '+weather.low+'</p><p class="minax left">Max. '+weather.high+'</p></div>';
            html += '<div class="informacoes clear"><ul><li title="Press&atilde;o" class="barometro">Barômetro: '+weather.pressure+'mb</li><li title="Vento" class="vento">Vento: '+weather.wind.speed+'kph</li><li title="Sol nascente" class="sunrise">Nascer-do-sol: '+weather.sunrise+'</li><li title="Umidade" class="humidade">Umidade: '+weather.humidity+'%</li><li title="Sol poente" class="sunset">Pôr-do-sol: '+weather.sunset+'</li></ul></div>';
          html += '</div>';
        html += '</div>';
        $("#weather #box").html(html);

      },
      error: function(error) {
        $("#weather #box").html('<p>'+error+'</p>');
      }
    });

    function addCity(cidade, estado){
      $estado = estado;
      $cidade = cidade;
    }
      $('.city-search').submit(function(){
        $.ajax({
            type: "GET",
            url: "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20geo.places%20where%20text%3D%22"+removeAccentuation($(this).find('[type="text"]').val())+"%22&format=xml",
            dataType: "xml",
            success: function (xml) {
              $('#city').html("");
              $('#city').css('display','block');
              // $('#city').append('<option>Selecione uma cidade abaixo:</option>');
                $(xml).find('place').each(function () {
                  var com = 1;
                    var name = $(this).find('name').text();
                    var country = $(this).find('country').text();
                    var estado = $(this).find('admin1').text();
                    var woeid = $(this).find('woeid').text();
                    $.getJSON(domain + "wp-content/themes/softagro/vendors/simpleWeather/cidades.json", function(data){  
                 $.each(data.estados, function(){  
                  if(removeAccentuation(this.nome)==estado){
                    estado = this.nome;
                    $cidades = JSON.stringify(this.cidades);
                    $cidades = JSON.parse($cidades);
                    $.each($cidades, function(a){
                      if(removeAccentuation($cidades[a])==name){
                        name = $cidades[a];
                        return false;
                      }
                    });
                    addCity(name, estado);
                    $('#city').append("<a href='#' class='list-group-item city-find' data-woeid='"+woeid+"' data-info='"+name+" / "+estado+"'>"+name+" / "+estado+'</a>');
                    return false;
                  }
                });  
            }); 
                });
            },
            error: function () {
                alert("Ocorreu um erro inesperado durante o processamento.");
            }
        });
        return false;
      })
    //http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20geo.places%20where%20text%3D%22Aparecida%22&format=xml

  $('.city-find').live('click',function(e){
    e.preventDefault();
    $.simpleWeather({
      zipcode: '',
      woeid: $(this).attr('data-woeid'),
      location: '',
      unit: 'c',
      distance: 'km',
      success: function(weather) {
        console.log(weather);
        html = '<div class="graficos">';
          // html += '<img width="125px" class="icone" src="'+weather.image+'">';
          html += '<div class="dados" style="background-image:url('+ weather.image +')">';
            html += '<div class="temp">'+ weather.city +', '+ weather.region +'</div>';
            html += '<div class="condicao">Média de '+weather.temp+'&deg;C</div>';
            html += '<div class="condicao"><p class="min left">Min. '+weather.low+'</p><p class="minax left">Max. '+weather.high+'</p></div>';
            html += '<div class="informacoes clear"><ul><li title="Press&atilde;o" class="barometro">Barômetro: '+weather.pressure+'mb</li><li title="Vento" class="vento">Vento: '+weather.wind.speed+'kph</li><li title="Sol nascente" class="sunrise">Nascer-do-sol: '+weather.sunrise+'</li><li title="Umidade" class="humidade">Umidade: '+weather.humidity+'%</li><li title="Sol poente" class="sunset">Pôr-do-sol: '+weather.sunset+'</li></ul></div>';
          html += '</div>';
        html += '</div>';
        // console.log(html);
        $("#weather #box").html(html);
        $('#city').css('display','none');
      },
      error: function(error) {
        $("#weather #box").html('<p>'+error+'</p>');
      }
    });
  });


});
