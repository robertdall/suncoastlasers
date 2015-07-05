<?php
/**
 * This template will be used to display page content.
 *
 * @package blm_basic
 */

get_header(); ?>

<div id="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<!-- <h1><?php the_title(); ?></h1> -->
	<div id="blue-wrap">
		<div class="wrap">
			<div id="excerpt">
				<?php the_excerpt(); ?>
			</div>
			
			<div id="featured-image">
				<?php the_post_thumbnail(); ?>
			</div>
		</div> <!-- end .wrap -->
	</div>	<!-- end #blue-wrap -->
	<div class="wrap">
		<section id="content">				
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
				<?php the_content(); ?>
				
			</article>
			
			<?php endwhile; endif; ?>
			
		</section><!-- #content -->
	</div><!-- #wrap -->	

</div><!-- #main -->

<?php get_footer(); ?>