<?php namespace Elementor;

class about_image_four_Widget extends Widget_Base {

    public function get_name() {

        return 'about_image_four';
    }

    public function get_title() {
        return esc_html__( 'Fitmas About Image V4', 'fitmascore' );
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
            'about_options',
            [
                'label' => esc_html__( 'Image', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'enable_container',
			[
				'label' => esc_html__( 'Enable Container', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'fitmascore' ),
				'label_off' => esc_html__( 'Hide', 'fitmascore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
            'image',
            [
                'label' => __( 'Image One', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'image_one_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .image-style-one',
			]
		);

        $this->add_control(
            'content',
            [
                'label'       => __( ' Content', 'fitmascore' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'SUCCESSFUL HAPPY STUDENTS ', 'fitmascore' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'number',
            [
                'label'       => __( 'Number', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( '1580', 'fitmascore' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'Image Two', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
            'image2',
            [
                'label' => __( 'Image One', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->add_control(
            'content2',
            [
                'label'       => __( ' Content', 'fitmascore' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'YEARS WORKING EXPERIENCE ', 'fitmascore' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'number2',
            [
                'label'       => __( 'Number', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( '25', 'fitmascore' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();


        // // **********************************
        //         Image Style 
        //  ************************************ 

        $this->start_controls_section(
            'image_CSS_options',
            [
                'label' => esc_html__( 'Image Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
               
            ]
        );

        $this->add_responsive_control(
			'Image_height',
			[
				'label' => esc_html__( 'image Height', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wcu-thumb2 img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'Image_max_height',
			[
				'label' => esc_html__( 'image Max Height', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wcu-thumb2 img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'image_width',
			[
				'label' => esc_html__( 'Image Width', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wcu-thumb2 img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'object',
            [
                'label' => esc_html__( 'Object Fit', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'fill'  => esc_html__( 'Fill', 'fitmascore' ),
                    'contain' => esc_html__( 'Contain', 'fitmascore' ),
                    'cover' => esc_html__( 'Cover', 'fitmascore' ),
                    'none' => esc_html__( 'None', 'fitmascore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .wcu-thumb2 img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'img_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .wcu-thumb2 img',
            ]
        );
        $this->add_responsive_control(
            'img_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .wcu-thumb2 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'img_shadow',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .wcu-thumb2 img',
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .wcu-thumb2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .wcu-thumb2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // *********************************************************
        //                Icon Style Css
        // *********************************************************


		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__( 'Content Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'content_color',
			[
				'label'     => esc_html__( 'Color', 'fitmascore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wcu-grid_text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typo',
				'label'    => esc_html__( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .wcu-grid_text',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wcu-grid2',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .wcu-grid2',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .wcu-grid2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
			'content_margin',
			[
				'label'      => esc_html__( 'Number Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .wcu-grid2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => esc_html__( 'Number Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .wcu-grid2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
        ?>
            <div class="container">
                <div class="row">
                    <div class="align-self-center order-xl-2">
                        <div class="wcu-thumb-wrap ms-xl-5 mb-xl-0 mb-40">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="wcu-thumb2">
                                    <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' );?>
                                    </div>
                                    <div class="wcu-grid2 image-style-one mt-4" >
                                        <div class="details">
                                            <span class="wcu-grid_text"> <span class="counter-number"><?php echo esc_html( $settings['number'] ); ?> </span> <?php echo esc_html($settings['content']); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="wcu-grid2 mb-4 mt-sm-0 mt-4 bg-theme">
                                        <div class="details">
                                            <span class="wcu-grid_text"> <span class="counter-number"><?php echo esc_html( $settings['number2'] ); ?> </span> <?php echo esc_html( $settings['content2'] ); ?> </span>
                                        </div>
                                    </div>
                                    <div class="wcu-thumb2">
                                    <?php echo wp_get_attachment_image( $settings['image2']['id'], 'full' );?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new about_image_four_Widget );