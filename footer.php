<?php
/**
 * The template for displaying the footer.
 * 
 * @package blm_basic
 */
?>
	<footer id="footer">
		<div class="wrap">
		 <div id="footer-left">
			<h4><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h4>
			<?php wp_nav_menu( array(	'theme_location' => 'footer', 
										'menu_class' => 'footer-menu' 
								) ); ?>
		</div>
		<div id="footer-right">
			<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/sailing-laser-class-symbol.png" alt="Laser Sailing Class Symbol" /></a>
		</div>
		
			<p class="copyright">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> &ndash; Web Design <a href="http://robertdall.com/">Robert Dall</a> </p>
		</div> <!-- #wrap --> 
	</footer>
	
<?php wp_footer(); ?>
</body>
</html>