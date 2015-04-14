<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<section class="container">
		<section class="row">
			<section class="col-sm-12">
				<h1><?php printf( __( 'Resultado da busca por: %s', 'twentyten' ), '' . get_search_query() . '' ); ?></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
								?>
				<?php else : ?>
				<h2><?php _e( 'Nada encontrado.', 'twentyten' ); ?></h2>
				<p><?php _e( 'Desculpe, mas nada combina com seus critérios de pesquisa. Por favor, tente novamente com algumas palavras-chave diferentes.', 'twentyten' ); ?></p>
				<?php get_search_form(); ?>
				<?php endif; ?>
			</section>
		</section>
	</section>
<?php get_footer(); ?>
