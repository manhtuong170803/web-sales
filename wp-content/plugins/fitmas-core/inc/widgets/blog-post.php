<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

// Blog Post

CSF::createWidget( 'fitmascore_blog_post_widget', array(
    'title'       => esc_html__( 'Fitmas Post With Thumbnail', 'fitmascore' ),
    'classname'   => 'footer-widget-post-with-thum eco-custom-widget',
    'description' => esc_html__( 'Add your Contact Info', 'fitmascore' ),
    'fields'      => array(
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => esc_html__( 'Title', 'fitmascore' ),
        ),
        array(
            'id'      => 'fitmascore_widget_blog_position',
            'type'    => 'select',
            'title'   => esc_html__( 'Select Options', 'fitmascore' ),
            'options' => array(
                'ASC'  => esc_html__( 'ASC', 'fitmascore' ),
                'DESC' => esc_html__( 'DESC', 'fitmascore' ),
            ),
            'default' => 'ASC',
        ),
        array(
            'id'      => 'fitmascore_widget_blog_number',
            'type'    => 'number',
            'title'   => esc_html__( 'Show Post', 'fitmascore' ),
            'default' => 2,
        ),
        array(
            'id'      => 'fitmascore_widget_blog_show_meta',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Meta', 'fitmascore' ),
            'default' => true,
        ),
        array(
            'id'      => 'fitmascore_widget_blog_show_image',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Image', 'fitmascore' ),
            'default' => true,
        ),
        array(
            'id'      => 'fitmascore_widget_blog_text_limit',
            'type'    => 'number',
            'title'   => esc_html__( 'Title Text Limit', 'fitmascore' ),
            'default' => 5,
        ),
    ),
) );

// OutPut

if ( !function_exists( 'fitmascore_blog_post_widget' ) ) {
    function fitmascore_blog_post_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }
        ?>
        <div class="recent-post-wrap">
            <?php
            $post_q = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => $instance['fitmascore_widget_blog_number'],
                'order'          => $instance['fitmascore_widget_blog_position'],
            ) );
             if ( $post_q->have_posts() ):
                        while ( $post_q->have_posts() ):
                        $post_q->the_post();
                        ?>
                <div class="recent-post">
                    <div class="media-img">
                        <?php if ( !empty( $instance['fitmascore_widget_blog_show_image'] == true ) ) {
                            the_post_thumbnail( 'thumbnail' );
                        }?>
                    </div>
                    <div class="media-body">
                        <a class="post-title" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo wp_trim_words( get_the_title(), $instance['fitmascore_widget_blog_text_limit'] ); ?></a>
                        <?php if ( !empty( $instance['fitmascore_widget_blog_show_meta'] == true ) ): ?>
                            <div class="recent-post-meta"> <?php echo get_the_date() ?> </div>
                        <?php endif;?>
                    </div>
                </div>
            <?php endwhile;endif;?>
        </div>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}
