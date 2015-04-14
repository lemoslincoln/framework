<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
	<section class="container">
		<section class="row">
			<section class="col-sm-12">
				<?php while( have_posts() ): the_post(); ?>
					<h1><?php
						printf( __( 'Categoria: %s', 'twentyten' ), '' . single_cat_title( '', false ) . '' );
					?></h1>
				<?php the_content(); ?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</section>
		</section>
	</section>
<?php get_footer(); ?>
