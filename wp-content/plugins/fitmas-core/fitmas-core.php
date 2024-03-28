<?php
/*
Plugin Name: Fitmas Core
Author: ThemePul
Author URI: http://themepul.com
Version: 1.0.0
Description: This plugin is Required for Fitmas WordPress theme
Text Domain: fitmascore
 */

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
define( 'FITMAS_CORE_VERSION', '1.0.0' );
define( 'FITMAS_CORE', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'FITMAS_CORE_ASSETS', trailingslashit( FITMAS_CORE . 'assets' ) );
// Translate direction
load_plugin_textdomain( ' fitmascore', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/*
 *  Add CSF
 */
require_once 'inc/library/codestar-framework/codestar-framework.php';

/*
 *  Add Elementor Addons
 */
include_once 'elementor-widgets/custom-elements-for-elementor.php';

/*
 *  HEADER AND FOOTER BUILDER
 */
include_once 'elementor-widgets/hf-builder/header-footer-builder.php';


/*
 *  Add Fitmas Core Function
 */
include_once 'inc/fitmascore-functions.php';

/*
 *  Add Demo Function
 */
include_once 'inc/demo.php';

/*
 *  Add Elementor Addons Icon
 */
include_once 'addon-icon.php';



/*
 *  Add Custom WordPress Widgets
 */
if ( class_exists( 'CSF' ) ) {
    include_once 'inc/widgets/custom-widgets.php';
    include_once 'inc/icons.php';
}

/*
 *  Add Custom Post Type
 */
$theme = wp_get_theme();
if ( 'Fitmas' == $theme->name || 'Fitmas' == $theme->parent_theme ) {
    include_once 'inc/wp-custom-posts.php';
}

// Registering toolkit files
function fitmascore_files() {
    wp_enqueue_style( 'iconfont', FITMAS_CORE_ASSETS . 'css/iconfont.css', array(), FITMAS_CORE_VERSION, 'all' );
    wp_enqueue_style( 'flaticon', FITMAS_CORE_ASSETS . 'css/flaticon.css', array(), FITMAS_CORE_VERSION, 'all' );
    wp_enqueue_style( 'icofont', FITMAS_CORE_ASSETS . 'css/icofont.min.css', array(), FITMAS_CORE_VERSION, 'all' );
    wp_enqueue_style( 'custom-widgets', FITMAS_CORE_ASSETS . 'css/custom-widgets.css', array(), FITMAS_CORE_VERSION, 'all' );
    wp_enqueue_style( 'flipster-css', FITMAS_CORE_ASSETS . 'css/jquery.flipster.min.css', array(), FITMAS_CORE_VERSION, 'all' );
    wp_enqueue_script( 'jquery-flipster', FITMAS_CORE_ASSETS . 'js/jquery.flipster.min.js', array(), FITMAS_CORE_VERSION, true);

}
add_action( 'wp_enqueue_scripts', 'fitmascore_files' );


/**
 * Enqueue Backend Styles And Scripts.
 **/
function fitmascore_backend_css_js( $screen ) {
    wp_enqueue_style( 'bootstrap-icons', get_theme_file_uri( 'assets/css/bootstrap-icons.css' ), array(), FITMAS_CORE_VERSION, 'all' );
    wp_enqueue_style( 'iconfont', FITMAS_CORE_ASSETS . 'css/iconfont.css', array(), FITMAS_CORE_VERSION, 'all' );
    wp_enqueue_style( 'flaticon', FITMAS_CORE_ASSETS . 'css/flaticon.css', array(), FITMAS_CORE_VERSION, 'all' );
    wp_enqueue_style( 'icofont', FITMAS_CORE_ASSETS . 'css/icofont.min.css', array(), FITMAS_CORE_VERSION, 'all' );
}
add_action( 'admin_enqueue_scripts', 'fitmascore_backend_css_js' );