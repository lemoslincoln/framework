<?php 

// Mapa 

// Shortcode wpmap_map
function bigo_mapa() {  

  	/** Styles **/
  	wp_register_style('wptuts-style', get_template_directory_uri() . '/assets/map/map.css', '', '', false);
  	wp_enqueue_style ('wptuts-style');

    wp_register_script('google-maps', 'http://maps.google.com/maps/api/js?sensor=false&language=pt-BR');  
    wp_enqueue_script('google-maps');  
  
    wp_register_script('wptuts-custom', get_template_directory_uri() . '/assets/map/map.js', array( 'jquery'), '', true);  
    wp_enqueue_script('wptuts-custom');  
    
    $page_ID = get_the_id(); 
    $address_to = get_field('geolocalizacao_mapa', $page_ID);
    $output = '
      <section id="mapa">
          <span id="comochegar">
            <a href="#" onclick="WPmap.getDirections(\'geo\'); return false" class="map-button">Clique aqui e saiba como chegar a compasso a partir da sua localização atual </a>
          </span>
          
      ';
    $output .= '<div id="dir-container" class="" ></div>';  
    $output .= '
        <div id="geo-directions" class="hidden">
         <span  style="display:none;" id="native-link"> </span>
        </div>
    
          <div id="directions">
                  <input  style="display:none;" id="from-input" type="text" value="" size="20" placeholder="Digite seu endereço aqui" />
                  <select style="display:none;" onchange="" id="unit-input">
                      <option value="metric" selected="selected">Km</option>
                      <option value="imperial" >Milha</option>
                  </select>
                  <a  style="display:none;" class="semfade" href="#" onclick="WPmap.getDirections(\'manual\'); return false" class="map-button">Calcular Rota</a>
                  <br  style="display:none;" />
                  <input style="display:none;" id="map-config-address" type="hidden" value="' . $address_to . '"/>
               </div>
               ';

    $output .= sprintf(  
        '<div id="map-container" data-map-infowindow="%s" data-map-geo="%s" data-map-icon="%s"  data-map-title="%s" data-map-zoom="%s"></div>',  
        get_field('informacao_mapa', $page_ID),  
        $address_to,  
        get_field('icone_mapa', $page_ID),  
        get_bloginfo('name'),
        '17' 
    );
    $output .= '</section>';
  
    return $output;  
}  
add_shortcode('bigo_mapa', 'bigo_mapa');  
?>