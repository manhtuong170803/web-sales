<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

CSF::createWidget( 'fitmascore_gallery_widget', array(
    'title'       => esc_html__( 'Fitmas Gallery Widget', 'fitmascore' ),
    'classname'   => 'widget_gallery',
    'description' => esc_html__( 'Add Your Gallery Image', 'fitmascore' ),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => esc_html__( 'Title', 'fitmascore' ),
        ),
        array(
            'id'           => 'fitmascore_gallery_image',
             'type'  => 'gallery',
            'title'        => esc_html__( 'Author Image', 'fitmascore' ),
            'library'      => 'image',
            'placeholder'  => 'http://',
            'button_title' => esc_html__( 'Add Image', 'fitmascore' ),
            'remove_title' => esc_html__( 'Remove Image', 'fitmascore' ),
        ),
    ),
) );

// OutPut
if ( !function_exists( 'fitmascore_gallery_widget' ) ) {
    function fitmascore_gallery_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }
        ?>

<div class="insta-feed">
            <?php
            $gallery_opt = $instance['fitmascore_gallery_image']; 
            $gallery_ids = explode( ',', $gallery_opt );
                if ( ! empty( $gallery_ids ) ) {
                    foreach ( $gallery_ids as $gallery_item_id ) { ?> 
                        <a href="<?php  echo wp_get_attachment_url( $gallery_item_id );?>"> <?php echo wp_get_attachment_image( $gallery_item_id, 'full' ); ?><i class="far fa-eye"></i> </a>  
           <?php  }} ?>
        </div>
            
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}