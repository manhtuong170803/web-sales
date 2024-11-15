<?php namespace Elementor;

class fitmas_slider_banner_Widget extends Widget_Base {

    public function get_name() {

        return 'fitmascore_slider_banner';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Slider', 'fitmascore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['fitmascore'];
    }
    protected function register_controls() {

        //Content tab start
        $this->start_controls_section(
            'slider_content',
            [
                'label' => esc_html__( 'Hero Section', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_container',
            [
                'label'        => esc_html__( 'Enable Container', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'slide_image',
            [
                'label'       => __( 'Slide Background Image', 'fitmascore' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'slide_shape_image',
            [
                'label'       => __( 'Slide Background Image', 'fitmascore' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'slide_subtitle',
            [
                'label' => __( 'Subtitle', 'fitmascore' ),
                'type'  => Controls_Manager::TEXTAREA,
                'rows'  => 5,
            ]
        );

        $repeater->add_control(
            'slide_title_start',
            [
                'label'       => esc_html__( 'Title Start', 'fitmascore' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
		 $repeater->add_control(
            'slide_title_meddile',
            [
                'label'       => esc_html__( 'Title Meddile', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
		 $repeater->add_control(
            'slide_title_end',
            [
                'label'       => esc_html__( 'Title End', 'fitmascore' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'enable_button',
            [
                'label'        => esc_html__( 'Enable Button', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'separator'    => 'before',
            ]
        );
        $repeater->add_control(
            'button_text',
            [
                'label'       => __( 'Button Text', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Type button text here.', 'fitmascore' ),
                'condition'   => [
                    'enable_button' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label'         => __( 'Button URL', 'fitmascore' ),
                'type'          => Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'fitmascore' ),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => false,
                    'nofollow'    => false,
                ],
                'condition'     => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'slider_list',
            [
                'label'       => esc_html__( 'Slider', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'slide_subtitle' => esc_html__( 'Welcome To Our Company', 'fitmascore' ),
						'slide_title_start' => esc_html__( 'The Best', 'fitmascore' ),
						'slide_title_meddile' => esc_html__( 'Fitness', 'fitmascore' ),
						'slide_title_end' => esc_html__( ' Studio In Town', 'fitmascore' ),
                        'button_text'    => esc_html__( 'Make Appointment', 'fitmascore' ),
                    ],
                ],
                'title_field' => '{{{ slide_subtitle }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'home_slider_options',
            [
                'label' => __( 'Hero Option Options', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'slider_height',
            [
                'label'     => __( 'Slider Height (px)', 'fitmascore' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 300,
                        'max' => 1200,
                    ],
                ],
                'devices'   => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .hero-style1' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_width',
            [
                'label'      => __( 'Content Column Width (%)', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range'      => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices'    => ['desktop', 'tablet', 'mobile'],

                'selectors'  => [
                    '{{WRAPPER}} .fitmas-column-width' => 'flex:0 0 {{SIZE}}%;max-width: {{SIZE}}%;',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_text_align',
            [
                'label'       => esc_html__( 'Content Align', 'fitmascore' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,

                'options'     => [
                    'left'   => [
                        'title' => __( 'Left', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' => __( 'Center', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],

                    'right'  => [
                        'title' => __( 'Right', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],

                'devices'     => ['desktop', 'tablet', 'mobile'],

                'selectors'   => [
                    '{{WRAPPER}} .hero-slider .row' => 'justify-content: {{VALUE}};text-align: {{VALUE}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'slider_text_align',
            [
                'label'       => esc_html__( 'Text Align', 'fitmascore' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,

                'options'     => [
                    'left'   => [
                        'title' => __( 'Left', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' => __( 'Center', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],

                    'right'  => [
                        'title' => __( 'Right', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],

                'devices'     => ['desktop', 'tablet', 'mobile'],
                'selectors'   => [
                    '{{WRAPPER}} .hero-slider .hero-style1'            => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .hero-slider .hero-style1 .btn-group' => 'justify-content: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'hero_section_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-slider .hero-style1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //Slider  options control end

        //
        // ----------------Subtitle Style------------------
        //

        $this->start_controls_section(
            'subtitle_style_options',
            [
                'label' => esc_html__( 'Subtitle', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'subtitle_title_typo',
                'label'    => __( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .hero-subtitle',
            ]
        );

        $this->add_responsive_control(
            'subtitle_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'subtitle_color_before',
            [
                'label'     => esc_html__( 'After Dote Color', 'fitmascore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-subtitle:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'subtitle_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-subtitle' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //
        // ----------------Title Style------------------
        //

        $this->start_controls_section(
            'title_style_options',
            [
                'label' => esc_html__( 'Title', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typo',
                'label'    => __( 'Typography', 'fitmascore' ),
                'selector' => '
                    {{WRAPPER}} .hero-title p,
					{{WRAPPER}} .hero-title',
            ]
        );

        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-title p, {{WRAPPER}} .hero-title' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //
        //----------------- Start Button section
        //

        $this->start_controls_section(
            'button_CSS_options',
            [
                'label' => esc_html__( 'Button CSS', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'button_margin_style',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-group' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding_style',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-group .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'buttons_tabs'
        );
        $this->start_controls_tab(
            'buttons_tabs_normal',
            [
                'label' => __( 'Normal', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'buttons_Css_typos',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-group .btn',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_ncolor',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-group .btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_nbg',
            [
                'label'     => esc_html__( 'Background Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-group .btn:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'buttons_Css_nborder',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-group .btn',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_nradisu',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',

                ],
                'selectors'  => [
                    '{{WRAPPER}} .btn-group .btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'buttons_Css_nshadow',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-group .btn',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'buttons_tabs_hover',
            [
                'label' => __( 'Hover', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hcolor',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-group .btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hbg',
            [
                'label'     => esc_html__( 'Background Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-group .btn.style2:hover:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'buttons_Css_hborder',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-group .btn:hover',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hradisu',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .btn-group .btn:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'buttons_Css_hshadow',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-group .btn:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //
        // ----------------Slider Arrow Style------------------
        //

        $this->start_controls_section(
            'slider_arrow_options_slyle',
            [
                'label' => esc_html__( 'Arrow Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'slider_arrow_typo',
                'label'    => __( 'Typography', 'fitmascore' ),
                'selector' => '
                    {{WRAPPER}} .hero-arrow .button',
            ]
        );

        $this->add_responsive_control(
            'slider_arrow_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-arrow .button' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'slider_arrow_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .hero-arrow .button',
            ]
        );

        $this->add_responsive_control(
            'slider_arrow_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .hero-arrow .button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_arrow_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .hero-arrow .button' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    //Render In HTML
    protected function render() {
        $settings = $this->get_settings_for_display();
        $SliderId = rand( 1241, 3256 );

        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ?>
            <div class="hero-wrapper hero-1" id="hero">
                <div class="global-carousel" id="heroSlider1" data-fade="true" data-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true">
                    <?php foreach ( $settings['slider_list'] as $item ): ?>
                        <div class="hero-slider" style="background-image: url(<?php echo esc_url( $item['slide_image']['url'] ) ?>)">
                            <div class="hero-shape1 shape-mockup movingX" data-bottom="165px" data-right="0">
                                <?php echo wp_get_attachment_image( $item['slide_shape_image']['id'], 'full' ); ?>
                            </div>
                            <div class="<?php echo esc_attr( $container ); ?>">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-7 col-md-9 fitmas-column-width">
                                        <div class="hero-style1">
                                            <?php if ( !empty( $item['slide_subtitle'] ) ): ?>
                                                <span class="hero-subtitle" data-ani="slideinup" data-ani-delay="0s"> <?php echo esc_html( $item['slide_subtitle'] ); ?> </span>
                                            <?php endif;?>

                                            <?php if ( !empty( $item['slide_title'] ) ): ?>
                                            <h1 class="hero-title text-white" data-ani="slideinup" data-ani-delay="0.1s"> 
												<?php echo wp_kses_post( $item['slide_title_start'] ); ?>
												<span><?php echo wp_kses_post( $item['slide_title_meddile'] ); ?></span>
												<?php echo wp_kses_post( $item['slide_title_end'] ); ?>
											</h1>
                                            <?php endif;?>

                                            <?php if ( $item['enable_button'] == 'yes' ):
            $target = $item['button_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $item['button_link']['nofollow'] ? ' rel="nofollow"' : '';
            ?>
	                                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.2s">
	                                                    <a href="contact.html" class="btn style2"> <?php echo esc_html( $item['button_text'] ) ?> </a>
	                                                </div>
	                                            <?php endif;?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                    <div class="hero-arrow">
                        <button data-slick-prev="#heroSlider1" class="slick-arrow slick-prev slider-slick-prev">PREV</button>
                        <button data-slick-next="#heroSlider1" class="slick-arrow slick-next slider-slick-next">NEXT</button>
                    </div>
            </div>
           
	    <?php
}
}
Plugin::instance()->widgets_manager->register( new fitmas_slider_banner_Widget );
