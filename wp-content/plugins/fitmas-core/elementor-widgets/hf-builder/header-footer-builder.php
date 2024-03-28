<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function fitmas_register_header_footer_custom_post() {

	// Register Footer Builder Post Type
	register_post_type('fitmas_header',
		array(
			'labels'       => array(
				'name'                  => esc_html__('Fitmas Headers', 'fitmascore'),
				'singular_name'         => esc_html__('Header', 'fitmascore'),
				'add_new_item'          => esc_html__('Add New Header', 'fitmascore'),
				'all_items'             => esc_html__('All Headers', 'fitmascore'),
				'add_new'               => esc_html__('Add New', 'fitmascore'),
				'edit_item'             => esc_html__('Edit Header', 'fitmascore'),
			),
			'rewrite'      => array(
				'slug'       => 'header',
				'with_front' => true,
			),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'has_archive'        => true,
			'menu_icon'    => 'dashicons-editor-kitchensink',
			'show_in_rest'    => false,
			'supports'     => array('title','thumbnail'),
		)
	);

	// Register Footer Builder Post Type
	register_post_type('fitmas_footer',
		array(
			'labels'       => array(
				'name'                  => esc_html__('Fitmas Footers', 'fitmascore'),
				'singular_name'         => esc_html__('Footer', 'fitmascore'),
				'add_new_item'          => esc_html__('Add New Footer', 'fitmascore'),
				'all_items'             => esc_html__('All Footers', 'fitmascore'),
				'add_new'               => esc_html__('Add New', 'fitmascore'),
				'edit_item'             => esc_html__('Edit Footer', 'fitmascore'),
			),
			'rewrite'      => array(
				'slug'       => 'footer',
				'with_front' => true,
			),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'has_archive'        => true,
			'menu_icon'    => 'dashicons-editor-kitchensink',
			'show_in_rest'    => false,
			'supports'     => array('title','thumbnail'),
		)
	);

	
}

add_action( 'init', 'fitmas_register_header_footer_custom_post' );


/**
 *  Footer Canvas
 */
function fitmas_header_footer_builder_canvas() {
	global $post;

	// Check if its a correct post type/types to apply template
	if ( !in_array( $post->post_type, ['fitmas_footer','fitmas_header'] ) || !did_action( 'elementor/loaded' ) ) {
		return;
	}
	// Check that a template is not set already
	if ( '' !== $post->page_template ) {
		return;
	}
	// Make sure its not a page for posts
	if ( get_option( 'page_for_posts' ) === $post->ID ) {
		return;
	}

	//Finally set the page template
	$post->page_template = 'elementor_canvas';
	update_post_meta( $post->ID, '_wp_page_template', 'elementor_canvas' );
}

add_action( 'add_meta_boxes', 'fitmas_header_footer_builder_canvas', 10 );


add_action( 'elementor/init', function() {
    // Register the 'fitmas_header' custom post type
    register_post_type( 'fitmas_header', array(
        'labels' => array(
            'name' => __( 'Fitmas Headers', 'fitmascore' ),
            'singular_name' => __( 'Fitmas Header', 'fitmascore' ),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title' ),
    ) );
    // Add Elementor support to the 'fitmas_header' custom post type
    add_post_type_support( 'fitmas_header', 'fitmascore' );

    // Register the 'fitmas_footer' custom post type
    register_post_type( 'fitmas_footer', array(
        'labels' => array(
            'name' => __( 'Fitmas Footers', 'fitmascore' ),
            'singular_name' => __( 'Fitmas Footer', 'fitmascore' ),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title' ),
    ) );
    // Add Elementor support to the 'fitmas_footer' custom post type
    add_post_type_support( 'fitmas_footer', 'fitmascore' );
} );
