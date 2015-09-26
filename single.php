<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
<section id="content" class="container">
		<div class="row">
			<div class="col-sm-8">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<article <?php post_class('container' ); ?> >
						<header>
							<h1><?php the_title(); ?></h1>
							<?php twentyten_posted_on(); ?>
						</header>
						
						<section>
							<div class="conteudo">
								<?php the_content(); ?>
							</div>
							
							<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
								<div class="author-info">
									<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
									<h2><?php printf( esc_attr__( 'Sobre %s', 'twentyten' ), get_the_author() ); ?></h2>
									<?php the_author_meta( 'description' ); ?>
									<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'Ver todos posts de: %s &rarr;', 'twentyten' ), get_the_author() ); ?>
									</a>
								</div>
							<?php endif; ?>
							
						</section>
						
						<footer>
							<?php comments_template( '', true ); ?>
						</footer>

					</article>
				<?php endwhile; // end of the loop. ?>
			</div>

			<?php get_sidebar(); ?>
			
		</div> <!-- row -->
	</section> <!-- #content -->
<?php get_footer(); ?>
