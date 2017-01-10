<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
	<main id="content" class="container" role="main">
		<section class="row">
			<div class="col-sm-12">
				<h1><?php printf( __( 'Resultado da busca por: %s', 'twentyten' ), '' . get_search_query() . '' ); ?></h1>
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<article <?php post_class(); ?>>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<figure>
								<?php the_post_thumbnail( 'post-thumb', array( 'class' => 'img-responsive' ) ); ?>
							</figure>
						</a>
						<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>"><h2><?php the_title(); ?></h2></a>

						<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
						<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
						<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>

						<?php the_excerpt(); ?>
					</article>
				<?php endwhile; ?>

				<?php else: ?>
					<article>
						<h2><?php _e( 'Desculpe, nenhum post encontrado.', 'angolanos' ); ?></h2>
					</article>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</section>
	</main>
<?php get_footer(); ?>
