<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
if ( !function_exists( 'fitmascore_nabber_widget' ) ) {
    include_once 'banner.php';
}
if ( !function_exists( 'fitmascore_blog_post_widget' ) ) {
    include_once 'blog-post.php';
}
if ( !function_exists( 'fitmascore_company_info_widget' ) ) {
    include_once 'company-info.php';
}
if ( !function_exists( 'fitmascore_contact_info_widget' ) ) {
    include_once 'contact-info.php';
}
if ( !function_exists( 'fitmascore_social_widget' ) ) {
    include_once 'social.php';
}
if ( !function_exists( 'fitmascore_newsletter_widget' ) ) {
    include_once 'subscribe.php';
}
if ( !function_exists( 'fitmascore_about_info_widget' ) ) {
    include_once 'about-info.php';
}
if ( !function_exists( 'fitmas_nav_menu_widget' ) ) {
    include_once 'custom-navigation-widget.php';
}
if ( !function_exists( 'fitmascore_gallery_widget' ) ) {
    include_once 'gallery.php';
}