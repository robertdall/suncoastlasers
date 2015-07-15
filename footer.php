<?php
/**
 * The template for displaying the footer.
 * 
 * @package blm_basic
 */
?>
	<footer id="footer">
		<div class="wrap">
			<h4><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h4>
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		
		
			<p class="copyright">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></p>
			<p class="copyright">&ndash; Web Design <a href="http://robertdall.com/">Robert Dall</a> </p>
		</div> <!-- #wrap --> 
	</footer>
	
<?php wp_footer(); ?>
</body>
</html>