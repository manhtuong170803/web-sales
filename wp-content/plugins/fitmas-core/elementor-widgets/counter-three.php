<?php namespace Elementor;

class fitmas_progressbar_widget extends Widget_Base {

	public function get_name() {

		return 'counter_progressbar';
	}

	public function get_title() {
		return esc_html__( 'Fitmas progressbar', 'fitmascore' );
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
			'counter_options',
			[
				'label' => esc_html__( 'fitmas progressbar', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
	
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'percent',
			[
				'label' => __( 'Percentage', 'ecofinecore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 80,
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'   => esc_html__( 'Title', 'fitmascore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		
		$this->add_control(
			'progressbar',
			[
				'label'       => esc_html__( 'progressbar List', 'fitmascore' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title'  => esc_html__( 'QUALITY SERVICE', 'fitmascore' )
					],
					[
						'title'  => esc_html__( 'SKILLED MEMBERS ', 'fitmascore' )
					],
					[
						'title'  => esc_html__( 'HAPPY CUSTOMERS', 'fitmascore' )
					],
					[
						'title'  => esc_html__( 'PROJECT FAILS', 'fitmascore' )
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		
		
		$this->add_control(
			'container_full',
			[
				'label'        => esc_html__( 'Enable Full Container', 'fitmascore' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'fitmascore' ),
				'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);
		$this->add_control(
			'desktop_col',
			[
				'label'   => __( 'Columns On Desktop', 'fitmascore' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-xl-3',
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
				'default' => 'col-lg-3',
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

	// *********************************************************
	//                Box Style Css
	// *********************************************************

		$this->start_controls_section(
			'counter_box',
			[
				'label' => esc_html__( 'Box', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
   
		$this->add_control(
            'progress_bg_color',
            [
                'label' => esc_html__( 'Active Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );
		
		$this->add_control(
            'lines_color',
            [
                'label' => esc_html__( 'Line Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'box_bg',
				'label'    => esc_html__( 'Background', 'fitmascore' ),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .counter-card.style3',
                'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'box_border',
				'label'    => esc_html__( 'Border', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-card.style3',
			]
		);

		$this->add_responsive_control(
			'box_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .counter-card.style3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-card.style3',
			]
		);
		$this->add_responsive_control(
			'box_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .counter-card.style3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .counter-card.style3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		// ------------- Number Css --------

		$this->start_controls_section(
			'counter_number',
			[
				'label' => esc_html__( 'Number CSS', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'number_color',
			[
				'label'     => esc_html__( 'Number Color', 'fitmascore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-card.style3 .circle-num' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_title_typo',
				'label'    => esc_html__( 'Title Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-card.style3 .circle-num',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_symble_typo',
				'label'    => esc_html__( 'Symbol Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-card.style3 .circle-num',
			]
		);
		$this->add_responsive_control(
			'number_margin',
			[
				'label'      => esc_html__( 'Number Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [ '{{WRAPPER}} .counter-card.style3 .circle-num' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'number_padding',
			[
				'label'      => esc_html__( 'Number Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [ '{{WRAPPER}} .counter-card.style3 .circle-num' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		// ----------------- Title Style Css -----
		$this->start_controls_section(
			'counter_title',
			[
				'label' => esc_html__( 'Title CSS', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'fitmascore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-card.style3 .counter-card_text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__( 'Title Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .counter-card.style3 .counter-card_text',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Title Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .counter-card.style3 .counter-card_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Title Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .counter-card.style3 .counter-card_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
		if ( $settings['container_full'] == 'yes' ) {
			$container = 'container-fluid';
		} else {
			$container = 'container';
		}
		ob_start();
		?>
		<script>
			jQuery(document).ready(function($) {
              "use strict";
              function animateElements() {
				$('.counter-circle .progressbar').each(function () {
					var elementPos = $(this).offset().top;
					var topOfWindow = $(window).scrollTop();
					var percent = $(this).find('.circle').attr('data-percent');
					var percentage = parseInt(percent, 10) / parseInt(100, 10);
					var animate = $(this).data('animate');
					if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
						$(this).data('animate', true);
						$(this).find('.circle').circleProgress({
						startAngle: -Math.PI / 2,
						value: percent / 100,
						size: 135,
						thickness: 7,
						<?php 
							if( !empty( $settings['lines_color'] ) ){
								echo ' emptyFill:" '. $settings['lines_color'].' ", ';
							}else{
							 echo 'emptyFill: "#2C2C2C",';
							}
						?>
						fill: {
							<?php 
								if( !empty( $settings['progress_bg_color'] ) ){
									echo 'color:"'. $settings['progress_bg_color'] .'"';
								}else{
									echo "color: '#F41E1E'";
								}
							?>
						}
						}).on('circle-animation-progress', function (event, progress, stepValue) {
						$(this).find('.circle-num').text((stepValue*100).toFixed(0) + "%");
						}).stop();
					}
				});
			} 
				animateElements();
    $(window).scroll(animateElements);
            });
		</script>
    <div class="counter-area-3 ">
        <div class="<?php echo esc_attr( $container ); ?>">
            <div class="row gy-4">
			<?php foreach ( $settings['progressbar'] as $item ): ?>
                 <div class="<?php echo esc_attr( $column ); ?>">
                    <div class="counter-card style3">
                        <div class="media-body">
                            <div class="counter-circle">
                                <div class="progressbar">
                                    <div class="circle" data-percent="<?php echo esc_html($item['percent']['size']);?>">
                                        <div class="circle-num"><?php echo esc_html($item['percent']['size']);?>%</div>
                                    </div>
                                </div>
                            </div>  
							<?php if ( !empty( $item['title'] ) ): ?>
                            	<p class="counter-card_text"><?php echo esc_html( $item['title'] ); ?></p>
							<?php endif;?>
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
Plugin::instance()->widgets_manager->register( new fitmas_progressbar_widget );