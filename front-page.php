<?php
/**
 * This template will be used to display page content.
 *
 * @package blm_basic
 */

get_header(); ?>

<div id="main">

	<div id="wrap">
		<section id="content">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<h1><?php the_title(); ?></h1>
			
				<?php the_excerpt(); ?>
				
				<?php the_content(); ?>
				
			</article>
			
			<?php endwhile; endif; ?>
			
		</section><!-- #content -->
	</div><!-- #wrap -->	

</div><!-- #main -->

<?php get_footer(); ?>