<?php

/**
 * Jude functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Jude
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}
add_image_size('artists', 360, 410);
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jude_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Jude, use a find and replace
		* to change 'jude' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('jude', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'jude'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'jude_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'jude_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jude_content_width()
{
	$GLOBALS['content_width'] = apply_filters('jude_content_width', 640);
}
add_action('after_setup_theme', 'jude_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jude_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'jude'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'jude'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'jude_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function jude_scripts()
{
	wp_enqueue_style('jude-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('jude-style', 'rtl', 'replace');

	wp_enqueue_script('jude-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('jude-bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('jude-scrolla', get_template_directory_uri() . '/js/jquery.scrolla.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('jude-script', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'jude_scripts');
/* Add jquery to Head */
function insert_jquery()
{
	wp_enqueue_script('jquery', false, array(), false, false);
}
add_filter('wp_enqueue_scripts', 'insert_jquery', 1);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Register Custom Post Type



function clm_custom_post()
{



	//  dealers
	register_post_type('Artists', array(
		'rewrite' => array('slug' => 'artists'),
		//'rewrite' => false,
		'labels' => array(
			'name' => 'Artists',
			'singular_name' => 'artists',
			'add_new_item' => 'Add new',
			'edit_item' => 'Edit'
		),
		'menu_icon' => 'dashicons-text-page',
		'public' => true,
		'has_archive' => false,
		'supports' => array(
			'title', 'thumbnail', 'editor', 'custom-fields', 'excerpt', 'tags',
		)
	));
}

add_action('init', 'clm_custom_post');


function artists_category()
{
	register_taxonomy(
		'artists-category',  					// This is a name of the taxonomy. Make sure it's not a capital letter and no space in between
		'artists',        			//post type name
		array(
			'hierarchical' => true,
			'label' => 'Artists Categories',  	//Display name
			'query_var' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'artists-category'),
			'supports' => array(
				'title', 'thumbnail', 'editor', 'custom-fields', 'excerpt', 'tags'
			)
		)
	);
}
add_action('init', 'artists_category');

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);

  if (count($content) >= $limit) {
	  array_pop($content);
	  $content = implode(" ", $content) . '...';
  } else {
	  $content = implode(" ", $content);
  }

  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);

  return $content;
}
// Option page
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array(
        'page_title' => 'Site Settings',
        'menu_title' => 'Site Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
	// Add sub page.
	$home_settings = acf_add_options_sub_page(array(
		'page_title'  => __('Hero Scroll Images'),
		'menu_title'  => __('Hero Scroll Images'),
		'parent_slug' => $parent['menu_slug'],
	));
}