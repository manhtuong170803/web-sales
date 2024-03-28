<?php namespace Elementor;

class fitmas_gallery_two_Widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_gallery_two';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Gallery V2', 'fitmascore' );
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
			'gallery_content',
			[
				'label' => esc_html__( 'gallery content', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'gallery_image',
			[
				'label' => esc_html__( 'Add Images', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);

		$this->end_controls_section();

        // -------------- gallery style ----------
        $this->start_controls_section(
			'gallery_style_options',
			[
				'label' => esc_html__( 'Gallery  Style', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
	
	    $this->add_responsive_control(
			'gallery_Image_height',
			[
				'label' => esc_html__( 'image Height', 'fitmascore' ),
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
					'{{WRAPPER}} .portfolio-thumb img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'gallery_image_width',
			[
				'label' => esc_html__( 'Image Width', 'fitmascore' ),
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
					'{{WRAPPER}} .portfolio-thumb img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'gallery_image_object',
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
                    '{{WRAPPER}} .portfolio-thumb img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hover_background_color',
                'label'    => esc_html__( 'Hover Color', 'fitmascore' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .portfolio-thumb:after',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'gallery_image_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .portfolio-thumb img,{{WRAPPER}} .portfolio-thumb:after',
            ]
        );
        $this->add_responsive_control(
            'gallery_image_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        ob_start();
        ?>
 <div class="portfolio-area ">            
        <div class="container">
            <div class="row gy-30">
            <?php foreach ( $settings['gallery_image'] as $image ): ?>
                <div class="col-lg-4 portfolio-two">
                    <div class="portfolio-thumb">
                        <a class="popup-image icon-btn" href="<?php echo esc_attr( $image['url'] ); ?>"><i class="far fa-eye"></i></a>
                        <img src="<?php echo esc_attr( $image['url'] ); ?>" alt="portfolio">
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
Plugin::instance()->widgets_manager->register( new fitmas_gallery_two_Widget );