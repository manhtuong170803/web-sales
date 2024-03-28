<?php namespace Elementor;

class testimonial_two_widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_testimonial_two';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Testimonial V2', 'fitmascore' );
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
				'rows' => 10,
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
                        'description' => esc_html__( '“I have been a member of GymFit for over a year now, and it has been a game-changer for my fitness journey. The gym has a fantastic range of equipment that caters to all my workout needs”', 'fitmascore' ),
					],
                    [
						'name' => esc_html__( 'Andrew Daniel', 'fitmascore' ),
						'designation' => esc_html__( 'Gym Student', 'fitmascore' ),
                        'description' => esc_html__( '“I have been a member of GymFit for over a year now, and it has been a game-changer for my fitness journey. The gym has a fantastic range of equipment that caters to all my workout needs”', 'fitmascore' ),
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
			'testi_name_tab',
			[
				'label' => esc_html__( 'Title Style', 'fitmascore' ),
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
    <div class="testimonial-area-2 ">
        <div class="<?php echo esc_attr($container)?>">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="testi-box-wrap2 text-center">
                        <div class="row global-carousel testi-slider-2" id="testiSlider2" data-slide-show="1">
                        <?php foreach($settings['fitmas_repeater_list'] as $item) :?>
                            <div class="testimonial_slider">
                                <div class="testi-box style2">
                                    <div class="testi-box_thumb">
                                        <?php echo wp_get_attachment_image( $item['image']['id'], 'full' ); ?>
                                    </div>                        
                                    <div class="testi-box_content">
                                        <p class="testi-box_text"><?php echo esc_html( $item['description'] ); ?></p>
                                    </div>  
                                    <div class="testi-box_profile">
                                        <h4 class="testi-box_name"><?php echo esc_html( $item['name'] ); ?></h4>
                                        <span class="testi-box_desig"><?php echo esc_html( $item['designation'] ); ?></span>                        
                                    </div>                      
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <div class="testi-arrow">
                            <button data-slick-prev="#testiSlider2" class="slick-arrow slick-prev"><i class="fa-light fa-arrow-left"></i></button>
                            <button data-slick-next="#testiSlider2" class="slick-arrow slick-next"><i class="fa-light fa-arrow-right"></i></button>
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
Plugin::instance()->widgets_manager->register( new testimonial_two_widget );