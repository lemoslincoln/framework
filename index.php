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
