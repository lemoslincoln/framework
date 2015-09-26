<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>

<section id="content" class="container">
		
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article <?php post_class('container' ); ?> >
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				
				<section>
					<?php the_content(); ?>
				</section>
				
				<footer>
					<?php comments_template( '', true ); ?>
				</footer>

			</article>
		<?php endwhile; // end of the loop. ?>
			
	</section> <!-- #content -->
<?php get_footer(); ?>
