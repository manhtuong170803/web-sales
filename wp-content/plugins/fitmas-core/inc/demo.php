<?php

function fitmascore_import_files() {
    return array(
        array(
            'import_file_name'           => esc_html__( 'Demo page', 'fitmascore' ),
            'import_file_url'            => plugin_dir_url( __FILE__ ) . 'demo/demo.xml',
            'import_widget_file_url'     => plugin_dir_url( __FILE__ ) . 'demo/widgets.wie',
            'import_customizer_file_url' => plugin_dir_url( __FILE__ ) . 'demo/customizer.dat',
            'local_import_json'          => array(
                array(
                    'file_path'   => plugin_dir_url( __FILE__ ) . 'demo/theme-options.json',
                    'option_name' => 'fitmas_theme_option',
                ),
            ),
            'preview_url'                => 'https://wptf.themepul.co/fitmas',
        ),
    );
}
add_filter( 'ocdi/import_files', 'fitmascore_import_files' );

function fitmascore_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'mainmenu' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
    )
    );
    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'ocdi/after_import', 'fitmascore_after_import_setup' );