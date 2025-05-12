<?php
/**
 * demoword functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package demoword
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function demoword_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on demoword, use a find and replace
		* to change 'demoword' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'demoword', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'demoword' ),
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
			'demoword_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'demoword_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function demoword_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'demoword_content_width', 640 );
}
add_action( 'after_setup_theme', 'demoword_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function demoword_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'demoword' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'demoword' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'demoword_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function demoword_scripts() {
	wp_enqueue_style( 'demoword-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'demoword-style', 'rtl', 'replace' );

	wp_enqueue_script( 'demoword-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'demoword_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

function prefix_create_custom_post_type() {
    /*
     * The $labels describes how the post type appears.
     */
    $labels = array(
        'name'          => 'Products', // Plural name
        'singular_name' => 'Product'   // Singular name
    );

    /*
     * The $supports parameter describes what the post type supports
     */
    $supports = array(
        'title',        // Post title
        'editor',       // Post content
        'excerpt',      // Allows short description
        'author',       // Allows showing and choosing author
        'thumbnail',    // Allows feature images
        'comments',     // Enables comments
        'trackbacks',   // Supports trackbacks
        'revisions',    // Shows autosaved version of the posts
        'custom-fields' // Supports by custom fields
    );

    /*
     * The $args parameter holds important parameters for the custom post type
     */
    $args = array(
        'labels'              => $labels,
        'description'         => 'Post type post product', // Description
        'supports'            => $supports,
        'taxonomies'          => array( 'category', 'post_tag' ), // Allowed taxonomies
        'hierarchical'        => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
        'public'              => true,  // Makes the post type public
        'show_ui'             => true,  // Displays an interface for this post type
        'show_in_menu'        => true,  // Displays in the Admin Menu (the left panel)
        'show_in_nav_menus'   => true,  // Displays in Appearance -> Menus
        'show_in_admin_bar'   => true,  // Displays in the black admin bar
        'menu_position'       => 5,     // The position number in the left menu
        'menu_icon'           => true,  // The URL for the icon used for this post type
        'can_export'          => true,  // Allows content export using Tools -> Export
        'has_archive'         => true,  // Enables post type archive (by month, date, or year)
        'exclude_from_search' => false, // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
        'publicly_queryable'  => true,  // Allows queries to be performed on the front-end part if set to true
        'capability_type'     => 'post' // Allows read, edit, delete like “Post”
    );

    register_post_type('news', $args); //Create a post type with the slug is ‘product’ and arguments in $args.
}
add_action('init', 'prefix_create_custom_post_type');

/****************************************
 * Add custom taxonomy for Toys *
 ****************************************/

add_action('init', 'toys_categories_register');

function toys_categories_register() {
$labels = array(
    'name'                          => 'Toys Categories',
    'singular_name'                 => 'Toys Category',
    'search_items'                  => 'Search Toys Categories',
    'popular_items'                 => 'Popular Toys Categories',
    'all_items'                     => 'All Toys Categories',
    'parent_item'                   => 'Parent Toy Category',
    'edit_item'                     => 'Edit Toy Category',
    'update_item'                   => 'Update Toy Category',
    'add_new_item'                  => 'Add New Toy Category',
    'new_item_name'                 => 'New Toy Category',
    'separate_items_with_commas'    => 'Separate toys categories with commas',
    'add_or_remove_items'           => 'Add or remove toys categories',
    'choose_from_most_used'         => 'Choose from most used toys categories'
    );

$args = array(
    'label'                         => 'Toys Categories',
    'labels'                        => $labels,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'                       => array( 'slug' => 'toys', 'with_front' => true, 'hierarchical' => true ),
    'query_var'                     => true
);

register_taxonomy( 'toys_categories', 'toys', $args );
}

/*****************************************
 * Add custom post type for Toys *
 *****************************************/

add_action('init', 'toys_register');

function toys_register() {

    $labels = array(
        'name' => 'Toys',
        'singular_name' => 'Toy',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Toy',
        'edit_item' => 'Edit Toy',
        'new_item' => 'New Toy',
        'view_item' => 'View Toy',
        'search_items' => 'Search Toys',
        'not_found' =>  'Nothing found',
        'not_found_in_trash' => 'Nothing found in Trash',
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'toys', 'with_front' => true ),
        'capability_type' => 'post',
        'menu_position' => 6,
        'supports' => array('title', 'excerpt', 'editor','thumbnail') //here you can specify what type of inputs will be accessible in the admin area
      );

    register_post_type( 'toys' , $args );
}


// Define the function that loads and returns the custom file content
function register_inner_page_shortcode() {
    add_shortcode('inner_page', function($atts = [], $content = null) {
        ob_start();
        // Include your external content file
        include get_template_directory() . '/customcode.php';
        return ob_get_clean();
    });
}
add_action('init', 'register_inner_page_shortcode');

function enqueue_toys_ajax_script() {
    wp_enqueue_script('toys-filter', get_template_directory_uri() . '/js/toys-filter.js', array('jquery'), null, true);
    wp_localize_script('toys-filter', 'toys_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('toys_filter_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_toys_ajax_script');



function filter_toys_ajax() {
    check_ajax_referer('toys_filter_nonce', 'nonce');

    $category = sanitize_text_field($_POST['category']);
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $args = array(
        'post_type'      => 'toys',
        'posts_per_page' => 3,
        'paged'           => $page,
        'orderby'         => 'date',
        'order'           => 'ASC',
    );

    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'toys_categories',
                'field'    => 'slug',
                'terms'    => $category,
            )
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        echo '<div class="three-column-grid">';
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="post-item">
                <h3><?php the_title(); ?></h3>
                <?php the_post_thumbnail('medium'); ?>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>">Read More</a>
            </div>
        <?php endwhile;
        echo '</div>';
    else :
        echo ''; // No more posts; hide Load More button
    endif;

    wp_die();
}
add_action('wp_ajax_filter_toys', 'filter_toys_ajax');
add_action('wp_ajax_nopriv_filter_toys', 'filter_toys_ajax');
