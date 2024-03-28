<?php namespace Elementor;

class fitmas_tabs_two_widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_tabs_two_widget';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Tabs V2', 'fitmascore' );
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
            'tab_cotent_options',
            [
                'label' => __( 'Fitmas Tab Content', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'container',
            [
                'label'        => esc_html__( 'Enable Container', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'active_tab',
            [
                'label'        => esc_html__( 'Active Tab', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label'       => __( 'Title', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        
        $repeater->add_control(
            'desc',
            [
                'label'   => __( 'Description', 'fitmascore' ),
              	'type' => \Elementor\Controls_Manager::WYSIWYG,
                'rows'    => 10,
                'dynamic' => [
                    'active' => true,
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
			'counter_title',
			[
				'label'   => esc_html__( 'Counter Title', 'fitmascore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'      => esc_html__('Started Journey'),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater->add_control(
            'list_title',
            [
                'label'      => esc_html__( 'List Item', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '
                    <ul>
                        <li>Emergency Solutions Anytime</li>
                        <li>Affordable price upto 2 years</li>
                        <li>Reliable & Experienced Team</li>
                    </ul>', 'fitmascore' ),
                'dynamic'    => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'tab_list',
            [
                'label'       => __( 'Service List', 'fitmascore' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'title' => esc_html__( 'Where is your gym located?', 'fitmascore' ),
                        'desc'        => esc_html__( ' Interactiely network holistic convergence before equity invested technologies mesh standards compliant growth strategies and tactical supply chains. Impact products through user friendly manufactured products harness low risk high yield', 'fitmascore' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

           //=========== MENU STYLE START ===========//
        //=========================================//

        $this->start_controls_section(
            'tab_menu_css',
            [
                'label' => esc_html__( 'Tab Menu Css', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typo',
                'label' => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .feature-tab-button button',
            ]
        );
        $this->add_responsive_control(
            'menu_color',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-tab-button button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_acolor',
            [
                'label' => esc_html__( 'Active Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-tab-button button.active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_background_color',
            [
                'label' => esc_html__( 'Background Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-tab-button button.active' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'menu_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .feature-tab-button button',
            ]
        );
        $this->add_responsive_control(
            'menu_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .feature-tab-button button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'menu_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .feature-tab-button button',
            ]
        );

        $this->add_responsive_control(
            'menu_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .feature-tab-button button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .feature-tab-button button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'Image_style',
            [
                'label' => esc_html__( 'Image Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
						'max' => 500,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .feature-tab-content .tab-thumb img' => 'height: {{SIZE}}{{UNIT}};',
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
						'max' => 500,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .feature-tab-content .tab-thumb img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'image_object',
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
                    '{{WRAPPER}} .feature-tab-content .tab-thumb img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .feature-tab-content .tab-thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .feature-tab-content .tab-thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .tab-content p',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-title p' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .tab-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tab-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .feature-tab-content .counter-number' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_title_typo',
				'label'    => esc_html__( ' Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .feature-tab-content .counter-number',
			]
		);

		$this->add_responsive_control(
			'number_margin',
			[
				'label'      => esc_html__( 'Number Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [ 
					'{{WRAPPER}} .feature-tab-content .counter-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'number_padding',
			[
				'label'      => esc_html__( 'Number Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [ 
					'{{WRAPPER}} .feature-tab-content .counter-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'counter_title_style',
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
					'{{WRAPPER}} .feature-tab-content .tab-content_grid-title' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'selector' => '{{WRAPPER}} .feature-tab-content .tab-content_grid-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Title Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .feature-tab-content .tab-content_grid-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .feature-tab-content .tab-content_grid-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
            'checklist_css_options',
            [
                'label' => esc_html__( 'Check List Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
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
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_checklist_typo',
                'label'    => esc_html__( 'Icon Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .checklist li:before',
            ]
        );
        $this->add_responsive_control(
            'checklist_icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .checklist li:before' => 'color: {{VALUE}}',
                ],
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
    }

    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        if ( $settings['container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
        ?>
  <div class="feature-area-3 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="feature-tab-button">
                        <div class="filter-menu-active">
                            <?php $count = 0; foreach ( $settings['tab_list'] as $item ) : $count++; ?>
                                <button data-filter=".cat<?php echo esc_attr( $count ); ?>" class="<?php echo esc_attr( $item['active_tab'] == 'yes' ? 'active' : '' ); ?>" type="button"> <?php echo esc_html( $item['title'] ); ?><i class="fas fa-circle-arrow-right"></i></button>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="feature-tab-content filter-active-cat1 mt-xl-0 mt-40">
                        <?php $count = 0; foreach ( $settings['tab_list'] as $item ) : $count++; ?>
                            <div class="filter-item cat<?php echo esc_attr( $count ); ?>">
                                <div class="tab-thumb">
                                <?php echo wp_get_attachment_image( $item['image']['id'], 'full' );?>
                                </div>
                                <div class="tab-content mt-n1">
                                    <div class="mt-n1 text-title">  <?php echo wp_kses_post( $item['desc'] ); ?></div>
                                        <div class="tab-content_grid">
                                            <div class="media-left">
                                                <h6 class="tab-content_grid-title"><?php echo esc_html( $item['counter_title'] ); ?></h6>
                                                <span class="counter-number"><?php echo esc_html( $item['number'] ); ?></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="checklist">
                                                    <ul>
                                                        <?php echo wp_kses_post( $item['list_title'] ); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php
echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new fitmas_tabs_two_widget );