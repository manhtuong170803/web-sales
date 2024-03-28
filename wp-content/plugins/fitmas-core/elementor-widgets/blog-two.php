<?php namespace Elementor;

class blog_two_Widget extends Widget_Base {

    public function get_name() {

        return 'blog_two';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Blog V2', 'fitmascore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['fitmascore'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__( 'fitmas Section Title', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'stitle',
            [
                'label'   => esc_html__( 'Small Title', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'OUR BLOG POSTS', 'fitmascore' ),
                'label_block'=> 'true',
            ]
        );
        $this->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'READ OUR LATEST STORIES', 'fitmascore' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label'   => __( 'Select Title Tag', 'fitmascore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1'   => __( 'H1', 'fitmascore' ),
                    'h2'   => __( 'H2', 'fitmascore' ),
                    'h3'   => __( 'H3', 'fitmascore' ),
                    'h4'   => __( 'H4', 'fitmascore' ),
                    'h5'   => __( 'H5', 'fitmascore' ),
                    'h6'   => __( 'H6', 'fitmascore' ),
                    'span' => __( 'Span', 'fitmascore' ),
                    'p'    => __( 'P', 'fitmascore' ),
                    'div'  => __( 'Div', 'fitmascore' ),
                ],
            ]
        );
        $this->add_control(
            'description',
            [
                'label'       => esc_html__( 'Description', 'fitmascore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Welcome to our gym blog, where we share valuable insights, tips, and inspiration to help you on your journey to a healthier', 'fitmascore' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'buttons_text',
            [
                'label'       => esc_html__( 'Buttn Text', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'View More Posts', 'fitmascore' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button_link',
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
            ]
        );
        $this->end_controls_section();

        $options = array();
        $args = array(
            'hide_empty' => false,
        );
        $categories = get_categories( $args );

        foreach ( $categories as $key => $category ) {
            $options[$category->term_id] = $category->name;
        }
        //Content tab start
        $this->start_controls_section(
            'blog_options',
            [
                'label' => esc_html__( 'Blogs', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'note9',
            [
                'label' => __( 'Display Item Settings', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'   => esc_html__( 'Display Item', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
                'default' => 3,
            ]
        );
        $this->add_control(
            'note3',
            [
                'label' => __( 'Enable Category Settings', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable_cat',
            [
                'label'        => esc_html__( 'Post By Category', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'note4',
            [
                'label' => __( 'Category Settings', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'enable_cat' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'post_cat',
            [
                'label'     => __( 'Select Categoris', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::SELECT2,
                'multiple'  => true,
                'options'   => $options,
                'condition' => [
                    'enable_cat' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'note5',
            [
                'label' => __( 'Order By Settings', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__( 'Order by', 'fitmascore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__( 'None', 'fitmascore' ),
                    'ID'            => esc_html__( 'ID', 'fitmascore' ),
                    'date'          => esc_html__( 'Date', 'fitmascore' ),
                    'name'          => esc_html__( 'Name', 'fitmascore' ),
                    'title'         => esc_html__( 'Title', 'fitmascore' ),
                    'comment_count' => esc_html__( 'Comment count', 'fitmascore' ),
                    'rand'          => esc_html__( 'Random', 'fitmascore' ),
                ],
            ]
        );
        $this->add_control(
            'note6',
            [
                'label' => __( 'Order Settings', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'order',
            [
                'label'   => esc_html__( 'Order By', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'fitmascore' ),
                    'DESE' => esc_html__( 'DESE', 'fitmascore' ),
                ],
            ]
        );
        $this->add_control(
            'note7',
            [
                'label' => __( 'Title Settings', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_lanth',
            [
                'label'   => esc_html__( 'Title Lanth ', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 20,
                'step'    => 1,
                'default' => 7,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'      => esc_html__( 'Button Text', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::TEXTAREA,
                'default'    => esc_html__( 'READ MORE', 'fitmascore' ),
                'show_label' => true,
                'dynamic'    => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'container',
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

     //===========================================//
        //========= BLOG BOX STYLE START ========//
        //=========================================//

        $this->start_controls_section(
            'box_style',
            [
                'label' => esc_html__( 'Static Content Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'section_tabs'
        );
        $this->start_controls_tab(
            'section_normal_tab',
            [
                'label' => esc_html__( 'Small Title', 'fitmascore' ),
            ]
        );   
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_title_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .sub-title',
			]
		);

		$this->add_responsive_control(
			'subtitle_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sub-title' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'subtitle_backgrounds',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .sub-title',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'subtitle_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .sub-title',
            ]
        );
        $this->add_responsive_control(
            'subtitle_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .sub-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'subtitle_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .sub-title',
            ]
        );

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .sub-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_title_tab',
            [
                'label' => esc_html__( 'Title', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .sec-title,{{WRAPPER}} .sec-title p ',
			]
		);

		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title ,{{WRAPPER}} .sec-title p' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .sec-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_des_tab',
            [
                'label' => esc_html__( 'Description', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'dec_typo',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .sec-text',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-text' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .sec-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .sec-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tabs();
        $this->end_controls_section();

        //===============================================//
        //=========== BLOG MAIN BOX STYLE CSS===========//
        //=============================================//

        $this->start_controls_section(
            'blog_box',
            [
                'label' => esc_html__( 'Blog Box', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'blog_section_tabs'
        );
        $this->start_controls_tab(
            'blog_section_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'fitmascore' ),
            ]
        );     
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'blog_box_backgrounds',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog-card.style2',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'blog_box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style2',
            ]
        );
        $this->add_responsive_control(
            'blog_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'blog_box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style2',
            ]
        );
        $this->add_responsive_control(
            'blog_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'blog_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'blog_box_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'blog_box_backgrounds_hover',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog-card.style2:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'blog_box_shadow_hover',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style2:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'blog_box_border_hover',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style2:hover',
            ]
        );

        $this->add_responsive_control(
            'blog_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // ===================================================
        //=============== META STYLE CSS ======================
        //=====================================================
        
        $this->start_controls_section(
            'meta_box_date_style',
            [
                'label' => esc_html__( 'Meta Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'matabox_tabs'
        );
        
        $this->start_controls_tab(
            'meta_tab',
            [
                'label' => esc_html__( 'Normal', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'meta_typ',
                'selector' => '{{WRAPPER}} .blog-card.style2 .blog-meta a',
            ]
        );
        $this->add_responsive_control(
            'meta_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.style2 .blog-meta a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'meta_backgeound_color',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog-card.style2 .blog-meta a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'meta_box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style2 .blog-meta a',
            ]
        );
        $this->add_responsive_control(
            'meta_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2 .blog-meta a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'meta_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style2 .blog-meta a',
            ]
        );
        $this->add_responsive_control(
            'meta_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2 .blog-meta a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2 .blog-meta a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'meta_tab_hover',
            [
                'label' => esc_html__( 'Hover', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'meta_typ_hover',
                'selector' => '{{WRAPPER}} .blog-card.style2 .blog-meta a:hover',
            ]
        );
        $this->add_responsive_control(
            'meta_color_hover',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.style2 .blog-meta a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'meta_backgeound_color_hover',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog-card.style2 .blog-meta a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'meta_box_border_hover',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style2 .blog-meta a:hover',
            ]
        );
        $this->add_responsive_control(
            'meta_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2 .blog-meta a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'meta_shadow_hover',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style2 .blog-meta a:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //=============================================//
        //========== BLOG CONTENT STYLE START=========//
        //===========================================//

        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__( 'Image Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
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
						'max' => 1000,
						'step' =>1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2 .blog-img img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		 $this->add_responsive_control(
            'min_image_height',
            [
                'label'      => esc_html__( 'Min Height', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' =>1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2 .blog-img img' => 'min-height: {{SIZE}}{{UNIT}};',
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
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2 .blog-img img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'min_image_width',
            [
                'label'      => esc_html__( 'Min width', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2 .blog-img img' => 'min-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .blog-card.style2 .blog-img img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style2 .blog-img img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style2 .blog-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .blog-card.style2 .blog-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .blog-card.style2 .blog-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();



		$this->start_controls_section(
			'title_style_options1',
			[
				'label' => esc_html__( 'Title', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo1',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .blog-card .blog-title a ',
			]
		);

		$this->add_responsive_control(
			'title_color1',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-card .blog-title a' => 'color: {{VALUE}};',
				],
			]
		);	$this->add_responsive_control(
			'title_color1_hover',
			[
				'label'       => esc_html__('Hover Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-card .blog-title a:hover' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'title_backgrounds',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .blog-card .blog-title a',
            ]
        );
		$this->add_responsive_control(
			'title_margin1',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .blog-card .blog-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'title_padding1',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .blog-card .blog-title a' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
       //==================================//
        //======= Button Style css ============//
        //=================================//

        $this->start_controls_section(
            'button_CSS_options',
            [
                'label' => esc_html__( 'Button Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
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
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_text_typography',
                'selector' => '{{WRAPPER}} .style2 .link-btn',
            ]
        );
        $this->add_responsive_control(
            'button_text_color',
            [
                'label'     => esc_html__( 'Text Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .style2 .link-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'note1',
            [
                'label' => __( 'Icon Style', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typography',
                'selector' => '{{WRAPPER}} .style2 .link-btn i',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .style2 .link-btn i',
            ]
        );

        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .style2 .link-btn i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .style2 .link-btn i',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .style2 .link-btn i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .style2 .link-btn i',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .style2 .link-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .style2 .link-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->add_responsive_control(
            'button_text_color:hover',
            [
                'label'     => esc_html__( 'Text Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .style2 .link-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_border_background',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .style2 .link-btn:before',
            ]
        );
        $this->add_control(
            'note2',
            [
                'label' => __( 'Icon Style', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typography_hover',
                'selector' => '{{WRAPPER}} .style2:hover .link-btn i',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .style2:hover .link-btn i',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .style2:hover .link-btn i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .style2:hover .link-btn i',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .style2:hover .link-btn i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .style2:hover .link-btn i',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        global $post;
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        if ( $settings['enable_cat'] == 'yes' && !empty( $settings['post_cat'] ) ) {
            $p = new \WP_Query( array(
                'posts_per_page' => $settings['item_show'],
                'post_type'      => 'post',
                'paged'          => $paged,
                'orderby'        => esc_attr( $settings['orderby'] ),
                'order'          => esc_attr( $settings['order'] ),
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $settings['post_cat'],
                    ),
                ),
            ) );
        } else {
            $p = new \WP_Query( array(
                'posts_per_page' => $settings['item_show'],
                'post_type'      => 'post',
                'paged'          => $paged,
                'orderby'        => esc_attr( $settings['orderby'] ),
                'order'          => esc_attr( $settings['order'] ),
            ) );
        }
        ob_start();
        ?>
   <section class="blog-area-2 ">
        <div class="container container2">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 position-relative">
                    <div class="blog_sec_title_static me-lg-3">
                        <div class="blog_sec_title_wrap">
                            <div class="title-area">
                                <span class="sub-title"><?php echo esc_html( $settings['stitle'] ); ?> </span>
                                <h2 class="sec-title"><?php echo esc_html( $settings['title'] ); ?> </h2>
                                <p class="sec-text"><?php echo esc_html( $settings['description'] ); ?> </p>
                            </div>
                            <?php if ( ! empty( $settings['button_link']['url'] ) ) {
                                $this->add_link_attributes( 'button_link', $settings['button_link'] );
                                }?>
                            <a class="btn style-r0" <?php echo $this->get_render_attribute_string( 'button_link' ); ?> ><?php echo esc_html( $settings['buttons_text'] ); ?></a>
                        </div>                        
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-6">
                <?php while ( $p->have_posts() ): $p->the_post(); ?>
                    <div class="blog-card style2">
                    <?php if ( has_post_thumbnail() ): ?>
                        <div class="blog-img">
                            <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );?>
                        </div>
                        <?php endif;?>
                        <div class="blog-content">
                            <div class="blog-meta">
                            <?php fitmas_posted_on(); ?>
                            <?php fitmas_post_first_category(); ?>
                            </div>
                            <h3 class="blog-title box-title"><a href="<?php echo the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $settings['title_lanth'] ); ?></a></h3>
                            <a href="<?php echo the_permalink(); ?>" class="link-btn style2"><i class="fas fa-arrow-right"></i> <?php echo esc_html($settings['button_text']); ?></a>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_query();?>
                </div>
            </div>
        </div>
    </section>   
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new blog_two_Widget );
