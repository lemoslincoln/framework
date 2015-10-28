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
		<div class="container">
			<p> © Copyright <?php echo date('Y') ?> - <?php bloginfo('name'); ?> - Todos direitos reservados</p>
		</div>
		<a href="http://bigodesign.com.br" target="_blank" id="bigo" title="Feito com espuma de barbear!"> Desenvolvido por <strong>BIGO Design</strong></a>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
