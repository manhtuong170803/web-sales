<?php namespace Elementor;

class woriking_time_info extends Widget_Base {

    public function get_name() {

        return 'working_time';
    }

    public function get_title() {
        return esc_html__( 'Working Time', 'fitmascore' );
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
            'team_content',
            [
                'label' => esc_html__( 'Working Time', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Working Hours', 'fitmascore' ),
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'   => esc_html__( 'Icon', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'far fa-clock',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'list_title',
            [
                'label'       => esc_html__( 'Title', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
      
        $this->add_control(
            'repeter_list',
            [
                'label'       => esc_html__( 'Repeater List', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Monday – Friday 1.00 – 2:00 pm', 'fitmascore' ),
					],
                    [
						'list_title' => esc_html__( 'Saturday 8.00 – 12:00 pm', 'fitmascore' ),
					],
                    [
						'list_title' => esc_html__( 'Sunday closed', 'fitmascore' ),
					],
				],
                'title_field' => '{{{ list_title }}}',
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

        $this->end_controls_section();

        //========================================//
        //========= SERVICE BOX style Start==========//
        //========================================//

        $this->start_controls_section(
            'main_box_style',
            [
                'label' => esc_html__( 'Main Box Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'list_gap',
			[
				'label' => esc_html__( 'Gap', 'fitmascore' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .widget_schedule ul li ' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .widget.widget_schedule',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .widget.widget_schedule',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .widget.widget_schedule' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .widget.widget_schedule',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .widget.widget_schedule' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .widget.widget_schedule' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .widget_title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget_title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .widget_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .widget_title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

       

        //==========================================//
        //======= LIst STYLE START=========//
        //========================================//
        
       

        $this->start_controls_section(
			'list_options',
			[
				'label' => esc_html__('List Style', 'fitmascore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'list_typo',
                'label' => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .widget_schedule ul li',
            ]
        );
        $this->add_responsive_control(
            'list_color',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget_schedule ul li' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'list_backgrounds',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .widget_schedule ul li',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'list_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .widget_schedule ul li',
            ]
        );
        $this->add_responsive_control(
            'list_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .widget_schedule ul li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'list_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .widget_schedule ul li',
            ]
        );
        $this->add_responsive_control(
            'list_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .widget_schedule ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'list_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .widget_schedule ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
       <div class="woriking-time-wrapper">
            <div class="<?php echo esc_attr($container)?>">
                <div class="widget widget_schedule">
                    <h3 class="widget_title"> <?php echo esc_html($settings['title']); ?> </h3>
                    <ul>
                    <?php foreach ( $settings['repeter_list'] as $item ): ?>
                        <li>
                        <?php  \Elementor\Icons_Manager::render_icon( $item['icon'], ['aria-hidden' => 'true'] ); ?>
                        <?php echo esc_html($item['list_title']); ?>
                        </li>
                        <?php endforeach;?>                              
                    </ul>
                </div>
            </div>
        </div>
    <?php
echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new woriking_time_info );

