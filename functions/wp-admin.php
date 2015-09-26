<?php

/* Mudar Icone dos Menus do WP */
/* ----------------------------------------- */
  // Pegar o unicode na url -> http://fontawesome.bootstrapcheatsheets.com/
  // add_action('admin_head', 'fontawesome_icon_dashboard');
  function fontawesome_icon_dashboard() {
     echo "<style type='text/css' media='screen'>
        #adminmenu #menu-posts-produto div.wp-menu-image:before { font-family:'FontAwesome' !important; content:'\\f0a4'; }  
     </style>";
  }

/* ----------------------------------------- Mudar Icone do CPT */    


/* Desativa as Widgets padrões do Dashboard */
/* ----------------------------------------- */

  function disable_default_dashboard_widgets() {

    remove_meta_box('dashboard_browser_nag', 'dashboard', 'core');
    remove_meta_box('dashboard_right_now', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');

    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
    remove_meta_box('dashboard_primary', 'dashboard', 'core');
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');
  }
  add_action('admin_menu', 'disable_default_dashboard_widgets');
  

/* Carrega Arquivos CSS no Admin */
/* ----------------------------------------- */
  
  function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
  }
  add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


//Insere o arquivo CSS com seus estilos personalizados para a tela de login
add_action( 'login_head', 'wpmidia_custom_login' );
function wpmidia_custom_login() {
    echo '<link media="all" type="text/css" href="'.get_template_directory_uri().'/assets/css/login-style.css" rel="stylesheet">';
}

//Altera a URL que fica no logo, fazendo com que ao clicarmos nele, sejamos levados para a home do nosso site
add_filter('login_headerurl', 'wpmidia_custom_wp_login_url');
function wpmidia_custom_wp_login_url() {
  return home_url();
}

//Altera o título do logo, fazendo com que ao passarmos o mouse sobre o logo, apareça o nome do nosso site
add_filter('login_headertitle', 'wpmidia_custom_wp_login_title');
function wpmidia_custom_wp_login_title() {
  return get_option('blogname');
}


/* Adiciona o ID do usuário no body-class */
/* ----------------------------------------- */
function id_usuario_body_class( $classes ) {
  global $current_user;
    $classes .= ' user-' . $current_user->ID;
  return trim( $classes );
}
add_filter( 'admin_body_class', 'id_usuario_body_class' );

