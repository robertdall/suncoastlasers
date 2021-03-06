<?php
/**
 * BLM Basic Starter Theme functions and definitions
 *
 * @package blm_basic
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'blm_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blm_theme_setup() {


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/* Add theme support for visual editor with editor-style.css */
 	add_editor_style();

	// Add theme support for post thumbnails (featured images). 
	add_theme_support( 'post-thumbnails' );

	// Add theme support for menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'blm_basic' ),
		'footer' =>__('Footer Menu','blm_basic'),
	) );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );	
	
}
endif; // blm_theme_setup
add_action( 'after_setup_theme', 'blm_theme_setup' );

/**	
 *	Adds excerpt to pages 
 *	rd - June 28 
 */

add_action( 'init', 'excerpts_in_pages' );
function excerpts_in_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

/**
 * Register widget area
 */

function blm_widgets_init() {
	register_sidebar( array(
		'id' => 'primary',
		'name' => __( 'Primary Sidebar', 'blm_basic' ),
		'description' => __( 'The following widgets will appear in the main sidebar div.', 'blm_basic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	) );
	register_sidebar( array(
		'id' => 'front-sidebar',
		'name' => __( 'Front Page', 'blm_basic' ),
		'description' => __( 'The following widgets will appear on the front page div.', 'blm_basic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'blm_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function blm_basic_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Raleway:400,300,600' );

	wp_enqueue_script( 'blm_navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'blm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blm_basic_scripts' );


/**
 * Set up title if SEO plugin is not used
 */

function blm_basic_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'blm_basic' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'blm_basic_wp_title', 10, 2 );

/**
 * Removes unuseful Widgets 
 */
 function blm_remove_default_widgets() {
     unregister_widget('WP_Widget_Meta');
     unregister_widget('WP_Widget_Text');
     unregister_widget('WP_Widget_Recent_Comments');
     unregister_widget('WP_Widget_Tag_Cloud');
     unregister_widget('Akismet_Widget');
 }
 add_action('widgets_init', 'blm_remove_default_widgets', 11);
 
/**
 * Clear short code
 */ 

function clearClass() {
    return '<div class="clear">&nbsp;</div>';
}

add_shortcode('clear', 'clearClass');

/**
 * Hide email from Spam Bots using a shortcode.
 *
 * @param array  $atts    Shortcode attributes. Not used.
 * @param string $content The shortcode content. Should be an email address.
 *
 * @return string The obfuscated email address. 
 */
function blm_hide_email_shortcode( $atts , $content = null ) {
	if ( ! is_email( $content ) ) {
		return;
	}

	return '<a href="mailto:' . antispambot( $content ) . '">' . antispambot( $content ) . '</a>';
}
add_shortcode( 'email', 'blm_hide_email_shortcode', 12);



// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);	
