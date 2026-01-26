<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class rainbow_divider extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-divider';
    }

    public function get_title()
    {
        return __('Inbio Divider', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-divider';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'divider_section',
            [
                'label' => __('Divider', 'rainbow-elements'),
            ]
        );


        $this->add_responsive_control(
            'width',
            [
                'label' => esc_html__('Width', 'rainbow-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range' => [
                    'px' => [
                        'max' => 1000,
                    ],
                ],
                'default' => [
                    'size' => 100,
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .divider-separator' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'rainbow-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'rainbow-elements'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'rainbow-elements'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'rainbow-elements'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rb-separator' => 'text-align: {{VALUE}}',

                ],
            ]
        );

        $this->add_responsive_control(
            'gap',
            [
                'label' => esc_html__('Gap', 'rainbow-elements'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rb-separator' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );


        $this->add_responsive_control(
            'dheight',
            [
                'label' => esc_html__('Height', 'rainbow-elements'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .divider-separator' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings();
        ?>
        <div class="rb-separator">
            <div class="divider-separator">

            </div>
        </div>

        <?php
    }
}
