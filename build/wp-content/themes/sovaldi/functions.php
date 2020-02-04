<?php
/**
 * sovaldi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sovaldi
 */

if ( ! function_exists( 'sovaldi_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function sovaldi_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on sovaldi, use a find and replace
     * to change 'sovaldi' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'sovaldi', get_template_directory() . '/languages' );

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
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'sovaldi_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'sovaldi_setup' );

// Remove unwanted blocks
add_filter( 'allowed_block_types', 'allowed_block_types' );
 
function allowed_block_types( $allowed_blocks ) {
 
    return array(
        'core/paragraph',
        'core/image',
        'core/heading',
        'core/list',
        'core/html',
        'core/spacer'
    );
 
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sovaldi_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters( 'sovaldi_content_width', 640 );
}
add_action( 'after_setup_theme', 'sovaldi_content_width', 0 );


//Add crossorigin="anonymous" and integrity= to CDN JS.
add_filter( 'script_loader_tag', 'add_attribs_to_scripts', 10, 3 );
function add_attribs_to_scripts( $tag, $handle, $src ) {

// The handles of the enqueued scripts we want to defer
$jquery = array(
    'jquery-3'
);

if ( in_array( $handle, $jquery ) ) {
    return '<script type="text/javascript" src="' . $src . '" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>' . "\n";
}
return $tag;
}

/**
 * Enqueue scripts and styles.
 */
function theme_styles_and_scripts() {
  wp_dequeue_style( 'wp-block-library' );
  wp_enqueue_style( 'sovaldi-styles', get_template_directory_uri() . '/assets/css/style.css', true );

  wp_enqueue_script('jquery-3', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), '3.3.1', true);
  wp_enqueue_script( 'sovaldi-scripts', get_template_directory_uri() . '/js/main.min.js', array(), '1.0', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

}
add_action( 'wp_enqueue_scripts', 'theme_styles_and_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
	
    /* (string) The title displayed on the options page. Required. */
    'page_title' => 'Sovaldi Options',
    
    /* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
    'menu_title' => 'Sovaldi Options',
    
    /* (string) The URL slug used to uniquely identify this options page. 
    Defaults to a url friendly version of menu_title */
    'menu_slug' => 'sovaldi-options',
    
    /* (string) The capability required for this menu to be displayed to the user. Defaults to edit_posts.
    Read more about capability here: http://codex.wordpress.org/Roles_and_Capabilities */
    'capability' => 'edit_posts',
    
    /* (int|string) The position in the menu order this menu should appear. 
    WARNING: if two menu items use the same position attribute, one of the items may be overwritten so that only one item displays!
    Risk of conflict can be reduced by using decimal instead of integer values, e.g. '63.3' instead of 63 (must use quotes).
    Defaults to bottom of utility menu items */
    'position' => false,
    
    /* (string) The slug of another WP admin page. if set, this will become a child page. */
    'parent_slug' => '',
    
    /* (string) The icon class for this menu. Defaults to default WordPress gear.
    Read more about dashicons here: https://developer.wordpress.org/resource/dashicons/ */
    'icon_url' => false,
    
    /* (boolean) If set to true, this options page will redirect to the first child page (if a child page exists). 
    If set to false, this parent page will appear alongside any child pages. Defaults to true */
    'redirect' => false,
    
    /* (int|string) The '$post_id' to save/load data to/from. Can be set to a numeric post ID (123), or a string ('user_2'). 
    Defaults to 'options'. Added in v5.2.7 */
    'post_id' => '',
    
    /* (boolean)  Whether to load the option (values saved from this options page) when WordPress starts up. 
    Defaults to false. Added in v5.2.8. */
    'autoload' => false,
    
    /* (string) The update button text. Added in v5.3.7. */
    'update_button'		=> __('Update', 'acf'),
    
    /* (string) The message shown above the form on submit. Added in v5.6.0. */
    'updated_message'	=> __("Options Updated", 'acf'),
        
  ));
  acf_add_options_sub_page(array(
	
    /* (string) The title displayed on the options page. Required. */
    'page_title' => 'Social Icons',
    
    /* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
    'menu_title' => '',
    
    /* (string) The URL slug used to uniquely identify this options page. 
    Defaults to a url friendly version of menu_title */
    'menu_slug' => '',
    
    /* (string) The capability required for this menu to be displayed to the user. Defaults to edit_posts.
    Read more about capability here: http://codex.wordpress.org/Roles_and_Capabilities */
    'capability' => 'edit_posts',
    
    /* (int|string) The position in the menu order this menu should appear. 
    WARNING: if two menu items use the same position attribute, one of the items may be overwritten so that only one item displays!
    Risk of conflict can be reduced by using decimal instead of integer values, e.g. '63.3' instead of 63 (must use quotes).
    Defaults to bottom of utility menu items */
    'position' => false,
    
    /* (string) The slug of another WP admin page. if set, this will become a child page. */
    'parent_slug' => 'sovaldi-options',
    
    /* (string) The icon class for this menu. Defaults to default WordPress gear.
    Read more about dashicons here: https://developer.wordpress.org/resource/dashicons/ */
    'icon_url' => false,
        
  ));

  
	
}