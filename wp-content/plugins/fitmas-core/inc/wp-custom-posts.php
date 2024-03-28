<?php

if ( !function_exists( 'fitmas_option' ) ) {
    function fitmas_option( $option = '', $default = null ) {
        $defaults = fitmas_default_theme_options();
        $options = get_option( 'fitmas_theme_option' );
        $default = ( !isset( $default ) && isset( $defaults[$option] ) ) ? $defaults[$option] : $default;
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}
add_action( 'init', 'fitmascore_custom_post_type' );
function fitmascore_custom_post_type() {
    register_post_type( 'fitmas_portfolio',
        array(
            'labels'       => array(
                'name'          => esc_html__( 'Portfolio', 'fitmascore' ),
                'singular_name' => esc_html__( 'Portfolio', 'fitmascore' ),
            ),
            'show_in_rest' => true,
            'supports'     => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'excerpt' ),
            'menu_icon'    => esc_attr__( 'dashicons-image-filter', 'fitmascore' ),
            'public'       => true,
            'rewrite'      => array(
                'slug'       => fitmas_option( 'fitmas_portfolio_custom_slug' ),
                'with_front' => true,
            ),
        )
    );
    register_post_type( 'fitmas_team',
        array(
            'labels'       => array(
                'name'          => esc_html__( 'Team', 'fitmascore' ),
                'singular_name' => esc_html__( 'Team', 'fitmascore' ),
            ),
            'show_in_rest' => true,
            'supports'     => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'excerpt' ),
            'menu_icon'    => esc_attr__( 'dashicons-admin-users', 'fitmascore' ),
            'public'       => true,
            'rewrite'      => array(
                'slug'       => fitmas_option( 'fitmas_team_custom_slug' ),
                'with_front' => true,
            ),
        )
    );
}
/*** Custom taxonomy ***/
add_action( 'init', 'fitmascore_custom_post_taxonomy' );
function fitmascore_custom_post_taxonomy() {
    register_taxonomy(
        'fitmas_portfolio_cat',
        'fitmas_portfolio',
        array(
            'label'             => esc_html__( 'Portfolio Category', 'fitmascore' ),
            'query_var'         => true,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'show_tagcloud'     => true,
            'rewrite'           => array(
                'slug'       => ''.fitmas_option( 'fitmas_portfolio_custom_slug' ).'-category',
                'with_front' => true,
            ),
        )
    );

}