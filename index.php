<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
	<!-- banner -->
	<article class="container" role="banner">
		<section class="row">
			<?php if( have_rows('slider_principal','option') ): ?>
				<section class="banner">
					<?php  while ( have_rows('slider_principal','option') ) : the_row();
					
					  $image = get_sub_field('imagem_slider');
					  $url = $image['url'];
					
					  $size = 'banner-topo';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
					?>
					
						<div>
							<section class="banner-mask">
								<h4><?php the_sub_field('titulo_slider'); ?></h4>
								<p><?php the_sub_field('descricao_slider'); ?></p>
								<a href="<?php the_sub_field('link_slider'); ?>">Leia mais...</a>
							</section>
							
							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="img-responsive" />
						</div>
					  
					<?php endwhile; ?>
				</section>
			<?php endif; ?>
		</section>
	</article>
	<!-- banner end -->
	
	<section class="container">
		<section class="row">
			<section class="col-sm-12">
				<?php while( have_posts() ): the_post(); ?>
					<?php the_title(); ?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</section>
		</section>
	</section>
<?php get_footer(); ?>
