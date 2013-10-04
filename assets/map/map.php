<?php 

// Mapa 

// Shortcode wpmap_map
function wpmap_map() {  

  	/** Styles **/
  	wp_register_style('wptuts-style', get_template_directory_uri() . '/assets/map/map.css', '', '', false);
  	wp_enqueue_style ('wptuts-style');

    wp_register_script('google-maps', 'http://maps.google.com/maps/api/js?sensor=false&language=pt-BR');  
    wp_enqueue_script('google-maps');  
  
    wp_register_script('wptuts-custom', get_template_directory_uri() . '/assets/map/map.js', array( 'jquery'), '', true);  
    wp_enqueue_script('wptuts-custom');  
  
    $output = sprintf(  
        '<div id="map-container" data-map-infowindow="%s" data-map-zoom="%s"></div>',  
        of_get_option('maps_info', 'no entry'),  
        '17' 
    );  
  
    return $output;  
}  
add_shortcode('wpmap_map', 'wpmap_map');  




// Shortcode wpmap_directions
function wpmap_directions() {  
  
    $output = '<div id="dir-container" class="" ></div>';  
    return $output;  
  
}  
add_shortcode('wpmap_directions_container', 'wpmap_directions');


// Shortcode wpmap_input
function wpmap_directions_input(){

    $address_to = "-16.693027,-49.235046";

	
    $output = '
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

    return $output;
}
add_shortcode('wpmap_directions_input', 'wpmap_directions_input');

?>