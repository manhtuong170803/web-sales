<?php namespace Elementor;

class ad_slider_widget extends Widget_Base {

    public function get_name() {

        return 'ad_slider';
    }

    public function get_title() {
        return esc_html__( 'Ad Slider', 'fitmascore' );
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
            'brand_logo_options',
            [
                'label' => esc_html__( 'Add Slider', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'content1',
            [
                'label'   => esc_html__( 'Title', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'content2',
            [
                'label'   => esc_html__( 'Title', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'content3',
            [
                'label'   => esc_html__( 'Title', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
			'items',
			[
				'label'   => esc_html__( 'Add List', 'fitmascore' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'content1' => esc_html__( 'GYMFIT', 'fitmascore' ),
                        'content2' => esc_html__( 'FITNESS', 'fitmascore' ),
                        'content3' => esc_html__( 'CENTER', 'fitmascore' ),
					],
				],
				'title_field' => '{{{ content1 }}}',
			]
		);
      
        $this->end_controls_section();

       
        $this->start_controls_section(
			'brand_CSS_options',
			[
				'label' => esc_html__( 'Item', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typo',
                'label' => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .ad-slider_title',
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-slider_title' => 'color: {{VALUE}}',
                    
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_bg',
                'label' => esc_html__( 'Background', 'fitmascore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .ad-slider_title',
            ]
        );
		
		$this->add_responsive_control(
			'brand_CSS_item_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .ad-slider_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'brand_CSS_item_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .ad-slider_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                <div class="ad-slider">
                    <div class="global-carousel" data-autoplay-speed="1" data-speed="10000">
                        <?php foreach ( $settings['items'] as $item ): ?>
                            <h2 class="ad-slider_title"><?php echo esc_html($item['content1']); ?><span><?php echo esc_html($item['content2']); ?></span> <?php echo esc_html($item['content3']); ?></h2>
                        <?php endforeach;?>
                    </div>
                </div>
            
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new ad_slider_widget );