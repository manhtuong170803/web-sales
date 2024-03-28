<?php namespace Elementor;

class testimonial_one_Widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_testimonial_one';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Testimonial V1', 'fitmascore' );
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
            'fitmas_title_options',
            [
                'label' => esc_html__( 'Fitmas Testomonial', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'stitle',
            [
                'label' => esc_html__( 'Small Title', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Feedbacks', 'fitmascore' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Trusted Testimonials', 'fitmascore' ),
                'show_label' => true,
                'dynamic' => [
                   'active' => true,
                ],
            ]
        );
        $this->add_control(
			'section_image',
			[
				'label' => esc_html__( 'Section Background Image', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		 $this->add_responsive_control(
            'bg_image_object',
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
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
            'name',
            [
                'label'       => esc_html__( 'Name', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
     

        $repeater->add_control(
            'designation',
            [
                'label'       => esc_html__( 'Desiganation', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label'       => esc_html__( 'Description', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'rating',
            [
                'label' => __('Rating', 'fitmascore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => .5,
                    ],
                ],
                'default' => [
                    'size' => 5,
                ],
            ]
        );
        $this->add_control(
            'fitmas_repeater_list',
            [
                'label'       => esc_html__( 'Repeater List', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'name' => esc_html__( 'William Henry', 'fitmascore' ),
						'designation' => esc_html__( 'CFO/Founder', 'fitmascore' ),
                        'description' => esc_html__( '“I have been a member of Fitmas for over a year now, and it has been a game-changer for my fitness journey. The gym has a fantastic range of equipment that caters to all my workout needs”', 'fitmascore' ),
					],
                    [
						'name' => esc_html__( 'Andrew Daniel', 'fitmascore' ),
						'designation' => esc_html__( 'Gym Student', 'fitmascore' ),
                        'description' => esc_html__( '“I have been a member of Fitmas for over a year now, and it has been a game-changer for my fitness journey. The gym has a fantastic range of equipment that caters to all my workout needs”', 'fitmascore' ),
					],
				],
                'title_field' => '{{{ name }}}',
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
     
        $this->end_controls_section();

	  	 // **********************************
        //         Background Imagr Style 
        //  ************************************ 

              $this->start_controls_section(
            'image_CSS_options',
            [
                'label' => esc_html__( 'Background Image Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
               
            ]
        );

        $this->add_responsive_control(
			'bg_Image_height',
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
					'{{WRAPPER}} .testimonial-bg-thumb1 .thumb img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'bg_Image_max_height',
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
					'{{WRAPPER}} .testimonial-bg-thumb1 .thumb img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'bg_image_width',
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
					'{{WRAPPER}} .testimonial-bg-thumb1 .thumb img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
            'bg_object',
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
                    '{{WRAPPER}} .testimonial-bg-thumb1 .thumb img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'background_image_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .testimonial-bg-thumb1 .thumb img',
            ]
        );

        $this->add_responsive_control(
            'background_image_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-bg-thumb1 .thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'bg_image_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-bg-thumb1 .thumb img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'bg_image_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-bg-thumb1 .thumb img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
		
        //=================================================//
        //========= TESTIMONIAL BOX STYLE START===========//
        //===============================================//
        $this->start_controls_section(
            'section-title_style',
            [
                'label' => esc_html__( 'Heading Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'heading_style_tabs'
        );
        
        $this->start_controls_tab(
            'stitle_normal_tab',
            [
                'label' => esc_html__( 'Small Title', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_title_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .sub-title',
			]
		);

		$this->add_responsive_control(
			'subtitle_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sub-title' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'subtitle_backgrounds',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .sub-title',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'subtitle_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .sub-title',
            ]
        );
        $this->add_responsive_control(
            'subtitle_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .sub-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'subtitle_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .sub-title',
            ]
        );

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .sub-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
        $this->start_controls_tab(
            'title_normal_tab',
            [
                'label' => esc_html__( 'Title', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .sec-title,{{WRAPPER}} .sec-title p ',
			]
		);

		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title ,{{WRAPPER}} .sec-title p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .sec-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'box_tab_style',
            [
                'label' => esc_html__( 'Box Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testi-box-wrap1 ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .testi-box-wrap1',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box-wrap1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .testi-box-wrap1',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box-wrap1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box-wrap1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // 
        // ========== Testimonial Content ===========
        // 
        $this->start_controls_section(
            'image_Style',
            [
                'label' => esc_html__( ' Image Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label'      => esc_html__( 'Height', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box_thumb img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label'      => esc_html__( 'width', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box_thumb img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testi-box_thumb img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .testi-box_thumb img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box_thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box_thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box_thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'description_css_options',
            [
                'label' => esc_html__( 'Description Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'dec_typo',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .testi-box_text',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi-box_text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // 
        // ========== Testimonial Content ===========
        // 

        $this->start_controls_section(
			'testi_content_box',
			[
				'label' => esc_html__( 'Content Box Style', 'fitmascore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'content_box_backgrounds',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testi-slider-controller .indicatior-btn ',
            ]
        );
        $this->add_responsive_control(
            'active_background_color',
            [
                'label'     => esc_html__( 'Active Background Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi-slider-controller .indicatior-btn.active,
                     {{WRAPPER}} .testi-slider-controller .indicatior-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'content_box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .testi-slider-controller .indicatior-btn',
            ]
        );
        $this->add_responsive_control(
            'content_box_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-slider-controller .indicatior-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'content_box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .testi-slider-controller .indicatior-btn',
            ]
        );
        $this->add_responsive_control(
            'content_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-slider-controller .indicatior-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-slider-controller .indicatior-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'testi_name_tab',
			[
				'label' => esc_html__( 'Name Style', 'fitmascore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_name_typo',
                'selector' => '{{WRAPPER}} .testi-box_profile .testi-box_name',
            ]
        );
        $this->add_responsive_control(
            'testi_name_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi-box_profile .testi-box_name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_name_active_color',
            [
                'label'     => esc_html__( 'Active Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .indicatior-btn:hover .testi-box_profile .testi-box_name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_name_Margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box_profile .testi-box_name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_name_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-box_profile .testi-box_name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        
        $this->start_controls_section(
			'testi_designation_tab',
			[
				'label' => esc_html__( 'Designation Style', 'fitmascore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_designation_typo',
                'selector' => '{{WRAPPER}} .testimonial-designation',
            ]
        );
        $this->add_responsive_control(
            'testi_designation_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-designation' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_designation_active_color',
            [
                'label'     => esc_html__( 'Active Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .indicatior-btn:hover .testimonial-designation' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_designation_Margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_designation_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //

     
    }

    protected function rating_render($value = '') {
        $ratefull = '<i class="fas fa-star"></i>';
        $ratehalf = '<i class="Star half alt"></i>';
        $rateO = '<i class="fas fa-star"></i>';

        if ($value > 4.75) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $ratefull;
        } elseif ($value <= 4.75 && $value > 4.25) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $ratehalf;
        } elseif ($value <= 4.25 && $value > 3.75) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $rateO;
        } elseif ($value <= 3.75 && $value > 3.25) {
            return $ratefull . $ratefull . $ratefull . $ratehalf . $rateO;
        } elseif ($value <= 3.25 && $value > 2.75) {
            return $ratefull . $ratefull . $ratefull . $rateO . $rateO;
        } elseif ($value <= 2.75 && $value > 2.25) {
            return $ratefull . $ratefull . $ratehalf . $rateO . $rateO;
        } elseif ($value <= 2.25 && $value > 1.75) {
            return $ratefull . $ratefull . $rateO . $rateO . $rateO;
        } elseif ($value <= 1.75 && $value > 1.25) {
            return $ratefull . $ratehalf . $rateO . $rateO . $rateO;
        } elseif ($value <= 1.25) {
            return $ratefull . $rateO . $rateO . $rateO . $rateO;
        }
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $unique_id = rand( 2585, 8241 );
        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
      
        ob_start();
    ?>
    <div class="testimonial-area-1 ">
        <div class="testimonial-bg-thumb1">
            <div class="thumb">
                <?php echo wp_get_attachment_image( $settings['section_image']['id'], 'full' ); ?>
            </div>
        </div>
        <div class="space">
        <div class="<?php echo esc_attr($container)?>">
                <div class="row justify-content-end">
                    <div class="col-xl-8 col-lg-9">
                        <div class="testi-box-wrap1 text-center" style="background-image: url(<?php echo esc_url($settings['bg_image']['url'])?>)">
                            <div class="title-area">
                                <span class="sub-title"> <?php echo esc_html( $settings['stitle'] ); ?> </span>
                                <h2 class="sec-title text-white"><?php echo esc_html( $settings['title'] ); ?></h2>
                            </div>
                            <div class="row global-carousel testi-slider-1" data-slide-show="1">
                                <?php foreach($settings['fitmas_repeater_list'] as $item) :?>
                                    <div class="col-lg-6">
                                        <div class="testi-box">
                                            <div class="testi-box_thumb">
                                                    <?php echo wp_get_attachment_image( $item['image']['id'], 'full' ); ?>
                                                <div class="block-quote">
                                                    <i class="fas fa-quote-right"></i>
                                                </div>
                                            </div>                        
                                            <div class="testi-box_content">
                                                <p class="testi-box_text"> <?php echo esc_html( $item['description'] ); ?></p>
                                                <div class="rating"> <?php echo $this->rating_render($item['rating']['size']); ?> </div>
                                            </div>                        
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div> 
                            <div class="testi-slider-controller" data-sliderNavfor=".testi-slider-1">
                            <?php  foreach($settings['fitmas_repeater_list'] as $item) :?>
                                <a class="indicatior-btn ">
                                    <div class="testi-box_profile">
                                        <h4 class="testi-box_name"><?php echo esc_html( $item['name'] ); ?></h4>
                                        <span class="testi-box_desig"><?php echo esc_html( $item['designation'] ); ?></span>                        
                                    </div>
                                </a>
                            <?php endforeach;?>
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
Plugin::instance()->widgets_manager->register( new testimonial_one_Widget );