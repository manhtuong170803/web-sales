<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.
// Contact info

CSF::createWidget( 'fitmascore_company_info_widget', array(
    'title'       => esc_html__( 'Fitmas Company Info', 'fitmascore' ),
    'classname'   => 'fitmascore_company_info_widget eco-custom-widget',
    'description' => esc_html__( 'Add Your Company Info', 'fitmascore' ),
    'fields'      => array(
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => esc_html__( 'Title', 'fitmascore' ),
        ),
        array(
            'id'      => 'cinfo_img_enable',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Logo', 'fitmascore' ),
            'default' => true,
        ),

        array(
            'id'          => 'cinfo_img',
            'type'        => 'media',
            'title'       => esc_html__( 'Upload Logo', 'fitmascore' ),
            'library'     => 'image',
            'preview'     => true,
            'placeholder' => 'http://',
            'dependency'  => array( 'cinfo_img_enable', '==', 'true' ), // check for true/false by field id
        ),
        array(
            'id'      => 'fitmascore_conpany_info_dec',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Content', 'fitmascore' ),
            'default' => esc_html__( 'Protecting biodiversity and natural habitats is crucial for maintaining a healthy and sustainable ecology.', 'fitmascore' ),
        ),
    ),
) );

// OutPut

if ( !function_exists( 'fitmascore_company_info_widget' ) ) {
    function fitmascore_company_info_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        ?>
        <?php
if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }?>
        <div class="company-info-widget">
            <?php if ( $instance['cinfo_img_enable'] == true ): $logo = $instance['cinfo_img'];?>
		            <div class="conpany-info-img">
		                <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php esc_html_e( 'fitmascore by Fitmas', 'fitmascore' );?>">
		            </div>
		            <?php endif;?>
            <p><?php echo esc_html( $instance['fitmascore_conpany_info_dec'] ); ?></p>
            
        </div>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}