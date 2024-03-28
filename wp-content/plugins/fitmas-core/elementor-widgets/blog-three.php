<?php namespace Elementor;

class blog_three_Widget extends Widget_Base {

    public function get_name() {

        return 'blog_three';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Blog V3', 'fitmascore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['fitmascore'];
    }

    protected function register_controls() {

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
            'image',
            [
                'label' => __( 'Background Image', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
        
        $this->add_responsive_control(
            'content_width',
            [
                'label'      => __( 'Content Column Width (%)', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range'      => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices'    => ['desktop', 'tablet', 'mobile'],

                'selectors'  => [
                    '{{WRAPPER}} .coluam-width' => 'flex:0 0 {{SIZE}}%;max-width: {{SIZE}}%;',
                ],
            ]
        );

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
  
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'blog_box_backgrounds',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog-card.style3',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'blog_box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style3',
            ]
        );
        $this->add_responsive_control(
            'blog_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'blog_box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style3',
            ]
        );
        $this->add_responsive_control(
            'blog_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .blog-card.style3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ===================================================
        //=============== META STYLE CSS ======================
        //=====================================================
        
        $this->start_controls_section(
            'meta_box_date_style',
            [
                'label' => esc_html__( 'Date Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'meta_typ',
                'selector' => '{{WRAPPER}} .blog-card.style3 .blog-date',
            ]
        );
        $this->add_responsive_control(
            'meta_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card.style3 .blog-date' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'meta_backgeound_color',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .blog-card.style3 .blog-date',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'meta_box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style3 .blog-date',
            ]
        );
        $this->add_responsive_control(
            'meta_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style3 .blog-date' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'meta_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .blog-card.style3 .blog-date',
            ]
        );
        $this->add_responsive_control(
            'meta_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card.style3 .blog-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .blog-card.style3 .blog-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
      
        $this->end_controls_section();

//   ------------------------------------------
//   ------------------------------------------
//   ------------------------------------------



$this->start_controls_section(
    'cat_style_options1',
    [
        'label' => esc_html__( 'Title', 'fitmascore' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_group_control(
    Group_Control_Typography::get_type(),
    [
        'name' => 'cat_typo1',
        'label' => __( 'Typography', 'fitmascore' ),
        'selector' => '{{WRAPPER}} .blog-category a ',
    ]
);

$this->add_responsive_control(
    'cat_color1',
    [
        'label'       => esc_html__('Color', 'fitmascore'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .blog-category a' => 'color: {{VALUE}};',
        ],
    ]
);	$this->add_responsive_control(
    'cat_color1_hover',
    [
        'label'       => esc_html__('Hover Color', 'fitmascore'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .blog-category a:hover' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_responsive_control(
    'cat_margin1',
    [
        'label'      => esc_html__( 'Margin', 'fitmascore' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors'  => [
            '{{WRAPPER}} .blog-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
$this->add_responsive_control(
    'cat_padding1',
    [
        'label'      => esc_html__( 'Padding', 'fitmascore' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors'  => [
            '{{WRAPPER}} .blog-category' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
$this->end_controls_section();
//   ------------------------------------------
//   ------------------Title Style----------------
//   ------------------------------------------


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
        //======= Author Style css ============//
        //=================================//

        $this->start_controls_section(
            'author_CSS_options',
            [
                'label' => esc_html__( 'Author Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'author_typography',
                'selector' => '{{WRAPPER}} .blog-card .blog-meta a',
            ]
        );
        $this->add_responsive_control(
            'author_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-meta a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'author_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-card .blog-meta a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'author_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card .blog-meta a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'author_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .blog-card .blog-meta a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
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
        if( $settings['container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-fluid';
        }
        ob_start();
        ?>
 <section class="blog-area-3">
        <div class="blog-bg-thumb shape-mockup img-half img-right">
            <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' );?>
        </div>
        <div class="<?php echo esc_attr( $container ); ?>">
            <div class="row">
                <div class="col-xl-7 col-lg-8 coluam-width">
                <?php while ( $p->have_posts() ): $p->the_post(); ?>
                    <div class="blog-card style3">
                        <div class="blog-date">
                            <span><?php echo get_the_date('d' ); ?></span><?php echo get_the_date('M ' ); ?>
                        </div>
                        <div class="blog-content">
                            <span class="blog-category">
                            <?php fitmas_post_first_category(); ?>
                            </span>
                            <h3 class="blog-title box-title"> 
                                <a href="<?php echo the_permalink(); ?>"> <?php echo wp_trim_words( get_the_title(), $settings['title_lanth'] ); ?> </a> 
                            </h3>
                            <div class="blog-meta">
                                <a><i class="far fa-user"></i> Post by: <?php echo get_the_author(); ?></a>
                            </div>
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
Plugin::instance()->widgets_manager->register( new blog_three_Widget );
