<?php namespace Elementor;

class fitmas_hero_banner_Widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_hero';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Hero', 'fitmascore' );
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
        $this->add_control(
            'slide_image',
            [
                'label'       => __( 'Background Image', 'fitmascore' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'slide_title',
            [
                'label'       => esc_html__( 'Title', 'fitmascore' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'rows'        => 10,
                'default' => esc_html__( 'REDEFINE YOUR LIMITS, EMBRACE THE JOURNEY.', 'fitmascore' ),
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'fitmascore' ),
                'description' => esc_html__( 'Add HTML Tag For Small Title', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h1',
                'options' => [
                    'h1'  => esc_html__( 'H1', 'fitmascore' ),
                    'h2'  => esc_html__( 'H2', 'fitmascore' ),
                    'h3'  => esc_html__( 'H3', 'fitmascore' ),
                    'h4'  => esc_html__( 'H4', 'fitmascore' ),
                    'h5'  => esc_html__( 'H5', 'fitmascore' ),
                    'h6'  => esc_html__( 'H6', 'fitmascore' ),
                    'p'  => esc_html__( 'P', 'fitmascore' ),
                    'span'  => esc_html__( 'span', 'fitmascore' ),
                    'div'  => esc_html__( 'Div', 'fitmascore' ),
                ],
            ]
        );
        $this->add_control(
            'form_text',
            [
                'label'       => __( 'Form Title', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'BOOK YOUR SEAT:', 'fitmascore' ),
            ]
        );
        $this->add_control(
            'shortcode_text',
            [
                'label'       => __( 'Short code', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Type Short Code text here.', 'fitmascore' ),
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
			'box_align',
			[
				'label' => esc_html__( 'Alignment', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'fitmascore' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'fitmascore' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'fitmascore' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .hero-style3 .hero-title' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'reverge',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Row Reverse', 'fitmascore' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'fitmascore' ),
						'icon' => 'eicon-long-arrow-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'fitmascore' ),
						'icon' => 'eicon-long-arrow-right',
					],
				],
                'toggle'  => true,
                'selectors_dictionary' => [
                    'right'   => 'flex-direction:row',
                    'left'  => 'flex-direction:row-reverse',
                ],
                'selectors'            => [
                    '{{WRAPPER}} .hero-wrapper .row' => '{{VALUE}}',
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
                    '{{WRAPPER}} .hero-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

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
                'selector' => ' {{WRAPPER}} .hero-style3 .hero-title',
            ]
        );

        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    ' {{WRAPPER}} .hero-style3 .hero-title' => 'color: {{VALUE}};',

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
                    '{{WRAPPER}} .hero-style3 .hero-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .hero-style3 .hero-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

      
        $this->start_controls_section(
            'form_box_style',
            [
                'label' => __( 'Form Box Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__('Background', 'fitmascore'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .appointment-form',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__('Border', 'fitmascore'),
                'selector' => '{{WRAPPER}} .appointment-form',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .appointment-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__('Box Shadow', 'fitmascore'),
                'selector' => '{{WRAPPER}} .appointment-form',
            ]
        );
        $this->add_responsive_control(
            'form_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .appointment-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'form_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .appointment-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'form_title_style_options',
            [
                'label' => esc_html__( 'Form Title Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'form_title_typo',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => ' {{WRAPPER}} .appointment-form .form-title',
            ]
        );

        $this->add_responsive_control(
            'form_title_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    ' {{WRAPPER}} .appointment-form .form-title' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'form_title_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .appointment-form .form-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'form_title_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .appointment-form .form-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'form_style',
            [
                'label' => __( 'Form Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'form_typo',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => ' {{WRAPPER}} .form-control',
            ]
        );
        $this->add_responsive_control(
            'form_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    ' {{WRAPPER}} .form-control' => 'color: {{VALUE}};',

                ],
            ]
        );      
        $this->add_responsive_control(
            'form_placeholder_color',
            [
                'label'     => esc_html__( 'Placeholder Color', 'fitmascore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    ' {{WRAPPER}} .form-control::placeholder' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'form_backgrounds',
                'label'    => esc_html__('Background', 'fitmascore'),
                'types'    => ['classic', 'gradient'],
                'selector' => '
                {{WRAPPER}} .select.style-border2,
                {{WRAPPER}} .single-select.style-border2,
                {{WRAPPER}} .form-control.style-border2,
                {{WRAPPER}} .form-select.style-border2,
                {{WRAPPER}} .textarea.style-border2'
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'form_border',
                'label'    => esc_html__('Border', 'fitmascore'),
                'selector' => '
                {{WRAPPER}} .select.style-border2,
                {{WRAPPER}} .single-select.style-border2,
                {{WRAPPER}} .form-control.style-border2,
                {{WRAPPER}} .form-select.style-border2,
                {{WRAPPER}} .textarea.style-border2',
            ]
        );
        $this->add_responsive_control(
            'form_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .select.style-border2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .single-select.style-border2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .form-control.style-border2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .form-select.style-border2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .textarea.style-border2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'form_shadow',
                'label'    => esc_html__('Box Shadow', 'fitmascore'),
                'selector' => '
                {{WRAPPER}} .select.style-border2,
                {{WRAPPER}} .single-select.style-border2,
                {{WRAPPER}} .form-control.style-border2,
                {{WRAPPER}} .form-select.style-border2,
                {{WRAPPER}} .textarea.style-border2',
            ]
        );
        $this->add_responsive_control(
            'form_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .form-control' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};', 
                ],
            ]
        );
        $this->add_responsive_control(
            'form_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .form-control' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
            // -----------------------------------------------
        // -------------- Button Style Start -------------
        // -----------------------------------------------

        $this->start_controls_section(
            'button_CSS_options',
            [
                'label'     => esc_html__( 'Button CSS One', 'fitmascore' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'button_content_tabs'
        );
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => __( 'Normal', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography',
                'selector' => '{{WRAPPER}} .appointment-form .btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .appointment-form .btn',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .appointment-form .btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .appointment-form .btn',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .appointment-form .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .appointment-form .btn',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .appointment-form .btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .appointment-form .btn ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
		
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover',
            [
                'label' => __( 'Hover', 'fitmascore' ),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn.style5:hover:before',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.style5:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn.style5:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn.style5:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn.style5:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }

    //Render In HTML
    protected function render() {
        $settings = $this->get_settings_for_display();
        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ?>
        <div class="hero-wrapper hero-3 background-image" id="hero" style="background-image: url(<?php echo esc_url( $settings['slide_image']['url'] ) ?>);">
        <div class="<?php echo esc_attr( $container ); ?>">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-style3">
                        <<?php echo esc_attr($settings['title_tag']);?> class="hero-title"> <?php echo esc_html( $settings['slide_title'] ); ?> </<?php echo esc_attr($settings['title_tag']);?>>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="appointment-form">
                        <h4 class="form-title"> <?php echo esc_html( $settings['form_text'] ); ?> </h4>
                        <form method="POST" class="bmi-form ajax-contact">
                            <?php echo do_shortcode( $settings['shortcode_text'] );?>
                        </form>
                    </div> 
                </div>
            </div>                
        </div>
    </div>
<?php
}
}
Plugin::instance()->widgets_manager->register( new fitmas_hero_banner_Widget );
