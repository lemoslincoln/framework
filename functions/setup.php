<?php

/*
[SETUP]
#S001 : Filtro 
#S002 : 

*/


// Avisa ao Wordpress para executar a função twentyten_setup()
// quando o 'after_setup_theme' hook roda.
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):

	// Configura os padrões do tema e suporte a algumas funções do wp.
	function twentyten_setup() {

		// Ativa o editor-style.css
		add_editor_style('assets/css/editor-style.css');

		// Ativa a imagem destacada
		add_theme_support( 'post-thumbnails' );

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Registra os nav_menus
		register_nav_menus( array(
			'global' => __( 'Navegação Global', 'twentyten' ),
			'local' => __( 'Navegação Local', 'twentyten' ),
		) );

}
endif;


/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 * @since Twenty Ten 1.0
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */
function twentyten_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'twentyten' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'twentyten_filter_wp_title', 10, 2 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );


/**
 * Limite do excerpt
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function twentyten_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return ' <a href="'. get_permalink() . '" title="Veja mais sobre '. get_the_title() .'">' . __( 'Saiba mais', 'twentyten' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
 *
 * @since Twenty Ten 1.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );


/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Sidebar', 'twentyten' ),
		'id' => 'sidebar-principal',
		'description' => __( 'Arraste os itens desejados até aqui. ', 'twentyten' ),
		'before_widget' => '<div class="widget %2$s" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 style="display:none;">',
		'after_title' => '</h2>',
	) );

}

/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );


/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */
if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
    $optionsframework_settings = get_option('optionsframework');
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    if ( get_option($option_name) ) {
        $options = get_option($option_name);
    }
    if ( isset($options[$name]) ) {
        return $options[$name];
    } else {
        return $default;
    }
}
}



/* Carrega Arquivos JS do tema */
/* ----------------------------------------- */
function bigo_load_scripts(){
  if (!is_admin()){
            
		// desregistrando o jquery nativo e registrando o do CDN do Google.
		// wp_deregister_script('jquery');
		// wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
		wp_enqueue_script('jquery');	

		// Os demais js
		$link = get_template_directory_uri() . '/assets/';
		// wp_enqueue_script('moderniz', $link . 'jslib/modernizr-2.7.1.min.js', ['jquery']);
		wp_enqueue_script('jsbootstrap', $link . 'js/bootstrap.min.js', ['jquery']);
		wp_enqueue_script('offcanvas', $link . 'js/bootstrap.offcanvas.min.js', ['jquery']);
		wp_enqueue_script('slick', $link . 'slick/slick.min.js', ['jquery']);
		wp_enqueue_script('acf-maps', $link . 'js/maps.js', ['jquery']);
		wp_enqueue_script('mask', $link . 'js/jquery.mask.min.js', ['jquery']);
		
		// simpleWeather
		// wp_enqueue_script('simpleweather', $link. '/vendors/simpleWeather/jquery.simpleWeather-2.3.min.js', ['jquery']);
		// wp_enqueue_script('tempo-script', $link. '/vendors/simpleWeather/tempo-script.js', ['jquery'] 'simpleweather'));
		
		wp_enqueue_script('codigo', get_template_directory_uri(). '/assets/js/codigo.js', array('jquery'));
  }
}
add_action( 'wp_print_scripts', 'bigo_load_scripts' );

/* Carrega Scripts/Styles para o Fancybox */
/* ----------------------------------------- */
function angolanos_add_fancybox() {
  wp_enqueue_script( 'fancybox-js', get_template_directory_uri() . '/vendors/fancybox/jquery.fancybox.pack.js', array( 'jquery' ), '2.1.5', true );	    
  wp_enqueue_style( 'fancybox-css', get_template_directory_uri() . '/vendors/fancybox/jquery.fancybox.css' );
}
add_action( 'wp_enqueue_scripts', 'angolanos_add_fancybox' );


/* Carrega Arquivos CSS do tema */
/* ----------------------------------------- */
function bigo_load_css(){ 
	// Carrega o arquivo em todas as páginas
	wp_enqueue_style( 'offcanvas', get_template_directory_uri() . '/assets/css/bootstrap.offcanvas.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick/slick.css' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css' );
	wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', false, '4.6.3');

}
add_action('wp_enqueue_scripts', 'bigo_load_css');



/* Adiciona editor se usuário for editor no body-class */
/* --------------------------------------------------- */
function role_user_body_class( $classes ) {
	if( current_user_can('editor') ) { $classes .= ' editor'; }
  return trim( $classes );
}
add_filter( 'admin_body_class', 'role_user_body_class' );

function bigo_get_images($size = 'thumbnail') {
  global $post;
  return get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order') );
}




/* Cria páginas ao instalar o tema */
/* ----------------------------------------- */
// programmatically create some basic pages, and then set Home and Blog
// setup a function to check if these pages exist
function the_slug_exists($post_name) {
	global $wpdb;
	if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
		return true;
	} else {
		return false;
	}
}

$paginas = [
	// [Title, Content, 'Slug']
	['Home', '', 'home'],
	['Blog', '', 'blog'],
	['Institucional', '', 'institucional'],
	['Fale Conosco', '', 'fale-conosco'],

];
// Cria as páginas
if (isset($_GET['activated']) && is_admin()){
		foreach ($paginas as $pagina) {
			$page_check = get_page_by_title($pagina[0]);
			if(!isset($page_check->ID) && !the_slug_exists($pagina[2])){
			    $newPageId = wp_insert_post(array(
			    	'post_type' => 'page',
			    	'post_title' => $pagina[0],
			    	'post_content' => $pagina[1],
			    	'post_status' => 'publish',
			    	'post_author' => 1,
			    	'post_slug' => $pagina[2]
			    ));
			    if ($pagina[0] == 'Home') { update_option( 'page_on_front', $newPageId ); update_option( 'show_on_front', 'page' ); }
			    if ($pagina[0] == 'Blog') { update_option( 'page_for_posts', $newPageId ); }
			}	
		}
}

/* ----------------------------------------- Cria páginas ao instalar o tema */		

/* 
	Filtro para criar container responsivo nos embeds do the_content
	Style no @angolanos-default-styles.less
/* ----------------------------------------- */
	add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);
	function wrap_embed_with_div($html, $url, $attr) {
	        return "<div class=\"responsive-container\">".$html."</div>";
	}
/* ----------------------------------------- Filtro para criar container responsivo nos embeds do the_content */		
