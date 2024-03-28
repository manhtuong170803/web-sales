<?php namespace Elementor;

class fitmas_training_schedule_widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_training_schedule';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Training Schedule', 'fitmascore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['fitmascore'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'table_header',
            [
                'label' => esc_html__( 'Header Section', 'fitmascore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'thead_text',
            [
                'label' => esc_html__( 'Column Name', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Sun Day', 'fitmascore' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'thead_span',
            [
                'label' => esc_html__( 'Column Span', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 50,
                'step' => 1,
            ]
        );
        $repeater->add_control(
            'thead_class',
            [
                'label' => esc_html__( 'CSS Class', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'thead_id',
            [
                'label' => esc_html__( 'CSS ID', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );


        $this->add_control(
            'theads',
            [
                'label'   => esc_html__( 'Table Header', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'title_field' => '{{ thead_text}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'table_body',
            [
                'label' => esc_html__( 'Table Body', 'fitmascore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'row_type',
            [
                'label' => esc_html__( 'Row Type', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'row',
                'options' => [
                    'row' => esc_html__( 'Row', 'fitmascore' ),
                    'col' => esc_html__( 'Column', 'fitmascore' ),
                ],
                
            ]
        );
        $repeater2->add_control(
            'col_span',
            [
                'label' => esc_html__( 'Col Span', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'condition' => [
                    'row_type' => 'col',
                ],
                
            ]
        );
        $repeater2->add_control(
            'row_span',
            [
                'label' => esc_html__( 'Row Span', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'condition' => [
                    'row_type' => 'col',
                ],
            ]
        );

        $repeater2->add_control(
            'body_content',
            [
                'label' => esc_html__( 'Content', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'Content', 'fitmascore'),
                'condition' => [
                    'row_type' => 'col',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater2->add_control(
            'tbody_class',
            [
                'label' => esc_html__( 'CSS Class', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'row_type' => 'col',
                ],
            ]
        );
        $repeater2->add_control(
            'tbody_id',
            [
                'label' => esc_html__( 'CSS ID', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'row_type' => 'col',
                ],
            ]
        );

        $repeater2->add_control(
            'active_class',
            [
                'label' => esc_html__( 'Special Class', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'fitmascore' ),
                'label_off' => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'row_type' => 'col',
                ],
            ]
        );
        $this->add_control(
            'tbody_items',
            [
                'label'   => esc_html__( 'Table Content', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater2->get_controls(),
                'title_field' => '{{ row_type}}::{{ body_content }}',
            ]
        );
        
        $this->end_controls_section();
        $this->start_controls_section(
            'table_head_style',
            [
                'label' => esc_html__( 'Table head Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'table_head_text_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .schedule-table thead th  ',
			]
		);

		$this->add_responsive_control(
			'table_head_text_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .schedule-table thead th' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'table_head_bg',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .schedule-table thead th ',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'table_head_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .schedule-table thead th ',
            ]
        );
        $this->add_responsive_control(
            'table_head_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .schedule-table thead th ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_head_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .schedule-table thead th ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'table_body_css_options',
            [
                'label' => esc_html__( 'Table Body Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'table_body_text_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .schedule-table thead th  ',
			]
		);

		$this->add_responsive_control(
			'table_body_text_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .schedule-table thead th' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'table_body_bg',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .schedule-table tbody tr td',
            ]
        );
        $this->add_control(
			'active_style_options',
			[
				'label' => esc_html__( 'Active Style ', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
  
        $this->add_responsive_control(
			'table_body_active_text_color',
			[
				'label'       => esc_html__('Active Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .schedule-table tbody tr td.active strong' => 'color: {{VALUE}};',
					'{{WRAPPER}} .schedule-table tbody tr td.active span' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'table_body_active_bg',
                'label'    => esc_html__( 'Active Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .schedule-table tbody tr td.active',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'table_body_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .schedule-table tbody tr td',
            ]
        );
        $this->add_responsive_control(
            'table_body_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .schedule-table tbody tr td' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'table_body_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .schedule-table tbody tr td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        


    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        ob_start();

        $table_tr = [];
		$table_td = [];

        foreach( $settings['tbody_items'] as $table_row ){
            $row_id = uniqid();
            if( $table_row['row_type'] == 'row' ){
                $table_tr[] = [
                    'id' => $row_id,
                    'type' => $table_row['row_type'],
                ];
            }

            if( $table_row['row_type'] == 'col' ){
                $table_tr_keys = array_keys( $table_tr );
                $last_key = end( $table_tr_keys );
                $table_td[] = [
                    'row_id'		=> !empty( $table_tr[$last_key]['id'] ) ? $table_tr[$last_key]['id'] : $row_id,
                    'type'			=> $table_row['row_type'],
                    'title'			=> $table_row['body_content'],
                    'colspan'		=> $table_row['col_span'],
                    'rowspan'		=> $table_row['row_span'],
                    'tr_class'		=> $table_row['tbody_class'] . $table_row['active_class'] == 'yes' ? 'active' : '',
                    'tr_id'			=> $table_row['tbody_id'],
                ];
            }
        }
        $allowed_html = array(
			'h1'   => array(),
			'h2'   => array(),
			'h3'   => array(),
			'h4'   => array(),
			'h5'   => array(),
			'h6'   => array(),
			'span' => array( 'style' => array(), ),
			'strong' => array( 'style' => array(), ),
			'em' => array( 'style' => array(), ),
		);
        ?>
        <div class="schedule-area-1 schefule-one">
            <div class="container container2">
                <div class="row">
                    <div class="col-12">
                        <div class="schedule-tab-1">
                            <div class="filter-active-cat1">
                                <div class="filter-item cat1">
                                    <div class="table-responsive">
                                        <table class="schedule-table table">

                                            <?php if( $settings['theads'] ) : ?>
                                                <thead>
                                                    <tr>
                                                        <?php  foreach( $settings['theads'] as $thead ) : ?>
                                                        <th scope="col"><?php echo esc_html( $thead['thead_text'] ); ?></th>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                </thead>
                                            <?php endif; ?>
                                            
                                            <tbody>
                                                <?php for( $i = 0; $i < count( $table_tr ); $i++ ) : ?>
                                                    <tr>
                                                        <?php 
                                                        
                                                        for( $j = 0; $j < count( $table_td ); $j++ ) {
                                                            if( $table_tr[$i]['id'] == $table_td[$j]['row_id'] ) {
                                                                $this->add_render_attribute('table_attrube_td'.$i.$j,
                                                                    [
                                                                        'colspan' => $table_td[$j]['colspan'] > 1 ? $table_td[$j]['colspan'] : '',
                                                                        'rowspan' => $table_td[$j]['rowspan'] > 1 ? $table_td[$j]['rowspan'] : '',
                                                                        'class'		=> $table_td[$j]['tr_class'],
                                                                        'id'		=> $table_td[$j]['tr_id']
                                                                    ]
                                                                );
                                                                ?>
                                                                    <td <?php echo $this->get_render_attribute_string('table_attrube_td'.$i.$j); ?>>
                                                                        <?php echo wp_kses($table_td[$j]['title'], $allowed_html); ?>
											                        </td>
                                                                <?php 
                                                            }
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php endfor; ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
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
Plugin::instance()->widgets_manager->register( new fitmas_training_schedule_widget );