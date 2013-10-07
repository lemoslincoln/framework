<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */
?>
	<footer id="footer">
		<section class="container">
			<section class="col-xs-8">
				<section id="copyright" class="row text-center">
						<p> Copyright <?php echo the_date('Y') ?> - <?php bloginfo('name'); ?> - Alguns direitos reservados</p>
				</section>
			</section>
		</section>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
