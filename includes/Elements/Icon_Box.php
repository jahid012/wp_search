<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

use Elementor\core\Schemes;
use Elementor\Core\Schemes\Typography;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

class Ajax_Search__Icon_Box extends Widget_Base {

    public function get_name() {
        return 'eg_icon_box';
    }

    public function get_title() {
        return esc_html__( 'Icon Box', 'eg-addons' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'eg-addons-elementor' ];
    }

    protected function _register_controls() {
        //Start Box Icon Section Control
	    $this->start_controls_section(
			'_section_icon',
			[
				'label' => __( 'Content', 'eg-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'selected_icon',
            [
                'show_label' => false,
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'label_block' => true,
                'default' => [
                    'value' => 'far fa-check-square',
                    'library' => 'fa-solid',
                ]
            ]
        );

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'eg-addons' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'EG Icon Box', 'eg-addons' ),
				'placeholder' => __( 'Type Icon Box Title', 'eg-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Box Link', 'eg-addons' ),
				'separator' => 'before',
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://example.com',
				'dynamic' => [
					'active' => true,
				]
			]
		);


		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'eg-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'eg-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'eg-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'eg-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justify', 'eg-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'toggle' => true,
				'default' => 'center',
				'selectors' => [
                    '{{WRAPPER}}  .ega-iconbox ' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

     //End Box Icon Section Control

    //Start Style Box Layout
	$this->start_controls_section(
		'_section_box_layout_style',
		[
			'label' => __( 'Box Layout', 'eg-addons' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		]
	);

	$this->add_responsive_control(
		'box_padding',
		[
			'label' => __( 'Padding', 'eg-addons' ),
			'type' =>  Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .ega-iconbox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_group_control(
		Group_Control_Border::get_type(),
		[
			'name' => 'box_border',
			'selector' => '{{WRAPPER}} .ega-iconbox',
		]
	);

	$this->add_responsive_control(
		'box_border_radius',
		[
			'label' => __( 'Border Radius', 'eg-addons' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .ega-iconbox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'box_shadow',
			'selector' => '{{WRAPPER}} .ega-iconbox',
		]
	);

    $this->add_group_control(
         Group_Control_Background::get_type(),
        [
            'name' => 'background',
            'label' => __( 'Background', 'eg-addons' ),
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .ega-iconbox',
        ]
    );

	$this->end_controls_section();
	//End Style Box Layout

     //Start Icon style Control
     
		$this->start_controls_section(
			'_section_style_icon',
			[
				'label' => __( 'Icon', 'eg-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'eg-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ega-iconbox-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'eg-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .ega-iconbox-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_spacing',
			[
				'label' => __( 'Bottom Spacing', 'eg-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'max' => 150,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .ega-iconbox-icon ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .ega-iconbox-icon '
			]
		);

		$this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => __( 'Border Radius', 'eg-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ega-iconbox-icon ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .ega-iconbox-icon'
			]
		);

		$this->start_controls_tabs( '_tabs_icon' );

		$this->start_controls_tab(
			'_tab_icon_normal',
			[
				'label' => __( 'Normal', 'eg-addons' ),
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'eg-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ega-iconbox-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ega-iconbox-icon svg path' => 'fill: {{VALUE}};',
		
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Background Color', 'eg-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ega-iconbox-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_bg_rotate',
			[
				'label' => __( 'Rotate Icon Box', 'eg-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default' => [
					'unit' => 'deg',
				],
				'range' => [
					'deg' => [
						'min' => 0,
						'max' => 360,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ega-iconbox-icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .ega-iconbox-icon > i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .ega-iconbox-icon > svg' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'icon_bg_color!' => '',
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'_tab_button_hover',
			[
				'label' => __( 'Hover', 'eg-addons' ),
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => __( 'Color', 'eg-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .ega-iconbox-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}}:hover .ega-iconbox-icon svg path' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' => __( 'Background Color', 'eg-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .ega-iconbox-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_hover_border_color',
			[
				'label' => __( 'Border Color', 'eg-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .ega-iconbox-icon' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'icon_border_border!' => '',
				]
			]
		);

		$this->add_control(
			'icon_hover_bg_rotate',
			[
				'label' => __( 'Rotate Icon Box', 'eg-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default' => [
					'unit' => 'deg',
				],
				'range' => [
					'deg' => [
						'min' => 0,
						'max' => 360,
					],
				],
				'selectors' => [
					'{{WRAPPER}}:hover .ega-iconbox-icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
					'{{WRAPPER}}:hover .ega-iconbox-icon > i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
					'{{WRAPPER}}:hover .ega-iconbox-icon > svg' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'icon_bg_color!' => '',
				]
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
     //End Icon Style Control

     //Start Style Title  Control
     
		$this->start_controls_section(
			'_section_style_title',
			[
				'label' => __( 'Title', 'eg-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title',
				'selector' => '{{WRAPPER}} .ega-iconbox-title',
				'scheme' => Typography::TYPOGRAPHY_2
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title',
				'selector' => '{{WRAPPER}} .ega-iconbox-title',
			]
		);

		$this->start_controls_tabs( '_tabs_title' );

		$this->start_controls_tab(
			'_tab_title_normal',
			[
				'label' => __( 'Normal', 'eg-addons' ),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'eg-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ega-iconbox-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'_tab_title_hover',
			[
				'label' => __( 'Hover', 'eg-addons' ),
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label' => __( 'Text Color', 'eg-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .ega-iconbox-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
     //End Style Title  Control

    }
    protected function render() {

        $settings = $this->get_settings_for_display();

         $iconbox_title = esc_html( $settings['title'] );
         $iconbox_url   = esc_url( $settings['link']['url'] );
         $inconbox_icon  =  $settings['selected_icon'] ;

        ?>
    <div class="iconbox-design-one-wrapper">
        <div class="container">
            <div class="row">
                <!-- icon box card start-->
                <div class="ega-iconbox">
                    <div class="ega-iconbox-icon">
                         <?php
								Icons_Manager::render_icon($inconbox_icon, [ 'aria-hidden' => 'true' ] );
							?>
                    </div>
                    <div class="ega-iconbox-content">
                        <a href="<?php echo   $iconbox_url;?>">
                            <h3 class="ega-iconbox-title"><?php echo $iconbox_title; ?></h3>
                        </a>
                    </div>
                </div>
                <!-- icon box card end-->
            </div>
        </div>
    </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Ajax_Search__Icon_Box() );
