<?php

namespace Elementor;

class portfolio_one_widget extends Widget_Base
{

    public function get_name()
    {

        return 'portfolio_one';
    }

    public function get_title()
    {
        return esc_html__('Fitmas Portfolio V1', 'fitmascore');
    }

    public function get_icon()
    {

        return 'eicon-shape';
    }

    public function get_categories()
    {
        return ['fitmascore'];
    }
    /**
     * Elementor Templates List
     * return array
     */

    protected function register_controls(){
        //Content tab start
        $this->start_controls_section(
            'fitmas_tabs_options',
            [
                'label' => esc_html__('Fitmas Portfolio', 'fitmascore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_container',
            [
                'label'        => esc_html__('Enable Container', 'fitmascore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'fitmascore'),
                'label_off'    => esc_html__('Hide', 'fitmascore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'   => esc_html__('Disply Items', 'fitmascore'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 3,
            ]
        );
		$this->add_control(
            'enable_cat',
            [
                'label'        => esc_html__('Post By Category', 'fitmascore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'fitmascore'),
                'label_off'    => esc_html__('Hide', 'fitmascore'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'post_cat',
            [
                'label'     => __('Select Categoris', 'fitmascore'),
                'type'      => \Elementor\Controls_Manager::SELECT2,
                'multiple'  => true,
                'options'   => fitmascore_portfolio_cat_list(),
                'condition' => [
                    'enable_cat' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title_lanth',
            [
                'label'   => esc_html__('Title Lanth ', 'fitmascore'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 20,
                'step'    => 1,
                'default' => 5,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__('Order Type', 'fitmascore'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__('None', 'fitmascore'),
                    'ID'            => esc_html__('ID', 'fitmascore'),
                    'date'          => esc_html__('Date', 'fitmascore'),
                    'name'          => esc_html__('Name', 'fitmascore'),
                    'title'         => esc_html__('Title', 'fitmascore'),
                    'comment_count' => esc_html__('Comment count', 'fitmascore'),
                    'rand'          => esc_html__('Random', 'fitmascore'),
                ],
            ]
        );
        $this->add_responsive_control(
            'order',
            [
                'label'   => esc_html__('Order', 'fitmascore'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__('ASC', 'fitmascore'),
                    'DESE' => esc_html__('DESE', 'fitmascore'),
                ],
            ]
        );

        $this->end_controls_section();

        //===========================================//
        //========= PROJECT BOX STYLE START ========//
        //=========================================//
        $this->start_controls_section(
            'box_style',
            [
                'label' => esc_html__('Box Style', 'fitmascore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__('Background', 'fitmascore'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .gallery-card .gallery-content',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__('Border', 'fitmascore'),
                'selector' => '{{WRAPPER}} .gallery-card .gallery-content',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__('Box Shadow', 'fitmascore'),
                'selector' => '{{WRAPPER}} .gallery-card .gallery-content',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__('Margin', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label'      => esc_html__('Padding', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // --------- Tab Image Style ---------------

        $this->start_controls_section(
            'image_CSS_options',
            [
                'label' => esc_html__('Tab Image Style', 'fitmascore'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_responsive_control(
            'Image_height',
            [
                'label'      => esc_html__('Height', 'fitmascore'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-img img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label'      => esc_html__('Width', 'fitmascore'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-img img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_max_width',
            [
                'label'      => esc_html__('Max Width', 'fitmascore'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 500,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-img img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'opacity_color',
            [
                'label'     => esc_html__( 'Opacity Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-card:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__('Border', 'fitmascore'),
                'selector' => '{{WRAPPER}} .gallery-card .gallery-img img,{{WRAPPER}} .gallery-card:after',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .gallery-card:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => esc_html__('Margin', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-img img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label'      => esc_html__('Padding', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'label' => esc_html__('Title', 'fitmascore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typo',
                'label'    => __('Typography', 'fitmascore'),
                'selector' => '{{WRAPPER}} .gallery-card .gallery-content_title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'fitmascore'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-card .gallery-content_title a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_color_hover',
            [
                'label'     => esc_html__('Color', 'fitmascore'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-card .gallery-content_title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => esc_html__('Margin', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-content_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => esc_html__('Padding', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-content_title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

     

        //
        // ----------------Description Style------------------
        //

        $this->start_controls_section(
            'cat_options',
            [
                'label' => esc_html__('Category', 'fitmascore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'cat_typo',
                'label'    => esc_html__('Typography', 'fitmascore'),
                'selector' => '{{WRAPPER}} .gallery-card .gallery-content_subtitle',
            ]
        );
        $this->add_responsive_control(
            'cat_color',
            [
                'label'     => esc_html__('Color', 'fitmascore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-card .gallery-content_subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_margin',
            [
                'label'      => esc_html__('Margin', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-content_subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_padding',
            [
                'label'      => esc_html__('Padding', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-content_subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

    //   --------- arrow Style

        $this->start_controls_section(
            'arrow_CSS_options',
            [
                'label' => esc_html__('arrow CSS', 'fitmascore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'arrow_content_tabs'
        );
        $this->start_controls_tab(
            'arrow_normal',
            [
                'label' => __('Normal', 'fitmascore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'arrow_icon_typography',
                'selector' => '{{WRAPPER}} .flip-gallery .flipster__button',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'arrow_background',
                'label'    => esc_html__('Background', 'fitmascore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .flip-gallery .flipster__button',
            ]
        );
        $this->add_responsive_control(
            'arrow_color',
            [
                'label'     => esc_html__('Color', 'fitmascore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flip-gallery .flipster__button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_icon_width',
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
                    '{{WRAPPER}} .flip-gallery .flipster__button ' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_icon_height',
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
                    '{{WRAPPER}} .flip-gallery .flipster__button ' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'arrow_border',
                'label'    => esc_html__('Border', 'fitmascore'),
                'selector' => '{{WRAPPER}} .flip-gallery .flipster__button',
            ]
        );
        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .flip-gallery .flipster__button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'arrow_box_shadow',
                'label'    => esc_html__('Shadow', 'fitmascore'),
                'selector' => '{{WRAPPER}} .flip-gallery .flipster__button',
            ]
        );
        $this->add_responsive_control(
            'arrow_margin',
            [
                'label'      => esc_html__('Margin', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .flip-gallery .flipster__button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_padding',
            [
                'label'      => esc_html__('Padding', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .flip-gallery .flipster__button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'arrow_hover',
            [
                'label' => __('Hover', 'fitmascore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'arrow_icon__typography_hover',
                'selector' => '{{WRAPPER}} .flip-gallery .flipster__button:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'arrow_background_hover',
                'label'    => esc_html__('Background', 'fitmascore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .flip-gallery .flipster__button:hover',
            ]
        );
        $this->add_responsive_control(
            'arrow_color_hover',
            [
                'label'     => esc_html__('Color', 'fitmascore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flip-gallery .flipster__button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'arrow_border_hover',
                'label'    => esc_html__('Border', 'fitmascore'),
                'selector' => '{{WRAPPER}} .flip-gallery .flipster__button:hover',
            ]
        );
        $this->add_responsive_control(
            'arrow_border_radius_hover',
            [
                'label'      => esc_html__('Border Radius', 'fitmascore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .flip-gallery .flipster__button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'arrow_box_shadow_hover',
                'label'    => esc_html__('Shadow', 'fitmascore'),
                'selector' => '{{WRAPPER}} .flip-gallery .flipster__button:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'icon_css',
            [
                'label' => __( 'Media Icon Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_size',
				'selector' => '{{WRAPPER}} .gallery-card .gallery-content .icon-btn',
			]
		);

        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-card .gallery-content .icon-btn ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .gallery-card .gallery-content .icon-btn ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__( 'icon Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .gallery-card .gallery-content .icon-btn ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .gallery-card .gallery-content .icon-btn ',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .gallery-card .gallery-content .icon-btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .gallery-card .gallery-content .icon-btn ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .gallery-card .gallery-content .icon-btn ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    
        $this->end_controls_section();
    }
    //Render
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $unique = rand(35000, 54000);
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        if ($settings['enable_cat'] == 'yes' && !empty($settings['post_cat'])) {
            $p = new \WP_Query(array(
                'posts_per_page' => esc_attr($settings['item_show']),
                'post_type'      => 'fitmas_portfolio',
                'paged'          => $paged,
                'order'          => esc_attr($settings['orderby']),
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'fitmas_portfolio_cat',
                        'field'    => 'slug',
                        'terms'    => $settings['post_cat'],
                    ),
                ),
            ));
        } else {
            $p = new \WP_Query(array(
                'posts_per_page' => esc_attr($settings['item_show']),
                'post_type'      => 'fitmas_portfolio',
                'orderby'        => esc_attr($settings['orderby']),
                'order'          => esc_attr($settings['order']),
            ));
        }
        if ($settings['enable_container'] == 'yes') {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
?>
    <div class="portfolio-area-1 portfolio-one">
        <div class="container-fluid">
            <div class="flip-gallery-area">
                <div class="flip-gallery">
                    <ul class="flip-items">
                    <?php while ( $p->have_posts() ): $p->the_post();?>
                        <li>
                            <div class="gallery-card gallery-flip">
                                <div class="gallery-img">
                                    <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                                </div>
                                <div class="gallery-content">
                                    <div class="media-left">
                                        <?php $project_catagorys = get_the_terms( get_the_ID(), 'fitmas_portfolio_cat' );
											if ( $project_catagorys && ! is_wp_error( $project_catagorys ) ) : ?>

											<h6 class="gallery-content_subtitle">
												<?php foreach($project_catagorys as $project_catagory ): ?>
													<?php echo esc_html($project_catagory->name)?> 
												<?php endforeach; ?>
											</h6>
										<?php endif; ?>
                                        <h4 class="gallery-content_title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $settings['title_lanth'] ); ?> </a> </h4>
                                    </div>
                                    <a href="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?>" class="icon-btn popup-image">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <?php endwhile; wp_reset_postdata();wp_reset_query();?> 
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
                (function ($) {
                    "use strict";
                    //Documnet Ready Function
                    $( document ).ready(function() {
                        if ($(".flip-gallery").length > 0) {
                            $(".flip-gallery").flipster({
                                style: 'carousel',
                                spacing: -0.5,
                                nav: true,
                                buttons: true,
                                loop: true,
                                scrollwheel: false,
                            });
                        }
                    });
                })(jQuery);
                </script>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new portfolio_one_widget);
