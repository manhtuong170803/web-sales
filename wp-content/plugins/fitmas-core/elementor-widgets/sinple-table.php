<?php namespace Elementor;

class simple_table_Widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_simple_table';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Simple Table', 'fitmascore' );
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
            'title_section',
            [
                'label' => esc_html__( 'fitmas Section Title', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'enable_container',
			[
				'label' => esc_html__( 'Enable Container Full', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'fitmascore' ),
				'label_off' => esc_html__( 'Hide', 'fitmascore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'thead_text',
            [
                'label' => esc_html__( 'Heading Text', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'theads',
            [
                'label'   => esc_html__( 'Table Header', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
					[
						'thead_text' => esc_html__( 'BMI', 'fitmascore' ),
					],
					[
						'thead_text' => esc_html__( 'WEIGHT STATUS', 'fitmascore' ),
					],
				],
                'title_field' => '{{ thead_text}}',
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tbody_bmi_text',
            [
                'label' => esc_html__( 'Body Text', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Below 18.5', 'fitmascore' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'tbody_wight_status',
            [
                'label' => esc_html__( 'Body Text', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Weight Status ', 'fitmascore' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'tbody',
            [
                'label'   => esc_html__( 'Table Body', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
					[
						'tbody_wight_status' => esc_html__( 'Weight Status', 'fitmascore' ),
					],
					[
						'tbody_wight_status' => esc_html__( 'Healthy', 'fitmascore' ),
					],
				],
                'title_field' => '{{ tbody_wight_status}}',
            ]
        );
      
        $this->end_controls_section();
        // START CSS
        $this->start_controls_section(
            'section_box',
            [
                'label' => esc_html__( 'Box Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'box_aligment',
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
                        'icon'  => 'eicon-text-align-left',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .table-bordered tr' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Heading Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bmi-table thead tr th',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'body_box_backgrounds',
                'label'    => esc_html__( 'Body Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bmi-table tbody th,{{WRAPPER}} .bmi-table tbody td',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .bmi-table table,{{WRAPPER}} .bmi-table table th,{{WRAPPER}} .bmi-table table td',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'tabale_head_style',
            [
                'label' => esc_html__( 'Table Head Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'thead_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .bmi-table thead th ',
			]
		);

		$this->add_responsive_control(
			'thead_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bmi-table thead th' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'thead_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bmi-table thead th' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'thead_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bmi-table thead th' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
        
		$this->start_controls_section(
			'tbody_style_options',
			[
				'label' => esc_html__( 'Table Body Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tbody_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .bmi-table tbody th,{{WRAPPER}} .bmi-table tbody td ',
			]
		);

		$this->add_responsive_control(
			'tbody_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bmi-table tbody th ,{{WRAPPER}} .bmi-table tbody td' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'tbody_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bmi-table tbody th' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .bmi-table tbody td' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'tbody_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .bmi-table tbody th' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .bmi-table tbody td' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();



    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        if( $settings['enable_container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-Full';
        }
        ob_start();
        ?>
        <div class="sec-title-wrapper">
            <div class="<?php echo esc_attr($container)?>">
                <div class="bmi-table mb-lg-0 mb-40">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <?php  foreach( $settings['theads'] as $thead ) : ?>
                                <th scope="col"><?php echo esc_html( $thead['thead_text'] ); ?></th>
                            <?php endforeach; ?>
                            </tr> 
                        </thead>
                        <tbody>
                        <?php  foreach( $settings['tbody'] as $tbody ) : ?>
                            <tr>
                                <th scope="row"> <?php echo esc_html( $tbody['tbody_bmi_text'] ); ?> </th>
                                <td><?php echo esc_html( $tbody['tbody_wight_status'] ); ?></td>
                            </tr>
                        <?php  endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new simple_table_Widget );