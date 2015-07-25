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
			<div <?php post_class() ?> id="excerpt">
				<?php the_content(); ?>
			</div>
			
			<div id="featured-image">
				<?php the_post_thumbnail(); ?>
			</div>
		</div> <!-- end .wrap -->
	</div>	<!-- end #blue-wrap -->
	<div class="wrap">
		<section id="content">				
			
			<?php
			// The Query
			$front_news = new WP_Query(
					array(
						 'category' => '1',
						 'posts_per_page' => '1',
						  ));
			// The Loop
			while ( $front_news->have_posts() ) : $front_news->the_post(); 
			?>

				<h3><a title="News about <?php the_title(); ?>" href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h3>
				
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<?php the_excerpt(); ?>
			</article>

		<?php  // Reset Post Data
			endwhile; wp_reset_postdata(); ?>

			<?php endwhile; endif; ?>
		</section><!-- #content -->
		<section id="front-sidebar">
		<?php if ( is_active_sidebar( 'front-sidebar' ) ) : ?>
				<ul id="sidebar">
			<?php dynamic_sidebar( 'front-sidebar' ); ?>
				</ul>
		<?php endif; ?>
		</section>
		
	</div><!-- #wrap -->	

</div><!-- #main -->

<?php get_footer(); ?>