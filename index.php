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
	<main role="main" class="container">
		<section class="row">

			<div class="col-sm-12">
				<h1>Título da seção</h1>
			</div>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<article <?php post_class(); ?>>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<figure>
							<?php the_post_thumbnail( 'post-thumb', array( 'class' => 'img-responsive' ) ); ?>
						</figure>
					</a>
					<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>"><h2><?php the_title(); ?></h2></a>

					<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
					<span class="author"><?php _e( 'Publicado por', 'angolanos' ); ?> <?php the_author_posts_link(); ?></span>
					<span class="comments"><?php comments_number( '0 comentário', '1 comentário', '% comentários' ); ?></span>

					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>

			<?php else: ?>
				<article>
					<h2><?php _e( 'Desculpe, nenhum post encontrado.', 'angolanos' ); ?></h2>
				</article>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		</section>
	</main>
<?php get_footer(); ?>
