<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link href="<?php echo get_template_directory_uri()	?>/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- google maps -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1P-H_fyEh6IaGS_mdIAPnMUIiQhKON2s"></script>
		<?php
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
			wp_head();
		?>

		<script> 
		var $buoop = {vs:{i:10,f:-4,o:-4,s:8,c:-4},unsecure:true,api:4}; 
		function $buo_f(){ 
		 var e = document.createElement("script"); 
		 e.src = "//browser-update.org/update.min.js"; 
		 document.body.appendChild(e);
		};
		try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
		catch(e){window.attachEvent("onload", $buo_f)}
		</script>
		
	</head>

	<body <?php body_class('body-offcanvas'); ?>>

		<header id="header">			
			<div class="container">
				<div class="row">

					<div class="col-sm-3">
						<a id="logotipo" class="logotipo logotipo-cabecalho" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php echo get_field('logotipo', get_option( 'page_on_front' )); ?>" class="img-responsive"/>
						</a>
					</div>

					<div class="col-sm-7">						
						<nav id="navmenu" class="navbar navbar-default" role="navigation">
						  <div class="navbar-header">
						    <a class="navbar-brand visible-xs" href="#">Menu</a>
		            <button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas" style="float:left;">
	                <span class="sr-only">Toggle navegação</span>
	                <span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                </span>
		            </button>
						  </div>
				    	<?php 
				    		wp_nav_menu( array( 
					    		'menu'              => 'principal',
	    		        'theme_location'    => 'global',
	    		        'depth'             => 2,
	    		        'container'         => 'div',
	    		        'container_class'   => 'navbar-offcanvas navbar-offcanvas-touch',
	    		        'container_id'  	  => 'js-bootstrap-offcanvas',
	    		        'menu_class'        => 'nav navbar-nav',
	    		        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	    		        'walker'            => new wp_bootstrap_navwalker()
				    		)); 
				    	?>    
						</nav><!-- /.navbar-collapse -->
					</div>
					
					<div class="col-sm-2">
						<?php get_template_part('partials/_social-links') ?>
					</div>
				</div>
			</div>
		</header>



