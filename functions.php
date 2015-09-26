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