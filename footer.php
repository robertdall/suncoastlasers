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
			<?php wp_nav_menu( array(	'theme_location' => 'footer', 
										'menu_class' => 'footer-menu' 
								) ); ?>
			<img class="laser-symbol" src="<?php echo get_template_directory_uri(); ?>/images/sailing-laser-class-symbol-200.png" alt="Laser Sailing Class Symbol" />
		
			<p class="copyright">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> </p>
			<p class="copyright">Web design donated by <a href="http://robertdall.com/">Robert Dall</a> ~ Hosting at <a rel="nofollow" href="http://www.site5.com/in.php?id=73296">Site5</a> ~ Powered by <a href="http://wordpress.org">WordPress</a> and the wind.</p>
		</div> <!-- #wrap --> 
	</footer>
	
<?php wp_footer(); ?>
</body>
</html>