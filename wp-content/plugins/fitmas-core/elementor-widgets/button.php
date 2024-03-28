<?php namespace Elementor;

class button_widget extends Widget_Base {

    public function get_name() {

        return 'button_widget';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Button', 'fitmascore' );
    }

    public function get_icon() {

        return 'eicon-site-identity';
    }

    public function get_categories() {
        return ['fitmascore'];
    }

    protected function register_controls() {
        //Content tab start
        $this->start_controls_section(
            'button_options',
            [
                'label' => esc_html__( 'Fitmas Button', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'select_style',
            [
                'label'   => esc_html__( 'Select Style', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one'   => esc_html__( 'One', 'fitmascore' ),
                    'two'   => esc_html__( 'Tow', 'fitmascore' ),
                    'three' => esc_html__( 'Three', 'fitmascore' ),
                ],
            ]
        );
        $this->add_control(
            'enable_button_one',
            [
                'label'        => esc_html__( 'Enable Button One', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'select_style' => 'one',
                ],
            ]
        );
        $this->add_control(
            'buttons_text2',
            [
                'label'       => esc_html__( 'Buttn Text', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Learn More', 'fitmascore' ),
                'label_block' => true,
                'condition'   => [
                    'enable_button_one' => 'yes',
                    'select_style'      => 'one',
                ],
            ]
        );
        $this->add_control(
            'button_link2',
            [
                'label'       => esc_html__( 'Link', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'fitmascore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition'   => [
                    'select_style'      => 'one',
                    'enable_button_one' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'enable_button_two',
            [
                'label'        => esc_html__( 'Enable Button Two', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'no',
                'condition'    => [
                    'select_style' => 'one',
                ],
            ]
        );
        $this->add_control(
            'buttons_text3',
            [
                'label'       => esc_html__( 'Buttn Text', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'View All Services', 'fitmascore' ),
                'label_block' => true,
                'condition'   => [
                    'enable_button_two' => 'yes',
                    'select_style'      => 'one',
                ],
            ]
        );
        $this->add_control(
            'button_link3',
            [
                'label'       => esc_html__( 'Link', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'fitmascore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition'   => [
                    'enable_button_two' => 'yes',
                    'select_style'      => 'one',
                ],
            ]
        );

    // --------------------------------------------
    // ---------Button Style Two----------------
    // --------------------------------------------

        $this->add_control(
            'buttons_text1',
            [
                'label'       => esc_html__( 'Buttn Text', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Learn More', 'fitmascore' ),
                'label_block' => true,
                'condition'   => [
                    'select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'button_link1',
            [
                'label'       => esc_html__( 'Link', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'fitmascore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition'   => [
                    'select_style' => 'two',
                ],
            ]
        );
       
        // --------------------------------
        // Button style Three
        // --------------------------------

        $this->add_control(
            'enable_button_style_three',
            [
                'label'        => esc_html__( 'Enable Button', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'select_style' => 'three',
                ],
            ]
        );
        $this->add_control(
            'buttons_text_style_three',
            [
                'label'       => esc_html__( 'Buttn Text', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Learn More', 'fitmascore' ),
                'label_block' => true,
                'condition'   => [
                    'enable_button_style_three' => 'yes',
                    'select_style'              => 'three',
                ],
            ]
        );
        $this->add_control(
            'button_link_style_three',
            [
                'label'       => esc_html__( 'Link', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'fitmascore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition'   => [
                    'select_style'              => 'three',
                    'enable_button_style_three' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'enable_button_style_three2',
            [
                'label'        => esc_html__( 'Enable Button', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'no',
                'condition'    => [
                    'select_style' => 'three',
                ],
            ]
        );
        $this->add_control(
            'buttons_text_style_three_2',
            [
                'label'       => esc_html__( 'Buttn Text', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'View All Services', 'fitmascore' ),
                'label_block' => true,
                'condition'   => [
                    'enable_button_style_three2' => 'yes',
                    'select_style'               => 'three',
                ],
            ]
        );
        $this->add_control(
            'button_link_style_three_2',
            [
                'label'       => esc_html__( 'Link', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'fitmascore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition'   => [
                    'enable_button_style_three2' => 'yes',
                    'select_style'               => 'three',
                ],
            ]
        );
        $this->end_controls_section();

        //==================================//
        //======= Button Style One  ============//
        //=================================//

        $this->start_controls_section(
            'button_CSS_options',
            [
                'label'     => esc_html__( 'Button CSS One', 'fitmascore' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_button_one' => 'yes',
                    'select_style' => 'one',
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
        $this->add_responsive_control(
            'box_align',
            [
                'label'     => esc_html__( 'Alignment', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__( 'Left', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__( 'Right', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography',
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style-one',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style-one::before',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .btn.style-one' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style-one',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn.style-one' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style-one',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn.style-one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .btn-wrap .btn.style-one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style-one:hover:before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style-one:hover',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .btn.style-one:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style-one:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn.style-one:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style-one:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //==================================//
        //======= Button Style One 2 ============//
        //=================================//

        $this->start_controls_section(
            'button_CSS_options2',
            [
                'label'     => esc_html__( 'Button CSS ', 'fitmascore' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_button_two' => 'yes',
                    'select_style' => 'one',
                ],
            ]
        );
        $this->start_controls_tabs(
            'button_content_tabs2'
        );
        $this->start_controls_tab(
            'button_normal2',
            [
                'label' => __( 'Normal', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
            'box_align2',
            [
                'label'     => esc_html__( 'Alignment', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__( 'Left', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__( 'Right', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography2',
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border.style-two',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background2',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border.style-two::before',
            ]
        );
        $this->add_responsive_control(
            'button_color2',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .btn-border.style-two' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border2',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border.style-two',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius2',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn-border.style-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow2',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border.style-two',
            ]
        );
        $this->add_responsive_control(
            'button_margin2',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn-border.style-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding2',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn-border.style-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover2',
            [
                'label' => __( 'Hover', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography_hover2',
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border.style-two:hover:before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover2',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border.style-two:hover',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover2',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .btn-border.style-two:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover2',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border.style-two:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover2',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn-border.style-two:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover2',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border.style-two:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //===========================================//
        //======= Button Style Two  css ============//
        //=========================================//

        $this->start_controls_section(
            'button_CSS_options3',
            [
                'label'     => esc_html__( 'Button CSS two', 'fitmascore' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'two',
                ],
            ]
        );
        $this->start_controls_tabs(
            'button_content_tabs3'
        );
        $this->start_controls_tab(
            'button_normal3',
            [
                'label' => __( 'Normal', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
            'box_align3',
            [
                'label'     => esc_html__( 'Alignment', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__( 'Left', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__( 'Right', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography3',
                'selector' => '{{WRAPPER}} .style-three',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background3',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .style-three:before',
            ]
        );
        $this->add_responsive_control(
            'button_color3',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .style-three' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border3',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .style-three',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius3',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .style-three' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow3',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .style-three',
            ]
        );
        $this->add_responsive_control(
            'button_margin3',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .style-three' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding3',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .style-three' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover3',
            [
                'label' => __( 'Hover', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography_hover3',
                'selector' => '{{WRAPPER}} .style-three:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover3',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .style-three:hover:before',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover3',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .style-three:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover3',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .style-three:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover3',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .style-three:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover3',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .style-three:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

         // ----------------------------------
        // button Style Three ---------------
        // ----------------------------------
       

        $this->start_controls_section(
            'button_CSS_options4',
            [
                'label'     => esc_html__( 'Button CSS Three', 'fitmascore' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_button_style_three' => 'yes',
                    'select_style' => 'three',
                ],
            ]
        );
        $this->start_controls_tabs(
            'button_content_tabs4'
        );
        $this->start_controls_tab(
            'button_norma4',
            [
                'label' => __( 'Normal', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
            'box_align4',
            [
                'label'     => esc_html__( 'Alignment', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__( 'Left', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__( 'Right', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography4',
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style6',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background4',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style6::before',
            ]
        );
        $this->add_responsive_control(
            'button_color4',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .btn.style6' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border4',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style6',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius4',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn.style6' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow4',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style6',
            ]
        );
        $this->add_responsive_control(
            'button_margin4',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn.style6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding4',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn.style6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover4',
            [
                'label' => __( 'Hover', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography_hover4',
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style6:hover:before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover4',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style6:hover',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover4',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .btn.style6:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover4',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style6:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover4',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn.style6:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover4',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn.style6:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //==================================//
        //======= Button Style Three 2 ============//
        //=================================//

        $this->start_controls_section(
            'button_CSS_options5',
            [
                'label'     => esc_html__( 'Button CSS ', 'fitmascore' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_button_style_three2' => 'yes',
                    'select_style' => 'three',
                ],
            ]
        );
        $this->start_controls_tabs(
            'button_content_tabs5'
        );
        $this->start_controls_tab(
            'button_normal5',
            [
                'label' => __( 'Normal', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
            'box_align5',
            [
                'label'     => esc_html__( 'Alignment', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__( 'Left', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__( 'Right', 'fitmascore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography5',
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border4',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background5',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border4::before',
            ]
        );
        $this->add_responsive_control(
            'button_color5',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .btn-border4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border5',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border4',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius5',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn-border4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow5',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border4',
            ]
        );
        $this->add_responsive_control(
            'button_margin5',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn-border4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding5',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn-border4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover5',
            [
                'label' => __( 'Hover', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography_hover5',
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border4:hover:before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover5',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border4:hover',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover5',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .btn-border4:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover5',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border4:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover5',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-wrap .btn-border4:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover5',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .btn-wrap .btn-border4:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        ob_start();
        ?>
           <div class="container">
                <?php if ( $settings['select_style'] == 'one' ): ?>
                    <div class="btn-wrap">
                        <?php if ( $settings['enable_button_one'] == 'yes' ):
                            if ( !empty( $settings['button_link2']['url'] ) ) {
                                $this->add_link_attributes( 'button_link2', $settings['button_link2'] );
                                }?>
	                            <a class="btn style-r0 style-one"  <?php echo $this->get_render_attribute_string( 'button_link2' ); ?>><?php echo esc_html( $settings['buttons_text2'] ); ?></a>
	                    <?php endif;?>
                        <?php if ( $settings['enable_button_two'] == 'yes' ):
                            if ( !empty( $settings['button_link3']['url'] ) ) {
                                $this->add_link_attributes( 'button_link3', $settings['button_link3'] );
                            }?>
	                            <a class="btn btn-border style-r0 style-two"  <?php echo $this->get_render_attribute_string( 'button_link3' ); ?>><?php echo esc_html( $settings['buttons_text3'] ); ?></a>
	                    <?php endif;?>
                    </div>
                <?php endif;?>

                <?php if ( $settings['select_style'] == 'two' ):
                    if ( !empty( $settings['button_link1']['url'] ) ) {
                        $this->add_link_attributes( 'button_link1', $settings['button_link1'] );
                        }?>
                    <div class="btn-wrap">
                    <a class="btn btn-border2 style-three"  <?php echo $this->get_render_attribute_string( 'button_link1' ); ?> > <?php echo esc_html( $settings['buttons_text1'] ); ?> </a>
                    </div>
                <?php endif;?>

                <?php if ( $settings['select_style'] == 'three' ): ?>
                    <div class="btn-wrap">
                    <?php if ( $settings['enable_button_style_three'] == 'yes' ):
                        if ( !empty( $settings['button_link_style_three']['url'] ) ) {
                            $this->add_link_attributes( 'button_link_style_three', $settings['button_link_style_three'] );
                            }?>
                            <a class="btn style6" <?php echo $this->get_render_attribute_string( 'button_link_style_three' ); ?> > <?php echo esc_html( $settings['buttons_text_style_three'] ); ?></a>
                        <?php endif;?>
                        <?php if ( $settings['enable_button_style_three2'] == 'yes' ):
                            if ( !empty( $settings['button_link_style_three_2']['url'] ) ) {
                                $this->add_link_attributes( 'button_link_style_three_2', $settings['button_link_style_three_2'] );
                                }?>
                            <a class="btn btn-border4" <?php echo $this->get_render_attribute_string( 'button_link_style_three_2' ); ?> > <?php echo esc_html( $settings['buttons_text_style_three_2'] ); ?> </a>
                        <?php endif;?>
                    </div>
                <?php endif;?>
           </div>
        <?php
    echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new button_widget );