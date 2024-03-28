<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// No access of directly access

class FitmasElementorWidget {
    private static $instance = null;
    public static function get_instance() {
        if ( !self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function init() {
        add_action( 'elementor/widgets/register', array( $this, 'fitmascore_elementor_widgets' ) );
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);
    }

    public function widget_scripts() {

        wp_enqueue_script(
            'fitmas-backend-script',
            FITMAS_CORE_ASSETS . 'js/fitmas-backend.js',
            array('jquery'),
            false,
            true
		);

	}
    
    public function fitmascore_elementor_widgets() {
        // Check if the Elementor plugin has been installed / activated.
        if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {
            require_once 'title.php';
            require_once 'slider.php';
            require_once 'hero.php';
            require_once 'slider-two.php';
            require_once 'service-one.php';
            require_once 'service-two.php';
            require_once 'service-three.php';
            require_once 'service-four.php';
            require_once 'about-image.php';
            require_once 'about-image-two.php';
            require_once 'about-us.php';
            require_once 'fitmas-tabs.php';
            require_once 'call-to-action.php';
            require_once 'faq.php';
            require_once 'faq-two.php';
            require_once 'pricing-table.php';
            require_once 'counter-one.php';
            require_once 'counter-two.php';
            require_once 'counter-three.php';
             require_once 'testimonial-one.php';
             require_once 'testimonial-two.php';
            require_once 'about-image-three.php';
            require_once 'about-image-four.php';
            require_once 'icon-box-one.php';
            require_once 'blog-one.php';
            require_once 'blog-two.php';
            require_once 'blog-three.php';
            require_once 'team-one.php';
            require_once 'team-two.php';
            require_once 'team-three.php';
            require_once 'team-four.php';
            require_once 'team-five.php';
            require_once 'team-details.php';
            require_once 'video-batton.php';
            require_once 'portfolio-one.php';
            require_once 'portfolio-two.php';
            require_once 'portfolio-details.php';
            require_once 'ad-slider.php';
            require_once 'button.php';
            require_once 'contact-one.php';
            require_once 'contact-two.php';
            require_once 'gallery.php';
            require_once 'gallery-two.php';
            require_once 'icon-list.php';
            require_once 'widget-schedule.php';
            require_once 'fitmas-image.php';
            require_once 'fitmas-tab-two.php';
            require_once 'training-schedule.php';
            require_once 'sinple-table.php';
            require_once 'bmi-calculator.php';
             require_once 'contact-form.php';
            require_once 'header-template/header-one.php';
            require_once 'header-template/header-two.php';
            require_once 'header-template/header-three.php';
            require_once 'footer-template/footer-one.php';
            require_once 'footer-template/footer-two.php';
 
        }
    }
}
FitmasElementorWidget::get_instance()->init();

function fitmascore_elementor_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
        'fitmascore',
        [
            'title' => __( 'Fitmas Elements', 'fitmascore' ),
        ]
    );
    $elements_manager->add_category(
        'fitmas_header_template',
        [
            'title' => __( 'Fitmas Header Template', 'fitmascore' ),
        ]
    );
    $elements_manager->add_category(
        'fitmas_footer_template',
        [
            'title' => __( 'Fitmas Footer Template', 'fitmascore' ),
        ]
    );

}
add_action( 'elementor/elements/categories_registered', 'fitmascore_elementor_widget_categories' );