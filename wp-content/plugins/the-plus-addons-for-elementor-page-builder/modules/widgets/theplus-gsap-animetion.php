<?php
/**
 * The file that defines the widget plugin.
 *
 * @link       https://posimyth.com/
 * @since      1.0.0
 *
 * @package    ThePlus
 */

namespace TheplusAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Group_Control_Background;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

	$this->start_controls_section(
			'tpebl_image_gsap_section',
			[
				'label' => esc_html__('Image Animation', 'tpebl'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'enable_image_animation',
			[
				'label'        => esc_html__('Enable Animation', 'tpebl'),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'tpebl'),
				'label_off'    => esc_html__('No', 'tpebl'),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);
		$this->add_control(
			'image_animations',
			array(
				'label'     => esc_html__( 'Animation', 'tpebl' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'tp_basic',
				'options'   => array(
					'tp_basic'   => esc_html__( 'Basic', 'tpebl' ),
					'tp_global'  => esc_html__( 'Global', 'tpebl' ),
				),
				'condition' => array(
					'enable_image_animation' => 'yes',
				),
			)
		);

		$theplus_options  = get_option( 'theplus_options' );
		$extras_elements  = ! empty( $theplus_options['extras_elements'] ) ? $theplus_options['extras_elements'] : array();

		$image_global_enabled = in_array( 'plus_image_global_animation', $extras_elements );

		$global_animations = [];
		$global_options    = [];

		$global_options = ['' => esc_html__( 'Select Animation', 'tpebl' )] + $global_options;


		if ( $image_global_enabled && class_exists( '\ThePlusAddons\Elementor\Image\TP_GSAP_Image_Global' ) ) {
			$global_animations = \ThePlusAddons\Elementor\Image\TP_GSAP_Image_Global::get_image_global_gsap_list();

			if ( ! empty( $global_animations ) ) {
				foreach ( $global_animations as $animation ) {
					$id                    = $animation['_id'] ?? '';
					$name                  = $animation['name'] ?? 'Unnamed';
					$global_options[$id]   = $name;
				}
			}
		}

		if ( $image_global_enabled ) {
			$this->add_control(
				'tp_select_image_global_animation',
				[
					'label'     => esc_html__( 'Global Animation', 'tpebl' ),
					'type'      => \Elementor\Controls_Manager::SELECT,
					'options'   => $global_options,
					'default'   => '',
					'condition' => [
						'image_animations' => 'tp_global',
						'enable_image_animation' => 'yes',
					],
				]
			);

		} else {
			$this->add_control(
				'tp_image_global_animation_notice',
				[
					'type'  => Controls_Manager::RAW_HTML,
					'raw'   => wp_kses_post(
						sprintf(
							'<p class="tp-controller-label-text">
								<i>
									%s<br>
									<a href="%s" target="_blank" rel="noopener noreferrer">%s</a>
								</i>
							</p>',
							esc_html__( 'Text Global Animation is disabled. Please enable it from Dashboard → Extensions.', 'tpebl' ),
							esc_url( admin_url( 'admin.php?page=theplus_welcome_page#/extension' ) ),
							esc_html__( 'Click here to enable', 'tpebl' )
						)
					),
					'label_block' => true,
					'condition'   => [
						'image_animations' => 'tp_global',
					],
				]
			);
		}


		$this->add_control(
			'image_trigger',
			[
				'label'   => esc_html__('Trigger Type', 'tpebl'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'onload',
				'options' => [
					'onload'   => esc_html__('On Load', 'tpebl'),
					'onscroll' => esc_html__('On Scroll', 'tpebl'),
					'onhover'  => esc_html__('On Hover', 'tpebl'),
				],
				'condition' => [ 
					'enable_image_animation' => 'yes',
					'image_animations' => 'tp_basic',
				],
			]
		);
		$this->add_control(
			'tp_scrub',
			[
				'label' => __('Enable Scroll Scrub', 'tpebl'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'tpebl'),
				'label_off' => __('No', 'tpebl'),
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => array( 
					'image_trigger' => 'onscroll',
					'image_animations' => 'tp_basic',
				),
			]
		);
		$this->add_control(
			'tp_scrub_label',
			array(
				'type'        => Controls_Manager::RAW_HTML,
				'raw'         => wp_kses_post(
					sprintf(
						'<p class="tp-controller-label-text"> %s </p>',
						esc_html__( 'Animation follows your scrolling', 'tpebl' ),
					)
				),
				'label_block' => true,
				'condition' => array( 
					'image_trigger' => 'onscroll',
					'image_animations' => 'tp_basic',
				),
			)
		);
		$this->add_control(
			'image_transform_toggle',
			[
				'label'        => esc_html__('Transform Effects', 'tpebl'),
				'type'         => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => esc_html__('Default'),
				'label_on'     => esc_html__('Custom'),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [ 
					'enable_image_animation' => 'yes',
					'image_animations' => 'tp_basic', 
				],
			]
		);

		$this->start_popover();
		$this->add_control(
			'img_x',
			[
				'label' => esc_html__('X Offset', 'tpebl'),
				'type'  => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => -500, 'max' => 500 ] ],
				'default' => [ 'size' => 0 ],
			]
		);
		$this->add_control(
			'img_y',
			[
				'label' => esc_html__('Y Offset', 'tpebl'),
				'type'  => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => -500, 'max' => 500 ] ],
				'default' => [ 'size' => 0 ],
			]
		);
		$this->add_control(
			'img_skewx',
			[
				'label' => esc_html__('Skew X', 'tpebl'),
				'type'  => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => -180, 'max' => 180 ] ],
				'default' => [ 'size' => 0 ],
			]
		);
		$this->add_control(
			'img_skewy',
			[
				'label' => esc_html__('Skew Y', 'tpebl'),
				'type'  => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => -180, 'max' => 180 ] ],
				'default' => [ 'size' => 0 ],
			]
		);
		$this->add_control(
			'img_scale',
			[
				'label' => esc_html__('Scale', 'tpebl'),
				'type'  => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => 0.1, 'max' => 3, 'step' => 0.01 ] ],
				'default' => [ 'size' => 1 ],
			]
		);
		$this->add_control(
			'img_rotation',
			[
				'label' => esc_html__('Rotation', 'tpebl'),
				'type'  => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => -360, 'max' => 360 ] ],
				'default' => [ 'size' => 0 ],
			]
		);
		$this->add_control(
			'img_opacity',
			[
				'label' => esc_html__('Opacity', 'tpebl'),
				'type'  => \Elementor\Controls_Manager::SLIDER,
				'range' => [ 'px' => [ 'min' => 0, 'max' => 1, 'step' => 0.01 ] ],
				'default' => [ 'size' => 1 ],
			]
		);
		$this->add_control(
			'img_origin',
			[
				'label' => esc_html__('Transform Origin', 'tpebl'),
				'type'  => \Elementor\Controls_Manager::SELECT,
				'default' => '50% 50%',
				'options' => [
					'50% 50%' => 'Center',
					'0% 0%' => 'Top Left',
					'100% 0%' => 'Top Right',
					'0% 100%' => 'Bottom Left',
					'100% 100%' => 'Bottom Right',
				],
			]
		);
		$this->add_control(
			'tp_clip_path_type',
			[
				'label'   => esc_html__( 'Clip Path', 'tpebl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''                => 'None',
					'circle_center'   => 'Circle — Center',
					'circle_left'     => 'Circle — Left',
					'circle_right'    => 'Circle — Right',
					'ellipse_center'  => 'Ellipse — Center',
					'ellipse_horizontal'=> 'Ellipse — Horizontal',
					'inset_top'       => 'Inset — Top Reveal',
					'inset_bottom'    => 'Inset — Bottom Reveal',
					'inset_left'      => 'Inset — Left Reveal',
					'inset_right'     => 'Inset — Right Reveal',
					'poly_triangle'   => 'Triangle',
					'poly_diamond'    => 'Diamond',
					'poly_hexagon'    => 'Hexagon',
					'poly_diag_left'  => 'Diagonal Left',
					'poly_diag_right' => 'Diagonal Right',
					'blob_organic'     => 'Organic Blob',
					'blob_irregular'   => 'Irregular Blob',
					'star'             => 'Star',
					'skew_right'       => 'Skew Right',
					'skew_left'        => 'Skew Left',
					'wave_top'         => 'Wave Top',
					'wave_bottom'      => 'Wave Bottom',
					'diagonal_cut_double' => 'Double Diagonal',
					'corner_round'     => 'Rounded Corners',
					'custom'          => 'Custom Clip Path',
				]
			]
		);
		$this->add_control(
			'tp_custom_clip_path_value',
			[
				'label'       => esc_html__( 'Custom Clip Path Value', 'tpebl' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'polygon(50% 0%, 0% 100%, 100% 100%)',
				'description' => 'Enter any valid CSS clip-path value',
				'condition'   => [
					'tp_clip_path_type' => 'custom',
				],
				'ai'      => false,
			]
		);
		$this->add_control(
			'tp_custom_clip_path_info',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw'  => wp_kses_post(
					sprintf(
						'<p class="tp-controller-label-text"><i>%s 
							<a href="%s" target="_blank" rel="noopener noreferrer">%s</a>
						</i></p>',
						esc_html__( 'If you want to create more custom clip-path shapes, you can generate them here:', 'tpebl' ),
						esc_url( 'https://bennettfeely.com/clippy/' ),
						esc_html__( 'Open Clip-Path Generator', 'tpebl' )
					)
				),
				'label_block' => true,
				'condition'   => [
					'tp_clip_path_type' => 'custom',
				],
			]
		);

		$this->end_popover();
		$this->add_control(
			'tp_animetions_controller',
			[
				'label'        => esc_html__('Animation Controls', 'tpebl'),
				'type'         => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => esc_html__('Default'),
				'label_on'     => esc_html__('Custom'),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [ 
					'enable_image_animation' => 'yes',
					'image_animations' => 'tp_basic', 
				],
			]
		);
		$this->start_popover();
		$this->add_control(
			'img_duration',
			[
				'label'   => esc_html__('Duration', 'tpebl'),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 1.2,
				'condition' => [ 
					'enable_image_animation' => 'yes',
					'image_animations' => 'tp_basic', 
				],
			]
		);
		$this->add_control(
			'img_duration_label',
			array(
				'type'        => Controls_Manager::RAW_HTML,
				'raw'         => wp_kses_post(
					sprintf(
						'<p class="tp-controller-label-text"> %s </p>',
						esc_html__( 'How long the animation runs', 'tpebl' ),
					)
				),
				'label_block' => true,
				'condition' => [ 
					'enable_image_animation' => 'yes',
					'image_animations' => 'tp_basic', 
				],
			)
		);
		$this->add_control(
			'img_delay',
			[
				'label'   => esc_html__('Delay', 'tpebl'),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 0.3,
				'condition' => [ 
					'enable_image_animation' => 'yes',
					'image_animations' => 'tp_basic', 
				 ],
			]
		);
		$this->add_control(
			'img_delay_label',
			array(
				'type'        => Controls_Manager::RAW_HTML,
				'raw'         => wp_kses_post(
					sprintf(
						'<p class="tp-controller-label-text"> %s </p>',
						esc_html__( 'Animation begins after this delay', 'tpebl' ),
					)
				),
				'label_block' => true,
				'condition' => [ 
					'enable_image_animation' => 'yes',
					'image_animations' => 'tp_basic', 
				 ],
			)
		);
		$this->end_popover();
		// $this->add_control(
		// 	'img_stagger',
		// 	[
		// 		'label' => esc_html__( 'Stagger', 'tpebl' ),
		// 		'type'  => \Elementor\Controls_Manager::NUMBER,
		// 		'min'   => 0.1,
		// 		'max'   => 10,
		// 		'step'  => 0.1,
		// 		'default' => 1.2,
		// 		'condition' => [ 
		// 			'enable_image_animation' => 'yes',
		// 			'image_animations' => 'tp_basic', 
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'img_stagger_label',
		// 	array(
		// 		'type'        => Controls_Manager::RAW_HTML,
		// 		'raw'         => wp_kses_post(
		// 			sprintf(
		// 				'<p class="tp-controller-label-text"> %s </p>',
		// 				esc_html__( 'Play animation in sequence', 'tpebl' ),
		// 			)
		// 		),
		// 		'label_block' => true,
		// 		'condition' => [ 
		// 			'enable_image_animation' => 'yes',
		// 			'image_animations' => 'tp_basic', 
		// 		],
		// 	)
		// );
		$this->add_control(
			'img_ease',
			[
				'label'   => esc_html__('Animation Effects', 'tpebl'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'power3.out',
				'options' => [
					'power1.out'          => 'Power1',
					'power2.out'          => 'Power2',
					'power3.out'          => 'Power3',
					'elastic.out'         => 'Elastic',
					'back.out'            => 'Back',
					'bounce.out'          => 'Bounce',
					'none'                => 'Linear',
				],
				'condition' => [ 
					'enable_image_animation' => 'yes',
					'image_animations' => 'tp_basic',  
				],
			]
		);
		$this->add_control(
			'tp_play_image_animation',
			[
				'label' => __( 'Play Animation', 'tpebl' ),
				'type'  => Controls_Manager::BUTTON,
				'text'  => __( 'Preview Animation', 'tpebl' ),
				'event' => 'tp:play_gsap_animation',
				'classes' => 'tp-preview-animation-button',
				'condition'          => array(
					'enable_image_animation' => 'yes',
					'image_animations' => array( 'tp_basic' ),
				),
			]
		);
		$this->add_control(
			'tp_play_image_animation_label',
			array(
				'type'        => Controls_Manager::RAW_HTML,
				'raw'         => wp_kses_post(
					sprintf(
						'<p class="tp-controller-label-text"> %s </p>',
						esc_html__( 'For the best visual experience, preview this animation on the frontend.', 'tpebl' ),
					)
				),
				'label_block' => true,
				'condition'          => array(
					'enable_image_animation' => 'yes',
					'image_animations' => array( 'tp_basic' ),
				),
			)
		);
		$this->end_controls_section();