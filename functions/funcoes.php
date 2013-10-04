<?php
/*
[Menu]
#0001 : Desativa as Widgets do Dashboard (inicio) 
#0002 : Carrega Arquivos CSS no Admin
#0003 : Inseri imagem padrão facebook og:image
	
*/

/* 0001 - Desativa as Widgets do Dashboard */
/* ----------------------------------------- */

	// Desativa os itens do painel inicio do wordpress
	// Disable Default Dashboard Widgets
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
	
/* ----------------------------------------- 0001 - Desativa as Widgets do Dashboard */		

/* 0002 - Carrega Arquivos CSS no Admin */
/* ----------------------------------------- */
	
	function load_custom_wp_admin_style() {
	        wp_register_style( 'custom_wp_admin_css', get_bloginfo( 'stylesheet_directory' ) . '/assets/css/admin-style.css', false, '1.0.0' );
	        wp_enqueue_style( 'custom_wp_admin_css' );
	}
	add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/* ----------------------------------------- 0002 - Carrega Arquivos CSS no Admin */	


/* 0003 - Inseri imagem padrão facebook og:image */
/* ----------------------------------------- */
	
	function insert_image_src_rel_in_head() {
		global $post;

		if ( !is_singular()) //if it is not a post or a page
			return;
		if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
			$default_image= get_bloginfo('template_directory') ."/images/padrao-facebook.jpg"; //replace this with a default image on your server or an image in your media library
			echo '<meta property="og:image" content="' . $default_image . '"/>';
		}
		else{
			$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-facebook' );
			echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
		}
	}
	add_action( 'wp_head', 'insert_image_src_rel_in_head', 5 );


/* ----------------------------------------- 0003 - Inseri imagem padrão facebook og:image */	
