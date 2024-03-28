<?php
namespace Elementor;

class fitmas_footer_one_widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_footer_one';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Footer template One ', 'fitmascore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['fitmas_footer_template'];
    }


	protected function register_controls() {
		// ------------------------------
		
		$this->start_controls_section(
			'footer_icon_box',
			[
				'label' => esc_html__( 'Footer Top Content', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
            'enable_footer_icon_area',
            [
                'label'        => esc_html__( 'Enable Icon Box Area', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
            'footer_icon',
            [
                'label' => esc_html__( 'Icon', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-map-marker-alt',
                    'library' => 'fa-solid',
                ],
            ]
        );
        
		$repeater->add_control(
			'foote_Icon_Title',
			[
				'label' => esc_html__( 'Label', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
			]
		);

		$repeater->add_control(
			'footer_icon_des',
			[
				'label' => esc_html__( 'Title', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
			]
		);

		$this->add_control(
            'icon_box_list',
            [
                'label'   => esc_html__( 'box_List', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'foote_Icon_Title' => esc_html__( 'GYM LOCATION', 'fitmascore' ),
						'footer_icon_des' => esc_html__( 'Marina Lane Berlin', 'fitmascore' ),
                    ],
                ],
                'condition' => [
					'enable_footer_icon_area' => 'yes',
				],
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
			'widget_area_enable',
			[
				'label' => esc_html__( 'Widget Area', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'edit_widget_from_appearance',
			[
				'label'     => esc_html__( 'Edit Widget From Appearance?', 'fitmascore' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'fitmascore' ),
				'label_off' => esc_html__( 'No', 'fitmascore' ),
				'default'   => 'no',
				'description'   => esc_html__( 'If this option is enable then you can add / remove / edit widgets from Appearance -> Widgets -> Footer Widgets. If Disable you can only edit widgets from here.', 'fitmascore' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'widgetbackground',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .footer-widget-area',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'footer_list',
			[
				'label' => esc_html__( 'About Widget', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'edit_widget_from_appearance!' => 'yes',
				],
			]
		);

        $this->add_control(
            'about_logo',
            [
                'label' => __( 'Logo', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
       
        $this->add_control(
			'about_widget_des',
			[
				'label' => esc_html__( 'Title', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'A gym, also known as a fitness center or health club, is a facility dedicated to physical fitness and exercise gyms and typically offer a range', 'fitmascore' ),
			]
		);
        $this->add_control(
			'social_options',
			[
				'label' => esc_html__( 'Social Control ', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'fitmas_social_icon',
            [
                'label' => esc_html__( 'Icon', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'fitmas_social_icon_link',
            [
                'label' => __( 'Link', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'fitmascore' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'fitmas_social_icon_list',
            [
                'label'   => esc_html__( 'Icons List', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'fitmas_social_icon_link' => '#',
                    ],
                    [
                        'fitmas_social_icon_link' => '#',
                    ],
                    [
                        'fitmas_social_icon_link' => '#',
                    ],
                ],
            ]
        );

		$this->end_controls_section();


        $this->start_controls_section(
			'footer_link_widget',
			[
				'label' => esc_html__( 'Quick Links', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
					'edit_widget_from_appearance!' => 'yes',
				],
			]
		);
        $this->add_control(
			'Quick_Links_widget_title',
			[
				'label' => esc_html__( 'Quick Links', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Quick Links', 'fitmascore' ),
                'label_block'   => true,
			]
		);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'link_title',
			[
				'label' => esc_html__( 'Title', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'link', 'fitmascore' ),
                'label_block'   => true,
			]
		);
        $repeater->add_control(
            'link_url',
            [
                'label' => __( 'Link', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'fitmascore' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'fitmas_link_list',
            [
                'label'   => esc_html__( 'Icons List', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'link_title' => esc_html__( 'About Us', 'fitmascore' ),
                    ],
                    [
                        'link_title' => esc_html__( 'Our Mission', 'fitmascore' ),
                    ],
                    [
                        'link_title' => esc_html__( 'Meet The Teams', 'fitmascore' ),
                    ],
                    [
                        'link_title' => esc_html__( 'Our Projects', 'fitmascore' ),
                    ],
                    [
                        'link_title' => esc_html__( 'Contact Us', 'fitmascore' ),
                    ],
                ],
                'title_field' => '{{{ link_title }}}',
            ]
        );
		$this->end_controls_section();

        $this->start_controls_section(
			'gallery_content',
			[
				'label' => esc_html__( 'gallery content', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'edit_widget_from_appearance!' => 'yes',
				],
			]
		);

        $this->add_control(
			'gallery_title',
			[
				'label' => esc_html__( 'Title', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Gallery', 'fitmascore' ),
                'label_block'   => true,
			]
		);
        $this->add_control(
			'gallery_image',
			[
				'label' => esc_html__( 'Add Images', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);

		$this->end_controls_section();

        // ------------------------------

		$this->start_controls_section(
			'newslatter_control_style',
			[
				'label' => esc_html__( 'Newslatter Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'edit_widget_from_appearance!' => 'yes',
				],
			]
		);
        $this->add_control(
			'newslatter_widget_title',
			[
				'label' => esc_html__( 'Title', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Newsletter', 'fitmascore' ),
                'label_block'   => true,
			]
		);

        $this->add_control(
			'newslatter_widget_des',
			[
				'label' => esc_html__( 'Description', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Get 10% off your first order! Hurry up', 'fitmascore' ),
                'label_block'   => true,
			]
		);

        $this->add_control(
			'Contact_form',
			[
				'label' => esc_html__( 'Newslatter Form', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
			]
		);
        
		$this->end_controls_section();
		
		// ---------------------------

		$this->start_controls_section(
			'Copyright_option',
			[
				'label' => esc_html__( 'Copyright', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'Copyright',
			[
				'label'       => __( 'Copyright Text', 'fitmascore' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => 'Copyright © 2023 Fitmas All Rights Reserved.',
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		// --------------
		//-------------- Footer Style Start -----------------
		// --------------
		$this->start_controls_section(
            'footer_box_css',
            [
                'label' => esc_html__( 'Footer Box Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'footer_box_bg',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-wrapper',
            ]
        );
        $this->add_responsive_control(
            'footer_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        	// --------------
		//-------------- Footer Bottom Style Start -----------------
		// --------------

		$this->start_controls_section(
            'footer_bottom_box_css',
            [
                'label' => esc_html__( 'Footer Top Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
					'enable_footer_icon_area' => 'yes',
				],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'footer_top_box_bg',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .contact-card .info-card',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'footer_top_box_border',
                'label' => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .contact-card .info-card',
            ]
        );
        $this->add_responsive_control(
            'footer_top_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-card .info-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-card .info-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		// Icon Style

		$this->start_controls_tabs(
            'icon_tabs'
        );
        $this->start_controls_tab(
            'icon_box_normal',
            [
                'label' => __( 'Icon Style', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
            'icon_size',
            [
                'label'      => esc_html__( 'Icon Size', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .contact-card .info-card_icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_width',
            [
                'label'      => esc_html__( 'Width', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .contact-card .info-card_icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
            [
                'label'      => esc_html__( 'Height', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .contact-card .info-card_icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-card .info-card_icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .contact-card .info-card_icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__( 'icon Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .contact-card .info-card_icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .contact-card .info-card_icon',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-card .info-card_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-card .info-card_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-card .info-card_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'svg_size_note',
            [
                'label' => __( 'SVG Icon Size', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_svg_width',
            [
                'label' => esc_html__( 'SVG With', 'fitmascore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-card .info-card_icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_svg_height',
            [
                'label' => esc_html__( 'SVG Height', 'fitmascore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-card .info-card_icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

			// Footer Top Icon title Style

		$this->start_controls_tabs(
			'icon_box_tabs'
		);
		
		$this->start_controls_tab(
			'icon_box_title_tab',
			[
				'label' => esc_html__( 'Label', 'fitmascore' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'icon_box_title_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .contact-card .info-card_text',
			]
		);
		$this->add_responsive_control(
			'icon_box_title_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-card .info-card_text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_box_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .contact-card .info-card_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_box_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .contact-card .info-card_text' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		// post Date
		$this->start_controls_tabs(
			'icon_box_des_tabs'
		);
		
		$this->start_controls_tab(
			'icon_box_des_tab',
			[
				'label' => esc_html__( 'Title ', 'fitmascore' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_box_des_typo',
				'label' => esc_html__( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .contact-card .info-card_link',
			]
		);
		$this->add_responsive_control(
			'icon_box_des_color',
			[
				'label' => esc_html__( 'Color', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-card .info-card_link' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'icon_box_des_margin',
			[
				'label' => esc_html__( 'Margin', 'fitmascore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .contact-card .info-card_link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_box_des_padding',
			[
				'label' => esc_html__( 'Padding', 'fitmascore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .contact-card .info-card_link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();

        // --------------
		// ----------------Footer About Widget Style------------------
        // --------------

        $this->start_controls_section(
			'footer_widget_title_style',
			[
				'label' => esc_html__( 'Footer Wiget Title Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_title_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .footer-widget .widget_title',
			]
		);
		$this->add_responsive_control(
			'link_title_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-widget .widget_title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'link_title_border_color',
			[
				'label'       => esc_html__('Border Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-widget .widget_title:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'link_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-widget .widget_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'link_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-widget .widget_title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'about_logo_style_options',
			[
				'label' => esc_html__( 'About Wiget Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'about_logo_style_tabs'
		);
		
		$this->start_controls_tab(
			'about_logo_tab',
			[
				'label' => esc_html__( 'Logo Style', 'fitmascore' ),
			]
		);
	    $this->add_responsive_control(
			'logo_Image_height',
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
					'{{WRAPPER}} .widget-about .footer-logo img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'logo_image_width',
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
					'{{WRAPPER}} .widget-about .footer-logo img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'logo_object',
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
                    '{{WRAPPER}} .widget-about .footer-logo img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
		$this->add_responsive_control(
			'about_logo_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .widget-about .footer-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'about_logo_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .widget-about .footer-logo' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'about_des_normal_tab',
			[
				'label' => esc_html__( 'Description', 'fitmascore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'about_dec_typo',
                'label' => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .widget-about .about-text',
            ]
        );
        $this->add_responsive_control(
            'about_dec_color',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-about .about-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_dec_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .widget-about .about-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_dec_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .widget-about .about-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();

		// ------- Social Icon Style
		$this->add_control(
			'social_media_heading',
			[
				'label' => esc_html__( 'Social Icon Style', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->start_controls_tabs(
            'fitmas_social_icon_tabs'
        );
        $this->start_controls_tab(
            'fitmas_social_icon_tabs_normal',
            [
                'label' => __( 'Icon Normal', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
            'fitmas_social_icon_color',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-about .social-btn a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'fitmas_social_icon_bg',
            [
                'label' => esc_html__( 'Background Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-about .social-btn a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'fitmas_social_icon_width',
            [
                'label' => esc_html__( 'Width', 'fitmascore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-about .social-btn a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'fitmas_social_icon_height',
            [
                'label' => esc_html__( 'Height', 'fitmascore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-about .social-btn a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'fitmas_social_icon_border',
                'label' => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .widget-about .social-btn a',
            ]
        );
        $this->add_responsive_control(
            'fitmas_social_icon_radius',
            [
                'label' => esc_html__( 'Radius', 'fitmascore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-about .social-btn a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'fitmas_social_icon_shadow',
                'label' => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .widget-about .social-btn a',
            ]
        );
        $this->add_responsive_control(
            'fitmas_social_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .fitmas-social-icon-box ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'fitmas_social_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .widget-about .social-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'fitmas_social_icon_tabs_hover',
            [
                'label' => __( 'Icon Hover', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
            'fitmas_social_icon_hcolor',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-about .social-btn a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'fitmas_social_icon_hcolorbg',
            [
                'label' => esc_html__( 'Background Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-about .social-btn a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'fitmas_social_icon_hborder',
                'label' => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .widget-about .social-btn a:hover',
            ]
        );
        $this->add_responsive_control(
            'fitmas_social_icon_hradius',
            [
                'label' => esc_html__( 'Radius', 'fitmascore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-about .social-btn a:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'fitmas_social_icon_hshadow',
                'label' => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .widget-about .social-btn a:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
		$this->end_controls_section();
    
		// -----------------
		// ------------------ Link Widget Style Start ------------=
		// ------------------

		$this->start_controls_section(
			'link_style_options',
			[
				'label' => esc_html__( 'Quick Links Wiget Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_list_typo',
                'label' => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .footer-widget.widget_nav_menu a',
            ]
        );
        $this->add_responsive_control(
            'link_list_color',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-widget.widget_nav_menu a' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_responsive_control(
            'link_list_color_hover',
            [
                'label' => esc_html__( 'Hover Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-widget.widget_nav_menu a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-widget.widget_nav_menu a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-widget.widget_nav_menu a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();

		// -----------------
		// ------------------ Link Two Widget Style Start ------------=
		// ------------------

		$this->start_controls_section(
			'gallery_style_options',
			[
				'label' => esc_html__( 'Gallery Wiget Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
	
	    $this->add_responsive_control(
			'gallery_Image_height',
			[
				'label' => esc_html__( 'image Height', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sidebar-gallery .gallery-thumb img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'gallery_image_width',
			[
				'label' => esc_html__( 'Image Width', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sidebar-gallery .gallery-thumb img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'gallery_image_object',
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
                    '{{WRAPPER}} .sidebar-gallery .gallery-thumb img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'gallery_image_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .sidebar-gallery .gallery-thumb',
            ]
        );
        $this->add_responsive_control(
            'gallery_image_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .sidebar-gallery .gallery-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sidebar-gallery .gallery-thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sidebar-gallery .gallery-thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();

		$this->start_controls_section(
			'newslatter_style_control',
			[
				'label' => esc_html__( 'NewsLatter Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'newslatter_style_tabs'
		);
		
		$this->start_controls_tab(
			'newslatter_Description_tab',
			[
				'label' => esc_html__( 'Description', 'fitmascore' ),
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'newslatter_dec_typo',
				'label' => esc_html__( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .footer-text',
			]
		);
		$this->add_responsive_control(
			'newslatter_dec_color',
			[
				'label' => esc_html__( 'Color', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'newslatter_dec_margin',
			[
				'label' => esc_html__( 'Margin', 'fitmascore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .footer-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'newslatter_dec_padding',
			[
				'label' => esc_html__( 'Padding', 'fitmascore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .footer-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'newslatter_tab',
			[
				'label' => esc_html__( 'Newslatter Style', 'fitmascore' ),
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'newslatter_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .newsletter-form .form-group input[type="email"]',
			]
		);
        $this->add_control(
			'newslatter_color',
			[
				'label' => esc_html__( 'Text Color', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .form-group input[type="email"]' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'newslatter_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .form-group > i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'placeholder_color',
			[
				'label' => esc_html__( 'placeholder Color', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .form-group input[type="email"]::placeholder' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'newslatter_border',
				'selector' => '{{WRAPPER}} .newsletter-form .form-group input[type="email"]',
			]
		);
        $this->add_responsive_control(
            'newslatter_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .newsletter-form .form-group input[type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'newslatter_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .newsletter-form .form-group input[type="email"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'Newslatter_Button_style',
			[
				'label' => esc_html__( 'Newslatter Button', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'Newslatter_button_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .newsletter-form .btn.style2',
			]
		);
        $this->add_control(
			'newslatter_btn_bg_color',
			[
				'label' => esc_html__( 'Background Hover Color', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .btn.style2:hover' => 'background-color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'newslatter_btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .btn.style2' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'newslatter_btn_text_hover_color',
			[
				'label' => esc_html__( 'Text Hover Color', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .btn.style2:hover' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'newslatter_btn_border',
                'label' => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .newsletter-form .btn.style2',
            ]
        );
        $this->add_responsive_control(
            'newslatter_btn_radius',
            [
                'label' => esc_html__( 'Border Radius', 'fitmascore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .newsletter-form .btn.style2' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'newslatter_btn_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .newsletter-form .btn.style2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'newslatter_btn_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .newsletter-form .btn.style2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

	

		// 
		// ----------------Copyright Style------------------
        // 

		$this->start_controls_section(
			'Copyright_style_options',
			[
				'label' => esc_html__( 'Copyright', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'Copyright_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .copyright-text',
			]
		);
		$this->add_responsive_control(
			'Copyright_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .copyright-text' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'Copyright_color_hover',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .copyright-text:hover' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'Copyright_bg',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .copyright-wrap',
            ]
        );
		$this->add_responsive_control(
			'Copyright_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .copyright-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'Copyright_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .copyright-wrap' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

    <footer class="footer-wrapper footer-layout1">    
        <div class="container">
            <div class="contact-card">
                <?php foreach($settings['icon_box_list'] as $icon_list):?>
                    <div class="info-card">
                        <div class="info-card_icon">
                            <?php \Elementor\Icons_Manager::render_icon( $icon_list['footer_icon'], ['aria-hidden' => 'true'] );?>
                        </div>
                        <div class="info-card_content">
                            <p class="info-card_text"> <?php echo esc_html( $icon_list['foote_Icon_Title'] ); ?> </p>
                            <a  class="info-card_link"> <?php echo wp_kses_post( $icon_list['footer_icon_des'] ); ?> </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ( $settings['edit_widget_from_appearance'] != 'yes' ) { ?>
            <div class="widget-area">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <div class="widget-about">
                                <div class="footer-logo">
                                    <a href="index.html">
                                        <?php echo wp_get_attachment_image( $settings['about_logo']['id'], 'full' ); ?>
                                    </a>
                                </div>
                                <p class="about-text"> <?php echo esc_html( $settings['about_widget_des'] ); ?> </p>
                                <div class="social-btn">
                                    <?php foreach($settings['fitmas_social_icon_list'] as $social_icon):
                                        $url      = $social_icon['fitmas_social_icon_link']['url'];
                                        $target   = $social_icon['fitmas_social_icon_link']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow = $social_icon['fitmas_social_icon_link']['nofollow'] ? ' rel="nofollow"' : '';
                                        ?>	
                                            <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?> >  
                                                <?php \Elementor\Icons_Manager::render_icon( $social_icon['fitmas_social_icon'], ['aria-hidden' => 'true'] );?>
                                            </a>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title"> <?php echo esc_html( $settings['Quick_Links_widget_title'] ); ?> </h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <?php foreach($settings['fitmas_link_list'] as $link_list):
                                        $url      = $link_list['link_url']['url'];
                                        $target   = $link_list['link_url']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow = $link_list['link_url']['nofollow'] ? ' rel="nofollow"' : '';
                                        ?>	
                                        <li>
                                            <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?> >
                                                <?php echo esc_html( $link_list['link_title'] ); ?>
                                            </a>
                                        </li>
									<?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title"> <?php echo esc_html( $settings['gallery_title'] ); ?> </h3>
                            <div class="sidebar-gallery">
                                <?php foreach ( $settings['gallery_image'] as $image ): ?>
                                    <div class="gallery-thumb">
                                        <img src="<?php echo esc_attr( $image['url'] ); ?>" alt="gallery">
                                        <a href="<?php echo esc_attr( $image['url'] ); ?>" class="gallery-btn popup-image"> <i class="far fa-eye"></i> </a>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <h3 class="widget_title"> <?php echo esc_html( $settings['newslatter_widget_title'] ); ?> </h3>
                            <p class="footer-text"> <?php echo esc_html( $settings['newslatter_widget_des'] ); ?> </p>
                            <form class="newsletter-form">
                                <?php echo do_shortcode( $settings['Contact_form'] );?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
                <?php if(  is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) && $settings['edit_widget_from_appearance'] == 'yes' ) : ?>
                    <div class="footer-widget-area widget-area">
                        <div class="container">
                            <div class="row">
                                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                        <?php dynamic_sidebar( 'footer-1' ); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>
                
                                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                        <?php dynamic_sidebar( 'footer-2' ); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>	
                
                                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                        <?php dynamic_sidebar( 'footer-3' ); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>
                
                                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                        <?php dynamic_sidebar( 'footer-4' ); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif;
			}; ?>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-auto align-self-center">
                        <p class="copyright-text text-center"> <?php echo wp_kses_post( $settings['Copyright'] ); ?></p>
                    </div>
                </div>                
            </div>
        </div>
    </footer>
	<?php

	}
}

Plugin::instance()->widgets_manager->register( new fitmas_footer_one_widget );