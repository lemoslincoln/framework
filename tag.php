<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
	<section class="container">
		<section class="row">
			<section class="col-sm-12">
				<h1><?php printf( __( 'Tags: %s', 'twentyten' ), '' . single_tag_title( '', false ) . '' ); ?></h1>
				<?php while( have_posts() ): the_post(); ?>
				<?php the_title(); ?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</section>
		</section>
	</section>
				

<?php get_sidebar(); ?>
<?php get_footer(); ?>
