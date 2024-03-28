<?php

namespace Elementor;

class portfolio_two_widget extends Widget_Base
{

    public function get_name()
    {

        return 'portfolio_two';
    }

    public function get_title()
    {
        return esc_html__('Fitmas Portfolio V2', 'fitmascore');
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
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'   => esc_html__('Disply Items', 'fitmascore'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 4,
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
                'max'     => 30,
                'step'    => 1,
                'default' => 3,
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
        $this->add_control(
            'enable_slide',
            [
                'label'        => esc_html__('Enable Slide', 'fitmascore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'fitmascore'),
                'label_off'    => esc_html__('Hide', 'fitmascore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
		$this->add_control(
            'pagination',
            [
                'label' => esc_html__( 'Enable Pagination', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'fitmascore' ),
                'label_off' => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default' => 'no',
                
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'   => __( 'Columns On Desktop', 'fitmascore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-xl-4',
                'options' => [
                    'col-xl-12' => __( '1 Column', 'fitmascore' ),
                    'col-xl-6'  => __( '2 Column', 'fitmascore' ),
                    'col-xl-4'  => __( '3 Column', 'fitmascore' ),
                    'col-xl-3'  => __( '4 Column', 'fitmascore' ),
                    'col-xl-2'  => __( '6 Column', 'fitmascore' ),
                ],
            ]
        );

        $this->add_control(
            'laptop_col',
            [
                'label'   => __( 'Columns for Laptop', 'fitmascore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-lg-4',
                'options' => [
                    'col-lg-12' => __( '1 Column', 'fitmascore' ),
                    'col-lg-6'  => __( '2 Column', 'fitmascore' ),
                    'col-lg-4'  => __( '3 Column', 'fitmascore' ),
                    'col-lg-3'  => __( '4 Column', 'fitmascore' ),
                    'col-lg-2'  => __( '6 Column', 'fitmascore' ),
                ],
            ]
        );

        $this->add_control(
            'tab_col',
            [
                'label'   => __( 'Columns On Tablet', 'fitmascore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-md-6',
                'options' => [
                    'col-md-12' => __( '1 Column', 'fitmascore' ),
                    'col-md-6'  => __( '2 Column', 'fitmascore' ),
                    'col-md-4'  => __( '3 Column', 'fitmascore' ),
                    'col-md-3'  => __( '4 Column', 'fitmascore' ),
                    'col-md-2'  => __( '6 Column', 'fitmascore' ),
                ],
            ]
        );
        $this->end_controls_section();
  
    // --------------------------------------
    // --------------------------------------
    // --------------------------------------

        $this->start_controls_section(
            'box_style',
            [
                'label' => esc_html__( 'Box Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'box_align',
			[
				'label' => esc_html__( 'Alignment', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'fitmascore' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'fitmascore' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'fitmascore' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .project-card .project-content' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .project-card .project-content',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .project-card .project-content',
            ]
        );
        $this->add_responsive_control(
            'team_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-card .project-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .project-card .project-content',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-card .project-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-card .project-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

           // ===============================================
        // =========== IMAGE STYLE CSS ===================
        // ===============================================

        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__( 'Image Style', 'fitmascore' ),
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
						'max' => 1000,
						'step' =>1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .project-card .project-img img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-card .project-img img' => 'min-height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-card .project-img img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-card .project-img img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .project-card .project-img img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-card .project-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-card .project-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-card .project-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


          // ===================================================
        // ============== CONTENT STYLE ======================
        // ===================================================

        $this->start_controls_section(
            'content_tab_style',
            [
                'label' => esc_html__( 'Content Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'fitmas_Content_tabs' );
        $this->start_controls_tab(  
            'title_normal_tab',
            [
                'label' => esc_html__( 'Title', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'ptitle_typography',
                'selector' => '{{WRAPPER}} .project-title',
            ]
        );
        $this->add_responsive_control(
            'ptitle_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // ===================== Category STYLE====================

        $this->start_controls_tab(  
            'category_tab ',
            [
                'label' => esc_html__( 'Category', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'cat_typography',
                'selector' => '{{WRAPPER}} .project-subtitle',
            ]
        );

        $this->add_responsive_control(
            'cat_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'cat_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }
    //Render
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
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
        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
?>
    <div class="portfolio-area-2 ">
        <div class="<?php echo esc_attr( $container ); ?> px-15">
            <?php if ( $settings['enable_slide'] == 'yes' ) { ?>
            <div class="row global-carousel portfolio-slider2" data-slide-show="4" data-ml-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="false">
                <?php }else{?>
            <div class="row gy-30"?>
                <?php }?>
                <?php while ( $p->have_posts() ): $p->the_post();?>
                    <div class="<?php echo esc_attr( $column ); ?>">
                        <div class="project-card">
                            <div class="project-img">
                                <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                            </div>
                            <div class="project-content">
                                <?php $project_catagorys = get_the_terms( get_the_ID(), 'fitmas_portfolio_cat' );
                                    if ( $project_catagorys && ! is_wp_error( $project_catagorys ) ) : ?>

                                    <h6 class="project-subtitle">
                                        <?php foreach($project_catagorys as $project_catagory ): ?>
                                            <?php echo esc_html($project_catagory->name)?> 
                                        <?php endforeach; ?>
                                    </h6>
                                <?php endif; ?>
                                <h4 class="project-title"><a href="<?php the_permalink(); ?>" tabindex="-1"><?php echo wp_trim_words( get_the_title(), $settings['title_lanth'] ); ?></a></h4>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata();wp_reset_query();?>
            </div>
		<?php if($settings['pagination'] == 'yes' ) { ?>
			<?php fitmascore_paginate_nav($p); ?>
		<?php } ?>
        </div>
    </div>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new portfolio_two_widget);
