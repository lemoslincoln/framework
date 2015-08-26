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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
			<section class="row">

				<section class="col-sm-3">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php $image = get_field('logotipo', 'option'); echo $image['url']; ?>" />
					</a>
				</section>

				<section class="col-sm-7">						
					<nav id="navmenu" class="navbar navbar-default" role="navigation">
					  <div class="navbar-header">
					    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".menu-retratil">
					      <span class="sr-only">Toggle navegação</span>
					      <span class="icon-bar"></span>
					      <span class="icon-bar"></span>
					      <span class="icon-bar"></span>
					    </button>
					    <a class="navbar-brand visible-xs" href="#">Menu</a>
					  </div>
			    	<?php 
			    		wp_nav_menu( array( 
				    		'menu'              => 'principal',
    		        'theme_location'    => 'global',
    		        'depth'             => 2,
    		        'container'         => 'div',
    		        'container_class'   => 'collapse navbar-collapse menu-retratil',
    		        'menu_class'        => 'nav navbar-nav',
    		        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    		        'walker'            => new wp_bootstrap_navwalker()
			    		)); 
			    	?>    
					</nav><!-- /.navbar-collapse -->		
				</section>
				
				<section class="col-sm-2">
					<?php if( have_rows('sociais_info','option') ): ?>
						<ul class="redes-sociais">
							<?php  while ( have_rows('sociais_info','option') ) : the_row(); ?>
								<li>
									<a href="<?php the_sub_field('url_info'); ?>" target="_blank">
										<?php the_sub_field('icone_info'); ?>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</section>
			</section>
		</section>
	</header>



