<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
	<main id="content" class="container" role="main">
		<section class="row">
			<div class="col-sm-8">
				<h1><?php printf( __( 'Tags: %s', 'angolanos' ), '' . single_tag_title( '', false ) . '' ); ?></h1>
				<?php if ( have_posts() ):  ?>
					<?php while( have_posts() ): the_post(); ?>
						<article <?php post_class(); ?>>
							<?php the_title(); ?>
						</article>
					<?php endwhile; ?>

				<?php else: ?>
						<h2>Nenhum post encontrado.</h2>
				<?php endif; ?>
			</div> <!-- col-sm-8 -->
			
			<?php get_sidebar(); ?>
			
		</section> <!-- row -->
	</main> <!-- #content -->
<?php get_footer(); ?>