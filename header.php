<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="<?php echo get_template_directory_uri()	?>/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>
</head>

<body <?php body_class(); ?>>

	<header id="header">			
			<section class="container">
				<section class="col-xs-8">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo of_get_option('logo_header', 'no entry'); ?>" /></a>
					
					<section class="row">						
						<nav id="navmenu" class="navbar navbar-default" role="navigation">
						  <!-- Brand and toggle get grouped for better mobile display -->
						  <div class="navbar-header">
						    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						      <span class="sr-only">Toggle navigation</span>
						      <span class="icon-bar"></span>
						      <span class="icon-bar"></span>
						      <span class="icon-bar"></span>
						    </button>
						    <a class="navbar-brand hidden-lg hidden-md" href="#">Menu</a>
						  </div>

					    	<?php 
					    		wp_nav_menu( array( 
					    		'container' => 'div',
					    		'menu_class' => 'nav navbar-nav',
					    		'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
					    		'theme_location' => 'global'
					    		) ); 
					    	?>		    
						  </div><!-- /.navbar-collapse -->
						</nav>
					</section>
				</section>
			</section>
	</header>



