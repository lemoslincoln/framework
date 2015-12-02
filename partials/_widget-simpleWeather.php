<?php // Não mecher nas IDs ?>
<section id="tempo" class="col-xs-12 col-sm-6 col-lg-4">
  <?php /* Titulo com h4 */ 
  $titulo = 'Previsão do tempo';
  $link = '#';  
  echo '<a class="subtitle" target="_blank" href="'. $link .'" title="'.$titulo.'"> <h4>'. $titulo .' </h4> </a>'; ?>
    <div class="time-prevision">
        <div id="weather">
            <form class="form-inline city-search validacao">
                <button class="" type="submit">Buscar</button>
                <span>
                  <input type="text" class="input" placeholder="Qual sua cidade?">
                </span>
                
            </form>
            <div class="list-group" name="cidades" id="city" style="display:none;"></div>
            <div id="box"></div>
        </div>
    </div>
</section>