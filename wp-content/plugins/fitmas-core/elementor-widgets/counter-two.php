<?php namespace Elementor;

class counter_two_widget extends Widget_Base {

	public function get_name() {

		return 'counter_two_widget';
	}

	public function get_title() {
		return esc_html__( 'Fitmas Counter V2', 'fitmascore' );
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
			'counter_options',
			[
				'label' => esc_html__( 'fitmas Counter V2', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Icon', 'fitmascore' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
		$repeater->add_control(
			'number',
			[
				'label'   => esc_html__( 'Number', 'fitmascore' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 999999999,
				'step'    => 1,
			]
		);
		$repeater->add_control(
			'symble',
			[
				'label'   => esc_html__( 'Symble', 'fitmascore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'title',
			[
				'label'   => esc_html__( 'Title', 'fitmascore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'counters',
			[
				'label'       => esc_html__( 'Counter List', 'fitmascore' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title'  => esc_html__( 'SATISFIED CUSTOMERS', 'fitmascore' ),
						'number' => esc_html__( '3462', 'fitmascore' ),
						'symble' => esc_html__( '+', 'fitmascore' ),
					],
					[
						'title'  => esc_html__( 'EXPERT MEMBERS', 'fitmascore' ),
						'number' => esc_html__( '626', 'fitmascore' ),
						'symble' => esc_html__( '+', 'fitmascore' ),
					],
					[
						'title'  => esc_html__( 'SKILLED EXPERTS', 'fitmascore' ),
						'number' => esc_html__( '336', 'fitmascore' ),
						'symble' => esc_html__( '+', 'fitmascore' ),
					],
					[
						'title'  => esc_html__( 'HAPPY CLIENTS ', 'fitmascore' ),
						'number' => esc_html__( '153', 'fitmascore' ),
						'symble' => esc_html__( '+', 'fitmascore' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->add_control(
			'container_full',
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
			'desktop_col',
			[
				'label'   => __( 'Columns On Desktop', 'fitmascore' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-xl-3',
				'options' => [
					'col-xl-12' => __( '1 Column', 'fitmascore' ),
					'col-xl-6'  => __( '2 Column', 'fitmascore' ),
					'col-xl-4'  => __( '3 Column', 'fitmascore' ),
					'col-xl-3'  => __( '4 Column', 'fitmascore' ),
					'col-xl-2'  => __( '6 Column', 'fitmascore' ),
				],
			]
		);
		$this->add_control(
			'laptop_col',
			[
				'label'   => __( 'Columns for Laptop', 'fitmascore' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-lg-3',
				'options' => [
					'col-lg-12' => __( '1 Column', 'fitmascore' ),
					'col-lg-6'  => __( '2 Column', 'fitmascore' ),
					'col-lg-4'  => __( '3 Column', 'fitmascore' ),
					'col-lg-3'  => __( '4 Column', 'fitmascore' ),
					'col-lg-2'  => __( '6 Column', 'fitmascore' ),
				],
			]
		);

		$this->add_control(
			'tab_col',
			[
				'label'   => __( 'Columns On Tablet', 'fitmascore' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-md-6',
				'options' => [
					'col-md-12' => __( '1 Column', 'fitmascore' ),
					'col-md-6'  => __( '2 Column', 'fitmascore' ),
					'col-md-4'  => __( '3 Column', 'fitmascore' ),
					'col-md-3'  => __( '4 Column', 'fitmascore' ),
					'col-md-2'  => __( '6 Column', 'fitmascore' ),
				],
			]
		);
		$this->end_controls_section();

	// *********************************************************
	//                Box Style Css
	// *********************************************************

		$this->start_controls_section(
			'main_counter_box',
			[
				'label' => esc_html__( 'Main Box', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
   
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'main_box_bg',
				'label'    => esc_html__( 'Background', 'fitmascore' ),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .counter-area-2',
                'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'main_box_border',
				'label'    => esc_html__( 'Border', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-area-2',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'main_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-wrap1',
			]
		);
		$this->add_responsive_control(
			'main_box_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .counter-area-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'main_box_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .counter-area-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'counter_box',
			[
				'label' => esc_html__( 'Icon Box Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
   
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'box_bg',
				'label'    => esc_html__( 'Background', 'fitmascore' ),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .counter-card.style2',
                'separator' => 'before',
			]
		);
        $this->add_responsive_control(
			'text_align',
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
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .counter-card.style2' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'box_border',
				'label'    => esc_html__( 'Border', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-card.style2',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-card.style2',
			]
		);
		$this->add_responsive_control(
			'box_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .counter-card.style2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .counter-card.style2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		 // *********************************************************
        //                Icon Style Css
        // *********************************************************

        $this->start_controls_section(
            'icon_css',
            [
                'label' => __( 'Icon Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_size_typography',
				'selector' => '{{WRAPPER}} .counter-card.style2 .counter-card_icon',
			]
		);
		$this->add_responsive_control(
            'min_icon_width',
            [
                'label'      => esc_html__( 'Min Width', 'fitmascore' ),
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
                    '{{WRAPPER}} .counter-card.style2 .counter-card_icon' => 'min-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .counter-card.style2 .counter-card_icon' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .counter-card.style2 .counter-card_icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-card.style2 .counter-card_icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .counter-card.style2 .counter-card_icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__( 'icon Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .counter-card.style2 .counter-card_icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .counter-card.style2 .counter-card_icon',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .counter-card.style2 .counter-card_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .counter-card.style2 .counter-card_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .counter-card.style2 .counter-card_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'label' => esc_html__( 'SVG Wigth', 'fitmascore' ),
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
                    '{{WRAPPER}} .counter-card.style2 .counter-card_icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .counter-card.style2 .counter-card_icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
       
        $this->end_controls_section();

		$this->start_controls_section(
			'counter_number',
			[
				'label' => esc_html__( 'Number CSS', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'number_color',
			[
				'label'     => esc_html__( 'Number Color', 'fitmascore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-card.style2 .counter-card_number' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_title_typo',
				'label'    => esc_html__( 'Title Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-card.style2 .counter-card_number',
			]
		);
		$this->add_responsive_control(
			'number_margin',
			[
				'label'      => esc_html__( 'Number Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [ '{{WRAPPER}} .counter-card.style2 .counter-card_number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'number_padding',
			[
				'label'      => esc_html__( 'Number Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [ '{{WRAPPER}} .counter-card.style2 .counter-card_number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'counter_title',
			[
				'label' => esc_html__( 'Title CSS', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'fitmascore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-card.style2 .counter-card_text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__( 'Title Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-card.style2 .counter-card_text',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Title Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .counter-card.style2 .counter-card_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Title Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .counter-card.style2 .counter-card_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
		ob_start();
		?>
        <div class="counter-area-2 overflow-hidden">
            <div class="container container2">
                <div class="row justify-content-between">
                <?php foreach ( $settings['counters'] as $item ): ?>
                    <div class="<?php echo esc_attr( $column ); ?>  counter-card_wrap">
                        <div class="counter-card style2">
                            <div class="counter-card_icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], ['aria-hidden' => 'true'] );?>
                            </div>
                            <div class="media-body">
                                <h2 class="counter-card_number"><span class="counter-number"> <?php echo esc_html( $item['number'] ); ?> </span>
									<?php echo esc_html( $item['symble'] ); ?>
                                </h2>
                                <p class="counter-card_text"> <?php echo esc_html( $item['title'] ); ?> </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>      
            </div>
        </div>   
        <?php
echo ob_get_clean();
	}
}
Plugin::instance()->widgets_manager->register( new counter_two_widget );