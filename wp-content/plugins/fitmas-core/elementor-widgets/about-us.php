<?php namespace Elementor;

class about_us_Widget extends Widget_Base {

    public function get_name() {

        return 'about_us_widget';
    }

    public function get_title() {
        return esc_html__( 'Fitmas About Us', 'fitmascore' );
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
            'about_options_content',
            [
                'label' => esc_html__( 'About Content', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_full_container',
            [
                'label'        => esc_html__( 'Enable Full Container', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
			'select_style',
			[
				'label' => esc_html__( 'Select Style', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one' => esc_html__( 'One', 'fitmascore' ),
					'two'  => esc_html__( 'Tow', 'fitmascore' ),
				],
			]
		);
        $this->add_control(
            'stitle',
            [
                'label'   => esc_html__( 'Small Title', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'MORE ABOUT US', 'fitmascore' ),
				'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label'      => esc_html__( 'Title', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::TEXTAREA,
                'default'    => __( 'Unlock Your Full Potential, Achieve Your Goals. ', 'fitmascore' ),
				'label_block' => true,
                'show_label' => true,
                'dynamic'    => [
                    'active' => true,
                ],
            ]
        );
		 $this->add_control(
            'title_tag',
            [
                'label'   => __( 'Select Title Tag', 'fitmascore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1'   => __( 'H1', 'fitmascore' ),
                    'h2'   => __( 'H2', 'fitmascore' ),
                    'h3'   => __( 'H3', 'fitmascore' ),
                    'h4'   => __( 'H4', 'fitmascore' ),
                    'h5'   => __( 'H5', 'fitmascore' ),
                    'h6'   => __( 'H6', 'fitmascore' ),
                    'span' => __( 'Span', 'fitmascore' ),
                ],
            ]
        );
        $this->add_control(
            'content',
            [
                'label'   => esc_html__( 'Description', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'Welcome to GymFit. your ultimate destination for achieving your fitness goals. We understand the importance of leading a healthy lifestyle and provide a top-notch fitness facility to support you in your fitness journey.', 'fitmascore' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'enable_list',
            [
                'label'        => esc_html__( 'Enable List', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition' => [
                    'select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'list_title',
            [
                'label'      => esc_html__( 'List Title', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::TEXTAREA,
                'default'    => __( 'MECHANIC’S SPECIAL SERVICES:', 'fitmascore' ),
                'show_label' => true,
                'dynamic'    => [
                    'active' => true,
                ],
                'condition' => [
                    'select_style' => 'two',
                    'enable_list' => 'yes',
                ],
            ]
        );
        $repeater = new Repeater();
       
        $repeater->add_control(
            'list_item',
            [
                'label'       => __( 'List', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'list_repeter',
            [
                'label'       => __( 'List Items', 'fitmascore' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'list_item'       => esc_html__( 'Emergency Solutions Anytime', 'fitmascore' ),
                    ],
                    [
                        'list_item'       => esc_html__( 'Affordable price upto 2 years', 'fitmascore' ),
                    ],
                    [
                        'list_item'       => esc_html__( 'Reliable & Experienced Team', 'fitmascore' ),
                    ],
                    [
                        'list_item'       => esc_html__( 'Reliable & Experienced Team', 'fitmascore' ),
                    ],
                ],
                'title_field' => '{{{ list_item }}}',
                'condition' => [
                    'select_style' => 'two',
                    'enable_list' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
			'content_width',
			[
				'label' => esc_html__( 'List Item Width', 'fitmascore' ),
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
					'{{WRAPPER}} .list-column-width' => 'width: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'select_style' => 'two',
                    'enable_list' => 'yes',
                ],
			]
		);
        $this->add_control(
            'enable_button',
            [
                'label'        => esc_html__( 'Enable Button', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition' => [
                    'select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label'       => __( 'Button Text', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'MAKE AN APPOINTMENT', 'fitmascore' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'select_style' => 'two',
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label'         => __( 'Link', 'fitmascore' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => __( 'htecos://your-link.com', 'fitmascore' ),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'dynamic'       => [
                    'active' => true,
                ],
                'condition' => [
                    'select_style' => 'two',
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();

        // *********************************************************
        //                Box Style Css
        // *********************************************************

        $this->start_controls_section(
            'box_css_options',
            [
                'label' => esc_html__( 'Box', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label'     => __( 'Alignment', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'    => [
                        'title' => __( 'Left', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'  => [
                        'title' => __( 'Center', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'   => [
                        'title' => __( 'Right', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .title-area' => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .list-column-width ul li' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .title-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .title-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

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
                'selector' => '{{WRAPPER}} .sec-text',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-text' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .sec-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .sec-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'checklist_title_css_options',
            [
                'label' => esc_html__( 'List Title Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'two',
                    'enable_list' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'checklist_title_typo',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .checklist-title',
            ]
        );
        $this->add_responsive_control(
            'checklist_title_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .checklist-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'checklist_title_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .checklist-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'checklist_title_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .checklist-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'checklist_css_options',
            [
                'label' => esc_html__( 'Check List Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'two',
                    'enable_list' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'checklist_typo',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .checklist li',
            ]
        );
        $this->add_responsive_control(
            'checklist_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .checklist li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'checklist_icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .checklist li i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'checklist_icon_typo',
                'label'    => esc_html__( 'Icon Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .checklist li i',
            ]
        );
        $this->add_responsive_control(
            'checklist_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .checklist li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'checklist_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .checklist li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'condition' => [
                    'enable_button' => 'yes',
                    'select_style' => 'two',
                ],
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
                'selector' => '{{WRAPPER}} .btn.style3',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn.style3::before',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.style3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn.style3',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn.style3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn.style3',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn.style3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .btn.style3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography_hover',
                'selector' => '{{WRAPPER}} .btn.style3:hover:before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn.style3:hover',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.style3:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn.style3:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn.style3:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn.style3:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }
    
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        if ( $settings['enable_full_container'] == 'yes' ) {
            $container = 'container-fluid';
        } else {
            $container = 'container';
        }
        ob_start();
        ?>
         
            <div class="about-content-wrapper">
                <div class="<?php echo esc_attr( $container ); ?>">
                    <?php if ( $settings['select_style'] == 'one' ) : ?>
                        <div class="about-content-wrap">
                            <div class="title-area mb-0">
                                <?php if ( ! empty( $settings['stitle'] ) ) :?> <span class="sub-title"> <?php echo esc_html($settings['stitle']); ?> </span> <?php endif?>
                                <?php if ( ! empty( $settings['title'] ) ) :?>
									<<?php echo esc_attr( $settings['title_tag'] ); ?> class="sec-title"> 
										<?php echo esc_html($settings['title']); ?>   
									 </<?php echo esc_attr( $settings['title_tag'] ); ?>>
								<?php endif?>
                                <?php if ( ! empty( $settings['content'] ) ) :?>  <div class="sec-text"> <?php echo wp_kses_post( $settings['content'] ); ?> </div> <?php endif?>
                            </div>
                        </div>
                    <?php endif;?>
                    <?php if ( $settings['select_style'] == 'two' ) : ?>
                        <div class="title-area mb-0">
                            <?php if ( ! empty( $settings['stitle'] ) ) :?>
                                <span class="sub-title style2"> <?php echo esc_html($settings['stitle']); ?> </span>
                            <?php endif?>
                            <?php if ( ! empty( $settings['title'] ) ) :?>
							
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> class="sec-title"> <?php echo esc_html($settings['title']); ?> </<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <?php endif?>
                            <?php if ( ! empty( $settings['content'] ) ) : ?>
                                <div class="sec-text mb-10"> <?php echo wp_kses_post( $settings['content'] ); ?> </div>
                            <?php endif?>
                            <?php if ( $settings['enable_list'] == 'yes' ): ?>
                                <div class="checklist">
                                    <?php if ( ! empty( $settings['list_title'] ) ) :?>
                                        <h6 class="checklist-title fw-semibold"><?php echo esc_html($settings['list_title']); ?></h6>
                                    <?php endif?>
                                    <div class="row">
                                        <div class="list-column-width">
                                            <ul>
                                                <?php foreach ( $settings['list_repeter'] as $item ): ?>   
                                                    <li><?php echo esc_html($item['list_item']); ?></li>
                                                <?php endforeach?>   
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endif?>
                            <?php if ( $settings['enable_button'] == 'yes' ): 
                                if ( ! empty( $settings['btn_link']['url'] ) ) {
                                    $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
                                }?>
                                <a class="btn style3" <?php echo $this->get_render_attribute_string( 'btn_link' ); ?>><?php echo esc_html($settings['btn_text']); ?> </a>
                            <?php endif?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        <?php
echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new about_us_Widget );