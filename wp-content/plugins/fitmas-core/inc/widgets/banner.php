<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

CSF::createWidget( 'fitmascore_nabber_widget', array(
    'title'       => esc_html__( 'Fitmas Banner Widget', 'fitmascore' ),
    'classname'   => 'fitmascore-banner-widgets eco-custom-widget',
    'description' => esc_html__( 'Add Your Banner Info', 'fitmascore' ),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'default' => __( 'Work  Together', 'fitmascore' ),
            'title'   => esc_html__( 'Title', 'fitmascore' ),
        ),
        array(
            'id'      => 'fitmascore_banner_dec',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Content', 'fitmascore' ),
            'default' => __( 'Bur wemust ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore', 'fitmascore' ),
        ),
        array(
            'id'    => 'fitmascore_banner_link',
            'type'  => 'link',
            'title' => esc_html__( 'Link', 'fitmascore' ),
        ),
        array(
            'id'      => 'fitmascore_banner_link_text',
            'type'    => 'text',
            'title'   => esc_html__( 'Link Text', 'fitmascore' ),
            'default' => __( 'Contact Now', 'fitmascore' ),
        ),
        array(
            'id'           => 'fitmascore_banner_widget_bg',
            'type'         => 'upload',
            'title'        => esc_html__( 'Background/Image', 'fitmascore' ),
            'library'      => 'image',
            'placeholder'  => 'http://',
            'button_title' => esc_html__( 'Add Image', 'fitmascore' ),
            'remove_title' => esc_html__( 'Remove Image', 'fitmascore' ),
        ),
    ),
) );

// OutPut
if ( !function_exists( 'fitmascore_nabber_widget' ) ) {
    function fitmascore_nabber_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        ?>
            <div class="fitmascore-widget-banner-wrapper" style="background-image:url(<?php echo esc_url( $instance['fitmascore_banner_widget_bg'] ); ?>)">
                <?php if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }?>
                <div class="fitmascore-banner-dec">
                    <p><?php echo esc_html( $instance['fitmascore_banner_dec'] ); ?></p>
                </div>
                <div class="fitmascore-banner-btn button">
                    <a href="<?php echo esc_url( $instance['fitmascore_banner_link']['url'] ); ?>" class="theme-btns"><span><?php echo esc_html( $instance['fitmascore_banner_link_text'] ); ?><i class="fas fa-angle-double-right"></i></span></a>
                </div>
            </div>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}