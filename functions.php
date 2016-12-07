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

function move_jquery_into_footer( $wp_scripts ) {

    if( is_admin() ) {
        return;
    }

    $wp_scripts->add_data( 'jquery', 'group', 1 );
    $wp_scripts->add_data( 'jquery-core', 'group', 1 );
    $wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
    
}
// add_action( 'wp_default_scripts', 'move_jquery_into_footer' );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @return void
 */
function teameight_scripts_styles() {

    $version = '2016-12-07';

    // Loads JavaScript file with functionality specific to Team Eight.
    wp_enqueue_script( 'teameight-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), $version, true );

    // Loads JavaScript file with lazyload.
   // wp_enqueue_script( 'teameight-lazyload', get_template_directory_uri() . '/js/lazyload.js', array( 'jquery' ), '2015-08-28', true );

    if (is_page('contact')) {
        wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '3', true );
        wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/gmap.js', array('google-map', 'jquery'), '0.1', true );
    }

    // Loads fontawesome.
    wp_enqueue_style( 'teameight-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), $version );

	// Loads our main stylesheet.
	wp_enqueue_style( 'teameight-style', get_template_directory_uri() . '/css/style.css', array(), $version );


	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'teameight-ie', get_template_directory_uri() . '/css/ie.css', array( 'teameight-style' ), $version );
	wp_style_add_data( 'teameight-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'teameight_scripts_styles' );


// /*function to add async to all scripts*/
// function js_async_attr($tag){

// # Add async to all remaining scripts
// return str_replace( ' src', ' async="async" src', $tag );
// }
// add_filter( 'script_loader_tag', 'js_async_attr', 10 );

/**
 * Alter the main query on the home page
 *
 * limits the main query to the 9 most recent posts in the other-things category
 */
function team_eight_query_other_things( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', 48 ); // other things cat id
        $query->set( 'category__not_in', 47 ); // other things cat id
        // set the number of posts per page
        $posts_per_page = 16;
        $query->set('posts_per_page', $posts_per_page);

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
        'hierarchical' => true,
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
function teameight_singles_images($att_id, $size, $class) { // !!! I THINK WE CAN RETIRE THIS FUNCTION

    $image = wp_get_attachment_image( $att_id, $size, false, array( 'class' => $class ) );

    if($class == "web-page"){
        echo "<div class='web-page'><div class='web-page-head'><span></span><span></span><span></span></div>";
        echo $image;
        echo "</div>";
    } else {
        echo $image;
    }

}

/**
 * Outputs images with classes from ACF feilds on single posts and/or with lazy load support
 *
 * 
 */
function teameight_images($attachment_id, $size, $class, $lload = true) {

    $webpage = false;
    $imgcaption = false;
    $html = '';
    $image = wp_get_attachment_image_src($attachment_id, $size, $icon);
    if ( $image ) {

        list($src, $width, $height) = $image;
        $hwstring = image_hwstring($width, $height);
        $size_class = $size;
        if ( is_array( $size_class ) ) {
            $size_class = join( 'x', $size_class );
        }
        $attachment = get_post($attachment_id);
        $imgcaption = $attachment->post_excerpt;

        //add wrapper if caption
        if($imgcaption) {
           $html .= "<div class='captionwrap'>";
        }
        if (strpos($class, 'web-page') !== false) {
            $webpage = true;
            $html .= '<div class="web-page-wrap"><div class="'.$class.'"><svg class="eye-icon"><use xlink:href="#eye-icon"></use></svg>"';
        }

        $placeholder = get_template_directory_uri()."/images/img-phold.gif";
        $default_attr = array(
            'src'   => $placeholder,
            'data-src'   => $src,
            'class' => "attachment-$size_class size-$size_class $class",
            'alt'   => trim(strip_tags( get_post_meta($attachment_id, '_wp_attachment_image_alt', true) )), // Use Alt field first
        );
        if ( empty($default_attr['alt']) )
            $default_attr['alt'] = trim(strip_tags( $imgcaption )); // If not, Use the Caption
        if ( empty($default_attr['alt']) )
            $default_attr['alt'] = trim(strip_tags( $attachment->post_title )); // Finally, use the title
 
        $attr = wp_parse_args( $attr, $default_attr );
 
        // Generate 'srcset' and 'sizes' if not already present.
        if ( empty( $attr['srcset'] ) ) {
            $image_meta = get_post_meta( $attachment_id, '_wp_attachment_metadata', true );
 
            if ( is_array( $image_meta ) ) {
                $size_array = array( absint( $width ), absint( $height ) );
                $srcset = wp_calculate_image_srcset( $size_array, $src, $image_meta, $attachment_id );
                $sizes = wp_calculate_image_sizes( $size_array, $src, $image_meta, $attachment_id );
 
                if ( $srcset && ( $sizes || ! empty( $attr['sizes'] ) ) ) {
                    $attr['srcset'] = $srcset;
 
                    if ( empty( $attr['sizes'] ) ) {
                        $attr['sizes'] = $sizes;
                    }
                }
            }
        }
        $attr['data-srcset'] = $attr['srcset'];
        unset($attr['srcset']); 
 
        /**
         * Filter the list of attachment image attributes.
         *
         * @since 2.8.0
         *
         * @param array        $attr       Attributes for the image markup.
         * @param WP_Post      $attachment Image attachment post.
         * @param string|array $size       Requested size. Image size or array of width and height values
         *                                 (in that order). Default 'thumbnail'.
         */
        $attr = apply_filters( 'wp_get_attachment_image_attributes', $attr, $attachment, $size );
        $attr = array_map( 'esc_attr', $attr );
        $html .= rtrim("<img $hwstring");
        foreach ( $attr as $name => $value ) {
            $html .= " $name=" . '"' . $value . '"';
        }
        $html .= ' />';

        if($webpage){
            $html .= "</div></div>";
        }

        if($imgcaption) {
           $html .= "<p>".$imgcaption."</p></div>";
        }
    }
 
    echo $html;

}

 /**
 * Shortcodes
 */
 
function t8_button($atts, $content = null){
   extract(shortcode_atts(array(
      'style' => 'green',
      'link' => '#',
      'target' => '_self',
   ), $atts));
 
   return 
        '<a class="'.$style.' button" target="'. $target .'" href="'. $link .'">'.
   
        do_shortcode($content) .

        '</a>';

}
add_shortcode( 'button', 't8_button' );
