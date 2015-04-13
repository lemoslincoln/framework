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
			<section class="row">
				<section class="col-sm-12">
					<p> Copyright <?php echo date('Y') ?> - <?php bloginfo('name'); ?> - Todos direitos reservados</p>
				</section>
			</section>
		</section>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
