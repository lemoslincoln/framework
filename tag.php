<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
	<section id="content" class="container">
		<div class="row">
			<div class="col-sm-8">
				<article <?php post_class('container' ); ?> >
					<h1><?php printf( __( 'Tags: %s', 'twentyten' ), '' . single_tag_title( '', false ) . '' ); ?></h1>
					
					<?php if ( have_posts() ):  ?>
						
						<?php while( have_posts() ): the_post(); ?>
							<article <?php post_class(); ?>>
								<?php the_title(); ?>
							</article>
						<?php endwhile; ?>

					<?php else: ?>
							<h2>Nenhum post encontrado.</h2>
					<?php endif; ?>
				</article>
			</div> <!-- col-sm-8 -->
			
			<?php get_sidebar(); ?>
			
		</div> <!-- row -->
	</section> <!-- #content -->
<?php get_footer(); ?>