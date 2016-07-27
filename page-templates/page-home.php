<?php
/**
 * Template Name: Home
 *
 * A custom page template homepage.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
	<section id="content" class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<article <?php post_class('container' ); ?> >
						<header>
							<h1 class="page-title"><?php the_title(); ?></h1>
						</header>
						
						<section>
							<?php the_content(); ?>
						</section>
						
						<footer>
							<?php comments_template( '', true ); ?>
						</footer>

					</article>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div> <!-- row -->
	</section> <!-- #content -->
<?php get_footer(); ?>
