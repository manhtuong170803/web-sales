<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

// Social Links
CSF::createWidget( 'fitmascore_social_widget', array(
    'title'       => esc_html__( 'Fitmas Social Widget', 'fitmascore' ),
    'classname'   => 'fitmascore-social-widgets eco-custom-widget',
    'description' => esc_html__( 'Add Your Social Info', 'fitmascore' ),
    'fields'      => array(
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => esc_html__( 'Title', 'fitmascore' ),
        ),
        array(
            'id'      => 'fitmascore_socials_widget',
            'type'    => 'group',
            'title'   => esc_html__( 'Add Social Links', 'fitmascore' ),
            'fields'  => array(
                array(
                    'id'    => 'fitmascore_social_label',
                    'type'  => 'text',
                    'title' => esc_html__( 'Name', 'fitmascore' ),
                ),
                array(
                    'id'    => 'fitmascore_social_link',
                    'type'  => 'text',
                    'title' => esc_html__( 'Site Link', 'fitmascore' ),
                ),
                array(
                    'id'    => 'fitmascore_social_icon',
                    'type'  => 'icon',
                    'title' => esc_html__( 'Site Icon', 'fitmascore' ),
                ),
            ),
            'default' => array(
                array(
                    'fitmascore_social_label' => esc_html__( 'Facebook', 'fitmascore' ),
                    'fitmascore_social_link'  => '#',
                    'fitmascore_social_icon'  => 'fab fa-facebook',
                ),
                array(
                    'fitmascore_social_label' => esc_html__( 'Twitter', 'fitmascore' ),
                    'fitmascore_social_link'  => '#',
                    'fitmascore_social_icon'  => 'fab fa-twitter',
                ),
                array(
                    'fitmascore_social_label' => esc_html__( 'Linkedin', 'fitmascore' ),
                    'fitmascore_social_link'  => '#',
                    'fitmascore_social_icon'  => 'fab fa-linkedin',
                ),
                array(
                    'fitmascore_social_label' => esc_html__( 'Instagram', 'fitmascore' ),
                    'fitmascore_social_link'  => '#',
                    'fitmascore_social_icon'  => 'fab fa-instagram',
                ),
            ),
        ),
    ),
) );

// OutPut
if ( !function_exists( 'fitmascore_social_widget' ) ) {
    function fitmascore_social_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }
        ?>
            <div class="eco-social-widgets-box">
                <ul>
                    <?php foreach ( $instance['fitmascore_socials_widget'] as $social ) {
                    echo ' <li><a href="' . esc_url( $social['fitmascore_social_link'] ) . '" data-toggle="tooltip" data-placement="top" title="' . esc_attr( $social['fitmascore_social_label'] ) . '"><i class="' . esc_attr( $social['fitmascore_social_icon'] ) . '"></i></a></li>';
                    }
                    ?>
                </ul>
            </div>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}