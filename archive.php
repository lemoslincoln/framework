<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>

<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>
	<section class="container">
		<section class="row">
			<section class="col-sm-12">
				<h1>
					<?php if ( is_day() ) : ?>
						<?php printf( __( 'Arquivos do dia: %s', 'twentyten' ), get_the_date() ); ?>
					<?php elseif ( is_month() ) : ?>
						<?php printf( __( 'Arquivos do mês: %s', 'twentyten' ), get_the_date('F Y') ); ?>
					<?php elseif ( is_year() ) : ?>
						<?php printf( __( 'Arquivos do ano: %s', 'twentyten' ), get_the_date('Y') ); ?>
					<?php else : ?>
						<?php _e( 'Arquivos', 'twentyten' ); ?>
					<?php endif; ?>
				</h1>
			</section>
		</section>
	</section>
<?php endif; ?>
<?php get_footer(); ?>
