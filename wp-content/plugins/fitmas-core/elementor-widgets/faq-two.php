<?php namespace Elementor;

class fitmas_accordion_two_Widget extends Widget_Base {

    public function get_name() {

        return 'accordion_two_widget';

    }
    public function get_title() {

        return esc_html__( 'Fitmas Faq V2', 'fitmascore' );
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
            'faq_options',
            [
                'label' => esc_html__( 'Fitmas Accordion', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'faq_active',
            [
                'label'        => esc_html__( 'Active FAQ', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater->add_control(
            'faq_title', [
                'label'       => esc_html__( 'Title', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'more_options',
            [

                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'faq_content', [
                'label'      => esc_html__( 'Content', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::TEXTAREA,
                'show_label' => false,
                'rows'        => 10,
            ]
        );
        $this->add_control(
            'faq_list',
            [
                'label'          => esc_html__( 'FAQ List', 'fitmascore' ),
                'type'           => \Elementor\Controls_Manager::REPEATER,
                'fields'         => $repeater->get_controls(),
                'default'        => [
                    [
                        'faq_active'  => 'yes',
                        'faq_title'   => esc_html__( ' What are your gym,s operating hours?', 'fitmascore' ),
                        'faq_content' => esc_html__( 'Our standard membership provides access to our gym facilities during regular operating hours. This option is ideal for individuals who prefer independent workouts and want to make use of our state.', 'fitmascore' ),
                    ],
                ],
                'title_field' => '{{{ faq_title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'faq_box_css',
            [
                'label' => esc_html__( 'Box CSS', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'faq_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .accordion-card',
			]
		);
        $this->add_responsive_control(
            'active_faq_background',
            [
                'label'     => esc_html__( 'Active Background Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-card.style2 .accordion-button:not(.collapsed)' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'faq_css_box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .accordion-card',
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'faq_css_box_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .accordion-card' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'faq_css_box_shoadow',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .accordion-card',
            ]
        );
        $this->add_responsive_control(
            'faq_css_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'faq_css_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
      

        // =======================================
        // ========== CONTENT STYLE CSS ==========
        // =======================================
        $this->start_controls_section(
            'faq_css_title',
            [
                'label' => esc_html__( 'Faq Title Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'faq_css_title_typo',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .accordion-card .accordion-button',
            ]
        );
        $this->add_responsive_control(
            'faq_css_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-card .accordion-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'faq_css_title_active_color',
            [
                'label'     => esc_html__( 'Active Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-card.style2 .accordion-button:not(.collapsed)' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'faq_css_title_height',
            [
                'label' => esc_html__( 'Height', 'fitmascore' ),
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
                    '{{WRAPPER}} .accordion-card .accordion-button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'faq_css_title_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion-card .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        // ===================================================
        $this->start_controls_section(
            'description_style_css',
            [
                'label' => esc_html__( 'Description Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'faq_css_dec_typo',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .faq-accordion .accordion-body',
            ]
        );
        $this->add_responsive_control(
            'faq_css_dec_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-card .accordion-body p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'body_bg_color',
            [
                'label'     => esc_html__( 'Body Background Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-card .accordion-body' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'faq_css_dec_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion-card .accordion-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'faq_css_dec_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .accordion-card .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // =======================================
        // ========== Icon Style CSS ==========
        // =======================================
        $this->start_controls_section(
            'icon_style_css',
            [
                'label' => esc_html__( 'Icon Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typo',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .accordion-card .accordion-button:after',
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-card .accordion-button:after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_bg_color',
            [
                'label'     => esc_html__( 'Background Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-card .accordion-button:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_active_color',
            [
                'label' => __( 'Active Icon Option', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'active_icon_color',
            [
                'label'     => esc_html__( 'Active Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-card .accordion-button:not(.collapsed):after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'active_icon_bg_color',
            [
                'label'     => esc_html__( 'Active Background Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-card .accordion-button:not(.collapsed):after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }
    
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $_id = rand( 1241, 3256 );
        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        
        ob_start();
        ?>
        <div class="fitmas-accordion-wraper">
            <div class="<?php echo esc_attr( $container ); ?>">
                <div class="accordion-area mb-30 accordion" id="faqAccordion">
                <?php $count = 0;foreach ( $settings['faq_list'] as $item ): $count++;
                               if($item['faq_active'] == 'yes' ){
                                $active = '';
                                $show = 'show';
                            }else{
                                $active = 'collapsed';
                                $show = '';
                            }?>
                    <div class="accordion-card style2 active">
                        <div class="accordion-header" id="collapse-item-1<?php echo esc_attr($count)?>">
                            <button class="accordion-button <?php echo esc_attr($active); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1<?php echo esc_attr($_id . $count)?>" aria-expanded="true" aria-controls="collapse-1<?php echo esc_attr($_id . $count)?>"> <?php echo esc_html($item['faq_title']); ?> </button>
                        </div>
                        <div id="collapse-1<?php echo esc_attr($_id . $count)?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="collapse-item-1<?php echo esc_attr($count)?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p class="faq-text"> <?php echo wp_kses_post($item['faq_content']); ?> </p>
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
Plugin::instance()->widgets_manager->register( new fitmas_accordion_two_Widget );
