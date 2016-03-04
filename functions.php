<?php
/**
 * Team Eight setup.
 *
 * Sets up theme defaults and registers the various WordPress features 
 *
 * @uses add_theme_support() To add support for post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 *
 * @return void
 */
function teameight_setup() {
	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
        'aside', 'image', 'quote', 'video'
        //'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', 'Navigation Menu' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'teameight_setup' );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @return void
 */
function teameight_scripts_styles() {

	// Loads JavaScript file with functionality specific to Team Eight.
	wp_enqueue_script( 'teameight-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2015-08-28', true );

	// Loads our main stylesheet.
	wp_enqueue_style( 'teameight-style', get_template_directory_uri() . '/css/style.css', array(), '2015-08-28' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'teameight-ie', get_template_directory_uri() . '/css/ie.css', array( 'teameight-style' ), '2013-07-18' );
	wp_style_add_data( 'teameight-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'teameight_scripts_styles' );

/**
 * Alter the main query on the home page
 *
 * limits the main query to the 9 most recent posts in the other-things category
 */
function team_eight_query_other_things( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', 48 ); // other things cat id
        // set the number of posts per page
        $posts_per_page = 9;
        // get sticky posts array
        $sticky_posts = get_option( 'sticky_posts' );

        // if we have any sticky posts and we are at the first page
        if (is_array($sticky_posts)) {

            // count the number of sticky posts
            $sticky_count = count($sticky_posts);

            // and if the number of sticky posts is less than
            // the number we want to set:
            if ($sticky_count < $posts_per_page) {
                $query->set('posts_per_page', $posts_per_page - $sticky_count);

                // if the number of sticky posts is greater than or equal
                // the number of pages we want to set, ignore sticky posts
            } else {
                $query->set('posts_per_page', 1);
            }

            // fallback in case we have no sticky posts
            // and we are not on the first page
        } else {
            $query->set('posts_per_page', $posts_per_page);
        }
    }
}
add_action( 'pre_get_posts', 'team_eight_query_other_things' );

function create_teammates_teameight()
{
    $labels = array(
        'name'              => _x( 'Groups', 'taxonomy general name' ),
        'singular_name'     => _x( 'Group', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Groups' ),
        'all_items'         => __( 'All Groups' ),
        'parent_item'       => __( 'Parent Group' ),
        'parent_item_colon' => __( 'Parent Group:' ),
        'edit_item'         => __( 'Edit Group' ),
        'update_item'       => __( 'Update Group' ),
        'add_new_item'      => __( 'Add New Group' ),
        'new_item_name'     => __( 'New Group Name' ),
        'menu_name'         => __( 'Groups' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'group' ),
    );

    register_taxonomy( 'group', array( 'teammate' ), $args );

    register_post_type('teammate', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Team Mates', 'teameight'), // Rename these to suit
            'singular_name' => __('Team Mate', 'teameight'),
            'add_new' => __('Add New', 'teameight'),
            'add_new_item' => __('Add New Team Mate', 'teameight'),
            'edit' => __('Edit', 'teameight'),
            'edit_item' => __('Edit Team Mate', 'teameight'),
            'new_item' => __('New Team Mate', 'teameight'),
            'view' => __('View Team Mate', 'teameight'),
            'view_item' => __('View Team Mate', 'teameight'),
            'search_items' => __('Search Team Mates', 'teameight'),
            'not_found' => __('No Team Mates found', 'teameight'),
            'not_found_in_trash' => __('No Team Mates found in Trash', 'teameight')
        ),
        'public' => true,
        'menu_icon' => 'dashicons-groups',
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'page-attributes'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'group'
        ) // Add Category and Post Tags support
    ));
}
add_action('init', 'create_teammates_teameight'); // Add our Custom Post Type

/**
 * Outputs images with classes from ACF feilds on single posts
 *
 * 
 */
function teameight_singles_images($att_id, $size, $class) {

    if($class == "web-page"){
        echo "<div class='web-page-head'><span></span><span></span><span></span></div>";
    }

    echo wp_get_attachment_image( $att_id, $size, false, array( 'class' => $class ) );

}
