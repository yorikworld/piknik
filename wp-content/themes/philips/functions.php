<?php
/**
 * philips functions and definitions
 *
 * @package philips
 */
 if ( ! isset( $content_width ) ) $content_width = 900;

if ( ! function_exists( 'philips_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function philips_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on philips, use a find and replace
	 * to change 'philips' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'philips', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'philips' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	/*
	 * Enable support for Post Thumbnails.
	 * See https://codex.wordpress.org/Function_Reference/add_theme_support
	 */
	
	add_theme_support( 'post-thumbnails' );	
    add_image_size('philips-blog-thumbnails', 960, 450, true);
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link','gallery',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'philips_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // philips_setup
add_action( 'after_setup_theme', 'philips_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function philips_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'philips_content_width', 640 );
}
add_action( 'after_setup_theme', 'philips_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function philips_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'philips' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'philips_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function philips_scripts() {
	wp_enqueue_style( 'philips-bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'philips-fontawesome', get_template_directory_uri() . '/css/font-awesome.css' );
	
	
	
	
	wp_enqueue_style( 'philips-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'philips-responsive', get_template_directory_uri() . '/css/responsive.css' );

	

	wp_enqueue_script( 'kento_blog-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );	
	wp_enqueue_script( 'philips-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'kento_blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'philips_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


require get_template_directory() . '/inc/philips_navwalker.php';



if( ! function_exists('philips_load_fonts')):
function philips_load_fonts(){
	wp_register_style('philips-googleFonts-raleway', 'http://fonts.googleapis.com/css?family=Raleway:400,300,200,700,600,500,800,900,100');
	wp_register_style('philips-googleFonts-bitter', 'http://fonts.googleapis.com/css?family=Bitter:400,400italic,700');
	wp_enqueue_style( 'philips-googleFonts-raleway');
	wp_enqueue_style( 'philips-googleFonts-bitter');

}
add_action('wp_enqueue_scripts', 'philips_load_fonts');
endif;
