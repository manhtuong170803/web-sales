<?php namespace Elementor;

class fitmas_image_widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_image';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Image', 'fitmascore' );
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
            'image',
            [
                'label' => __( 'Main Image', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->add_control(
            'title',
            [
                'label'   => esc_html__( 'Number', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '01', 'fitmascore' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
			'enable_counter',
			[
				'label' => esc_html__( 'Enable Counter', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'fitmascore' ),
				'label_off' => esc_html__( 'Hide', 'fitmascore' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
					'{{WRAPPER}} .about-thumb-2 img' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .about-thumb-2 img' => 'max-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .about-thumb-2 img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-thumb-2 img' => 'object-fit: {{VALUE}}',
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
                    '{{WRAPPER}} .about-thumb-2 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-thumb-2 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
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
				'selector' => '{{WRAPPER}} .about-thumb-2 .about-thumb-num ',
			]
		);

		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-thumb-2 .about-thumb-num' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .about-thumb-2 .about-thumb-num' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .about-thumb-2 .about-thumb-num' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        if ( $settings['enable_counter'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
        ?>
  
        <div class="about-image-two-wraper">
            <div class="<?php echo esc_attr( $container ); ?>">
                <?php if ( $settings['select_style'] == 'one' ) : ?>
                    <div class="about-thumb-2">  
                        <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' );?>
                        <?php if ( ! empty( $settings['title'] ) ) :?>  
                            <div class="about-thumb-num">
                                <?php echo esc_html($settings['title']); ?>
                            </div>
                        <?php endif?>
                    </div>
                <?php endif;?>
                <?php if ( $settings['select_style'] == 'two' ) : ?>
                    <div class="about-thumb-2 style2">  
                        <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' );?>
                        <?php if ( ! empty( $settings['title'] ) ) :?>  
                            <div class="about-thumb-num">
                                <?php echo esc_html($settings['title']); ?>
                            </div>
                        <?php endif?>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new fitmas_image_widget );