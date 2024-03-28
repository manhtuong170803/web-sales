<?php
namespace Elementor;
class fitmas_header_template_three extends Widget_Base {

	public function get_name() {
		return 'fitmas_header_template_three';
	}

	public function get_title() {
		return esc_html__( 'Fitmas Header Three', 'fitmascore' );
	}

	public function get_icon() {
		return 'eicon-shape';
	}

	public function get_categories() {
		return [ 'fitmas_header_template' ];
	}

	private function get_available_menus() {
		$menus = wp_get_nav_menus();

		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
	}

	protected function register_controls() {
		
        $this->start_controls_section(
			'logo_settings',
			[
				'label' => esc_html__( 'Logo', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'sticky_logo_select',
			[
				'label' => esc_html__( 'Select sticky Logo', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'fitmascore' ),
					'cunstom' => esc_html__( 'Coustom Logo', 'fitmascore' ),
				],
			]
		);
		$this->add_control(
			'sticky_logo',
			[
				'label'       => __( 'Sticky Logo', 'fitmascore' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'sticky_logo_select' => 'cunstom',
				],
				
			]
		);
		$this->add_control(
			'logo_select',
			[
				'label' => esc_html__( 'Select Logo', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'fitmascore' ),
					'cunstom' => esc_html__( 'Coustom Logo', 'fitmascore' ),
				],
			]
		);
		$this->add_control(
			'logo',
			[
				'label'       => __( 'Logo', 'fitmascore' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'logo_select' => 'cunstom',
				],
				
			]
		);

		$this->add_responsive_control(
			'logo_width',
			[
				'label' => esc_html__( 'Logo Width', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'condition' => [
					'logo_select' => 'cunstom',
				],
				'selectors' => [
					'{{WRAPPER}} .header-logo a img' => 'width: {{SIZE}}px;max-width: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'logo_height',
			[
				'label' => esc_html__( 'Logo Height', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'condition' => [
					'logo_select' => 'cunstom',
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .header-logo a img' => 'height: {{SIZE}}px;height-width: {{SIZE}}px;',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'logo_background',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .header-layout3 .sticky-wrapper2 .header-logo:after',
            ]
        );
		$this->add_responsive_control(
            'logo_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header-layout3 .header-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header-layout3 .header-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
			'mobile_logo_options',
			[
				'label' => esc_html__( 'Mobile Logo Options', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'mobile_logo_select',
			[
				'label' => esc_html__( 'Select Mobile Logo', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'fitmascore' ),
					'cunstom' => esc_html__( 'Coustom Logo', 'fitmascore' ),
				],
			]
		);
		$this->add_control(
			'mobile_logo',
			[
				'label'       => __( 'Logo', 'fitmascore' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'mobile_logo_select' => 'cunstom',
				],
			]
		);
		$this->add_responsive_control(
			'mobile_logo_width',
			[
				'label' => esc_html__( 'Logo Width', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'condition' => [
					'logo_select' => 'cunstom',
				],
				'selectors' => [
					'{{WRAPPER}} .mobile-menu-wrapper .mobile-logo img' => 'width: {{SIZE}}px;max-width: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'mobile_logo_height',
			[
				'label' => esc_html__( 'Logo Height', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'condition' => [
					'logo_select' => 'cunstom',
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .mobile-menu-wrapper .mobile-logo img' => 'height: {{SIZE}}px;height-width: {{SIZE}}px;',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'mobile_logo_background',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .mobile-menu-wrapper .mobile-logoi',
            ]
        );
		$this->add_responsive_control(
            'mobile_logo_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .mobile-menu-wrapper .mobile-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mobile_logo_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .mobile-menu-wrapper .mobile-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();


		$this->start_controls_section(
			'menu_settings',
			[
				'label' => esc_html__( 'Menu Setting ', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$menus = $this->get_available_menus();

		if ( ! empty( $menus ) ) {
			$this->add_control(
				'menu_select1',
				[
					'label' => __( 'Menu Left', 'fitmascore' ),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'save_default' => true,
					'separator' => 'after',
					'description' => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'fitmascore' ), admin_url( 'nav-menus.php' ) ),
				]
			);
            $this->add_control(
				'menu_select2',
				[
					'label' => __( 'Menu Right', 'fitmascore' ),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'save_default' => true,
					'separator' => 'after',
					'description' => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'fitmascore' ), admin_url( 'nav-menus.php' ) ),
				]
			);
			$this->add_control(
				'menu_select',
				[
					'label' => __( 'Mobile menu', 'fitmascore' ),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'save_default' => true,
					'separator' => 'after',
					'description' => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'fitmascore' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		} else {
			$this->add_control(
				'menu_select1',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . __( 'There are no menus in your site.', 'fitmascore' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'fitmascore' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' => 'after',
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
            $this->add_control(
				'menu_select2',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . __( 'There are no menus in your site.', 'fitmascore' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'fitmascore' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' => 'after',
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
				$this->add_control(
				'menu_select',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . __( 'There are no menus in your site.', 'fitmascore' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'fitmascore' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' => 'after',
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}
		
		$this->add_control(
			'sticky_menu',
			[
				'label' => esc_html__( 'Enable Sticky Menu', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'fitmascore' ),
				'label_off' => esc_html__( 'Hide', 'fitmascore' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_responsive_control(
			'sticky_bg',
			[
				'label' => esc_html__( 'Sticky Background', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-layout3 .sticky-wrapper2.sticky' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'sticky_menu' => 'yes',
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'header_buttons',
			[
				'label' => esc_html__( 'Buttons Content', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'button_Text',
			[
				'label' => esc_html__( 'Button Text', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'JOIN CLASS NOW' , 'fitmascore' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();

		// Header_sidebar_Canva_Content----

		$this->start_controls_section(
			'canva_content',
			[
				'label' => esc_html__( 'Sidebar Canva Content', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'sidebar_logo_select',
			[
				'label' => esc_html__( 'Select Sidebar Logo', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'fitmascore' ),
					'cunstom' => esc_html__( 'Coustom Logo', 'fitmascore' ),
				],
			]
		);
		$this->add_control(
			'sidebar_logo',
			[
				'label'       => __( 'Logo', 'fitmascore' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'sidebar_logo_select' => 'cunstom',
				],
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_responsive_control(
			'sidebar_logo_width',
			[
				'label' => esc_html__( 'Logo Width', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'condition' => [
					'sidebar_logo_select' => 'cunstom',
				],
				'selectors' => [
					'{{WRAPPER}} .widget-about .footer-logo a img' => 'width: {{SIZE}}px;max-width: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'sidebar_logo_height',
			[
				'label' => esc_html__( 'Logo Height', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'condition' => [
					'sidebar_logo_select' => 'cunstom',
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .widget-about .footer-logo a img' => 'height: {{SIZE}}px;height-width: {{SIZE}}px;',
				],
			]
		);
		$this->add_control(
			'canva_des',
			[
				'label' => esc_html__( 'Description', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'A gym, also known as a fitness center or health club, is a facility dedicated to physical fitness and exercise gyms and typically offer a range' , 'fitmascore' ),
				'label_block' => true,
				'rows' => 10,
			]
		);
		$this->add_control(
			'canva_social_list',
			[
				'label' => esc_html__( 'Canva Socal List', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'canva_social_icon',
            [
                'label' => esc_html__( 'Icon', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'canva_icon_link',
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
            'canva_social_icon_list',
            [
                'label'   => esc_html__( 'Icons List', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'canva_social_icon' => 'fab fa-facebook-f',
					],
                ],
            ]
        );

		$this->add_control(
			'canva_quick_list_comment',
			[
			'label' => esc_html__( 'Canva Quick link', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'canva_link_title',
			[
				'label' => esc_html__( 'Title', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'About Us' , 'fitmascore' ),
				'label_block' => true,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'canva_link_list',
			[
				'label' => esc_html__( 'Title', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
            'canva_list_url',
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
            'quick_list_repeater',
            [
                'label'       => esc_html__( 'Repeater List', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'canva_link_list' => esc_html__( 'About Us', 'fitmascore' ),
					],
					[
						'canva_link_list' => esc_html__( 'Our Mission', 'fitmascore' ),
					],
					[
						'canva_link_list' => esc_html__( 'Meet The Teams ', 'fitmascore' ),
					],
					[
						'canva_link_list' => esc_html__( 'Our Projects ', 'fitmascore' ),
					],
					[
						'canva_link_list' => esc_html__( 'Contact Us ', 'fitmascore' ),
					],
				],
            ]
        );
	
		$this->end_controls_section();

	// ---------------------------------------------
	// ------- Header Two Style Start ------------
	// ---------------------------------------------

		$this->start_controls_section(
			'header_top_style',
			[
				'label' => esc_html__( 'Header  Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'header_bg',
			[
				'label'       => esc_html__('Background Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .header-layout3 .sticky-wrapper2' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'header_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .header-layout3 .sticky-wrapper2',
            ]
        );
        $this->add_responsive_control(
            'header_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header-layout3 .sticky-wrapper2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'header_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header-layout3 .sticky-wrapper2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();

		$this->start_controls_section(
			'menu_area',
			[
				'label' => esc_html__( 'Menu Area', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'background_color',
			[
				'label'       => esc_html__('Background Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .menu-area' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'menu_color',
			[
				'label'       => esc_html__('Menu Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .main-menu a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'active_menu_color',
			[
				'label'       => esc_html__('Active / Hover Menu Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .main-menu ul li a:hover,{{WRAPPER}} .main-menu ul li.current-menu-item > a,{{WRAPPER}} .main-menu ul li.current_page_item > a,{{WRAPPER}} .main-menu ul li.current-menu-ancestor > a,{{WRAPPER}} .main-menu ul li.current_page_ancestor > a,{{WRAPPER}} .main-menu ul.sub-menu li a:before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'dd_menu_bg',
			[
				'label'       => esc_html__('Dropdown Menu Background', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .main-menu ul.sub-menu' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'menu_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .main-menu ul.sub-menu',
            ]
        );
		$this->add_responsive_control(
            'menu_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-layout3 .main-menu > ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-layout3 .main-menu > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();

		$this->start_controls_section(
			'btn_area',
			[
				'label' => esc_html__( 'Button Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_text_typography',
                'selector' => '{{WRAPPER}} .h-three .btn.btn-border4',
            ]
        );
        $this->add_responsive_control(
            'button_text_color',
            [
                'label'     => esc_html__( 'Text Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h-three .btn.btn-border4' => 'color: {{VALUE}}',
                ],
            ]
        ); 
        $this->add_responsive_control(
			'btn_area_bg',
			[
				'label'       => esc_html__('Background Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .h-three .btn.btn-border4' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .h-three .btn.btn-border4',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .h-three .btn.btn-border4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .h-three .btn.btn-border4',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .h-three .btn.btn-border4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .h-three .btn.btn-border4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


		$this->add_responsive_control(
			'button_hover_color',
			[
				'label' => esc_html__( 'Hover Options', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_text_typography_h',
                'selector' => '{{WRAPPER}} .h-three .btn.btn-border4:hover',
            ]
        );
        $this->add_responsive_control(
            'button_text_color_h',
            [
                'label'     => esc_html__( 'Text Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h-three .btn.btn-border4:hover' => 'color: {{VALUE}}',
                ],
            ]
        ); 
        $this->add_responsive_control(
			'btn_area_bg_h',
			[
				'label'       => esc_html__('Background Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .h-three .btn.btn-border4:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_h',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .h-three .btn.btn-border4:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_h',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .h-three .btn.btn-border4:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_h',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .h-three .btn.btn-border4:hover',
            ]
        );
		$this->end_controls_section();

		// -----------------------------------------
		$this->start_controls_section(
			'canva_sitebar_style',
			[
				'label' => esc_html__( 'Canva Sidebar Content', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);


        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'canva_background_color',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                 'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .sidemenu-wrapper .sidemenu-content',
            ]
        );
        $this->add_responsive_control(
			'canva_background_width',
			[
				'label' => esc_html__( 'Box Width', 'fitmascore' ),
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
					'{{WRAPPER}} .sidemenu-wrapper .sidemenu-content' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'canva_btn_style_option',
			[
				'label' => esc_html__( 'Canva Button Style', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs(
			'canva_btn_tabs'
		);
		
		$this->start_controls_tab(
			'canva_btn_tab',
			[
				'label' => esc_html__( 'Normal', 'fitmascore' ),
			]
		);
		$this->add_responsive_control(
			'canva_btn_style',
			[
				'label' => esc_html__( 'Canva Btn Style', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'canva_btn_bg',
			[
				'label'       => esc_html__('Background Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .header-button .btn.btn-border4' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'canva_btn_color',
			[
				'label'       => esc_html__('Icon Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .header-button .btn.btn-border4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'canva_btn__border',
                'label' => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .header-button .btn.btn-border4',
            ]
        );
        $this->add_responsive_control(
            'canva_btn_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .h-three .btn.btn-border4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		
		$this->start_controls_tab(
			'canva_btn_tab_h',
			[
				'label' => esc_html__( 'Hover', 'fitmascore' ),
			]
		);
		$this->add_responsive_control(
			'canva_btn_bg_h',
			[
				'label'       => esc_html__('Background Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .header-button .btn.btn-border4:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'canva_btn_color_h',
			[
				'label'       => esc_html__('Icon Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .header-button .btn.btn-border4:hover,{{WRAPPER}} .header-button .btn.btn-border4:focus,{{WRAPPER}} .header-button .btn.btn-border4:active,' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'canva_btn__border_h',
                'label' => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .header-button .btn.btn-border4:hover',
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
		

		$this->start_controls_tabs(
			'canva_des_style_tabs'
		);
		
		$this->start_controls_tab(
			'canva_des_style_tab',
			[
				'label' => esc_html__( 'Canva Description Style', 'fitmascore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dec_typo',
                'label' => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .about-text',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		
		$this->end_controls_tabs();

				//  ---------- canva Social Icon  Style ------

		$this->add_responsive_control(
			'canva_social_icon_style_option',
			[
				'label' => esc_html__( 'Canva social Icon Style', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs(
            'canva_social_icon_tabs'
        );
      
        $this->start_controls_tab(
            'canva_social_icon_tabs_normal',
            [
                'label' => __( 'Icon Normal', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_color',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-btn.style2 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_colorbg',
            [
                'label' => esc_html__( 'Background Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-btn.style2 a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_width',
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
                    '{{WRAPPER}} .social-btn.style2 a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_height',
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
                    '{{WRAPPER}} .social-btn.style2 a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'canva_social_icon_border',
                'label' => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .social-btn.style2 a',
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_radius',
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
                    '{{WRAPPER}} .social-btn.style2 a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'canva_social_icon_shadow',
                'label' => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .social-btn.style2 a',
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .social-btn.style2 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .social-btn.style2 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'canva_social_icon_tabs_hover',
            [
                'label' => __( 'Icon Hover', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_hcolor',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-btn.style2.social_canva_btn a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_hcolorbg',
            [
                'label' => esc_html__( 'Background Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-btn.style2.social_canva_btn a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'canva_social_icon_hborder',
                'label' => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .social-btn.style2 a:hover',
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_hradius',
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
                    '{{WRAPPER}} .social-btn.style2 a:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'canva_social_icon_hshadow',
                'label' => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .social-btn.style2 a:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

		// ------- Canva Link List Style ----------

		$this->start_controls_tabs(
			'Canva_List_style_tabs'
		);
		
		$this->start_controls_tab(
			'Canva_List_style_tab',
			[
				'label' => esc_html__( 'Canva Link List Style', 'fitmascore' ),
			]
		);
		$this->add_responsive_control(
			'canva_list_title_color',
			[
				'label'       => esc_html__('List Title Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .footer-widget .widget_title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'canva_list_title_border_color',
			[
				'label'       => esc_html__('List Title Border Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .footer-widget .widget_title:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'canva_menu_list_content',
			[
				'label' => esc_html__( 'Menu List Style', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'canva_menu_list_color_typo',
                'label'    => __('Typography', 'fitmascore'),
                'selector' => '{{WRAPPER}} .footer-widget.widget_nav_menu a',
            ]
        );
		$this->add_responsive_control(
			'canva_menu_list_color',
			[
				'label'       => esc_html__('Menu List Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .footer-widget.widget_nav_menu a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'canva_menu_list_hover_color',
			[
				'label'       => esc_html__('Menu List Hover Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .footer-widget.widget_nav_menu a:hover' => 'color: {{VALUE}};',
				],
			]
		);

      
        $this->add_responsive_control(
            'canva_menu_list_margin',
            [
                'label'      => esc_html__('Margin', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-widget.widget_nav_menu a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_menu_list_padding',
            [
                'label'      => esc_html__('Padding', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-widget.widget_nav_menu a' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		
		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
 		if ( $settings['sticky_menu'] == 'yes' ) {
            $sticky = 'sticky';
        } else {
            $sticky = '';
        }
		?>

	<div class="sidemenu-wrapper">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget footer-widget">
                <div class="widget-about">
                    <div class="footer-logo">
						<?php
							if( $settings['sidebar_logo_select'] == 'cunstom' ){ ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php
										$logo_alt = get_post_meta( $settings['sidebar_logo']['id'], '_wp_attachment_image_alt', true );
										$logo_title = get_the_title( $settings['sidebar_logo']['id']);
									?>
									<img src="<?php echo $settings['sidebar_logo']['url'] ?>" alt="<?php echo $logo_alt;?>" title="<?php echo $logo_title;?>">
								</a>

							<?php 
							}elseif(has_custom_logo()){
								the_custom_logo();
							}else{
								?>
								<h2>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php esc_html(bloginfo( 'name' )); ?>
									</a>
								</h2>
								<?php 
							}
						?>
                    </div>
                    <p class="about-text"> <?php echo esc_html( $settings['canva_des'] ); ?>  </p>
                    <div class="social-btn style2 social_canva_btn">
						<?php foreach($settings['canva_social_icon_list'] as $canva_social): 
									$curl      = $canva_social['canva_icon_link']['url'];
									$ctarget   = $canva_social['canva_icon_link']['is_external'] ? ' target="_blank"' : '';
									$cnofollow = $canva_social['canva_icon_link']['nofollow'] ? ' rel="nofollow"' : '';	
									?>
                     				<a  href="<?php echo esc_url($curl); ?>" >
											<?php \Elementor\Icons_Manager::render_icon( $canva_social['canva_social_icon'], ['aria-hidden' => 'true'] );?>
										</a>
						<?php endforeach?>
                    </div>
                </div>
            </div>
            <div class="widget widget_nav_menu footer-widget">
                <h3 class="widget_title"> <?php echo esc_html( $settings['canva_link_title'] ); ?> </h3>
                <ul class="menu">
					<?php foreach($settings['quick_list_repeater'] as $link_list): 
						$burl      = $link_list['canva_list_url']['url'];
						$btarget   = $link_list['canva_list_url']['is_external'] ? ' target="_blank"' : '';
						$bnofollow = $link_list['canva_list_url']['nofollow'] ? ' rel="nofollow"' : '';	
						?>
							<li><a href="<?php echo esc_url($burl); ?>"> <?php echo esc_html( $link_list ['canva_link_list'] ); ?> </a></li>
					<?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-area text-center">
            <button class="menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
				<?php
					if( $settings['mobile_logo_select'] == 'cunstom' ){ ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php
								$logo_alt = get_post_meta( $settings['mobile_logo']['id'], '_wp_attachment_image_alt', true );
								$logo_title = get_the_title( $settings['mobile_logo']['id']);
							?>
							<img src="<?php echo esc_url( $settings['mobile_logo']['url'] ); ?>" alt="<?php echo $logo_alt;?>" title="<?php echo esc_attr($logo_title);?>">
						</a>

					<?php }elseif(has_custom_logo()){
							the_custom_logo();
						}else{
					?>
					<h2>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php esc_html(bloginfo( 'name' )); ?>
						</a>
					</h2>
				<?php  } ?>
            </div>
            <div class="mobile-menu">
				<?php
					if($settings['menu_select']){
						$header_menu = $settings['menu_select'];
					}else{
						$header_menu = '';
					}
					wp_nav_menu(
						array(
							'menu'           => $header_menu,
							'container'      => false,
							'theme_location' => 'mainmenu',
							'menu_id'        => 'mainmenu',
							'menu_class'     => '',
							
						)
					);
				?>
            </div>
        </div>
    </div>
	<div class="popup-search-box">
    	<button class="searchClose"><i class="fal fa-times"></i></button>

        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" placeholder="<?php esc_attr_e( 'Search here... ', 'fitmascore' ) ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s" title="<?php esc_attr_e( 'Search here...:', 'fitmascore' ) ?>" />
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
<!-- --------------------- -->

    <div class="nav-header header-layout3">
        <div class="sticky-wrapper2 <?php echo esc_attr( $sticky ); ?>">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-start justify-content-between">
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                <button type="button" class="btn btn-border4 sideMenuToggler"> <i class="far fa-bars"></i>  </button>
                                <button type="button" class="search-btn searchBoxToggler"><i class="fa-regular fa-magnifying-glass"></i>Search</button>
                            </div>
                        </div>
                        <div class="col-auto d-lg-none">
                            <div class="header-logo">
                                <?php
                                    if( $settings['logo_select'] == 'cunstom' ){ ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <?php
                                                $logo_alt = get_post_meta( $settings['logo']['id'], '_wp_attachment_image_alt', true );
                                                $logo_title = get_the_title( $settings['logo']['id']);
                                            ?>
                                            <img src="<?php echo $settings['logo']['url'] ?>" alt="<?php echo $logo_alt;?>" title="<?php echo $logo_title;?>">
                                        </a>

                                    <?php 
                                    }elseif(has_custom_logo()){
                                        the_custom_logo();
                                    }else{
                                        ?>
                                        <h2>
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                <?php esc_html(bloginfo( 'name' )); ?>
                                            </a>
                                        </h2>
                                        <?php 
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-auto ms-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <?php
									if($settings['menu_select1']){
										$header_menu1 = $settings['menu_select1'];
									}else{
										$header_menu1 = '';
									}
                                    wp_nav_menu(
                                        array(
											'menu'           => $header_menu1,
                                            'container'      => false,
                                            'theme_location' => 'mainmenu',
                                            'menu_id'        => 'mainmenu',
                                            'menu_class'     => '',
                                            
                                        )
                                    );
                                ?>
                            </nav>
                            <div class="navbar-right d-inline-flex d-lg-none">
                                <button type="button" class="menu-toggle icon-btn"><i class="far fa-bars"></i></button>
                            </div>
                        </div>
                        <div class="col-auto d-lg-block d-none">
                            <div class="header-logo">
                                <?php
                                    if( $settings['logo_select'] == 'cunstom' ){ ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <?php
                                                $logo_alt = get_post_meta( $settings['logo']['id'], '_wp_attachment_image_alt', true );
                                                $logo_title = get_the_title( $settings['logo']['id']);
                                            ?>
                                            <img src="<?php echo $settings['logo']['url'] ?>" alt="<?php echo $logo_alt;?>" title="<?php echo $logo_title;?>">
                                        </a>

                                    <?php 
                                    }elseif(has_custom_logo()){
                                        the_custom_logo();
                                    }else{
                                        ?>
                                        <h2>
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                <?php esc_html(bloginfo( 'name' )); ?>
                                            </a>
                                        </h2>
                                        <?php 
                                    }
                                ?>
								
							<!--  sticky Logo	  -->
								
								<?php
                                    if( $settings['sticky_logo_select'] == 'cunstom' ){ ?>
                                         <a class="sticky-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                                            <?php
                                                $logo_alt = get_post_meta( $settings['sticky_logo']['id'], '_wp_attachment_image_alt', true );
                                                $logo_title = get_the_title( $settings['sticky_logo']['id']);
                                            ?>
                                            <img src="<?php echo $settings['sticky_logo']['url'] ?>" alt="<?php echo $logo_alt;?>" title="<?php echo $logo_title;?>">
                                        </a>

                                    <?php 
                                    }else{
                                        ?>
                                        <h2>
                                            <a class="sticky-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                <?php esc_html(bloginfo( 'name' )); ?>
                                            </a>
                                        </h2>
                                        <?php 
                                    }
                                ?>
                                <span class="border-left"></span>
                                <span class="border-right"></span>
                            </div>
                        </div>
                        <div class="col-auto me-lg-auto d-none d-lg-inline-block">
                            <nav class="main-menu">
                                <?php
									if($settings['menu_select2']){
										$header_menu2 = $settings['menu_select2'];
									}else{
										$header_menu2 = '';
									}
                                    wp_nav_menu(
                                        array(
											'menu'           => $header_menu2,
                                            'container'      => false,
                                            'theme_location' => 'mainmenu',
                                            'menu_id'        => 'mainmenu',
                                            'menu_class'     => '',
                                            
                                        )
                                    );
                                ?>
                            </nav>
                        </div>
                        <div class="col-auto d-none d-xl-block h-three">
                            <?php if (!empty($settings['button_Text'])) :
                                if ( ! empty( $settings['button_link']['url'] ) ) {
                                    $this->add_link_attributes( 'button_link', $settings['button_link'] );
                                } ?>
                                <a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> class="btn btn-border4">
                                    <?php echo esc_html($settings['button_Text'])?>
                                </a>
                            <?php endif?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <script>
            (function ($) {
                "use strict";
                jQuery(".site").addClass("header-template-three-activate");
				function popupSideMenu($sideMenu, $sideMunuOpen, $sideMenuCls, $toggleCls) {
					// Sidebar Popup
					$($sideMunuOpen).on('click', function (e) {
					e.preventDefault();
					$($sideMenu).addClass($toggleCls);
					});
					$($sideMenu).on('click', function (e) {
					e.stopPropagation();
					$($sideMenu).removeClass($toggleCls)
					});
					var sideMenuChild = $sideMenu + ' > div';
					$(sideMenuChild).on('click', function (e) {
					e.stopPropagation();
					$($sideMenu).addClass($toggleCls)
					});
					$($sideMenuCls).on('click', function (e) {
					e.preventDefault();
					e.stopPropagation();
					$($sideMenu).removeClass($toggleCls);
					});
				};
				popupSideMenu('.sidemenu-wrapper', '.sideMenuToggler', '.sideMenuCls', 'show');
                
                // -----
    function popupSarchBox($searchBox, $searchOpen, $searchCls, $toggleCls) {
        $($searchOpen).on("click", function (e) {
            e.preventDefault();
            $($searchBox).addClass($toggleCls);
        });
        $($searchBox).on("click", function (e) {
            e.stopPropagation();
            $($searchBox).removeClass($toggleCls);
        });
        $($searchBox)
            .find("form")
            .on("click", function (e) {
                e.stopPropagation();
                $($searchBox).addClass($toggleCls);
            });
        $($searchCls).on("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            $($searchBox).removeClass($toggleCls);
        });
    }
    popupSarchBox(
        ".popup-search-box",
        ".searchBoxToggler",
        ".searchClose",
        "show"
    );
            })(jQuery);
        </script>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new fitmas_header_template_three );
?>
