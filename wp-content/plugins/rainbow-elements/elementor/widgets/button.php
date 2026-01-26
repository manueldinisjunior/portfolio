<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;

use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class Rb_Button extends Widget_Base
{

    public function get_name()
    {
        return 'rb-button';
    }

    public function get_title()
    {
        return esc_html__('Button', 'rainbow-elements');
        
    }

    public function get_icon()
    {
        return 'eicon-button';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'button_area',
            [
                'label' => __('Button', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'btn_type',
            [
                'label' => __('Type', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'rn-single',
                'options' => [
                    'rn-single' => __('Single Button', 'rainbow-elements'),
                    'rn-group' => __('Button Group', 'rainbow-elements'),


                ],
            ]
        );


        $this->add_control(
            'btn_style',
            [
                'label' => __('Style', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'condition' => array('btn_type' => array('rn-single')),
                'default' => 'rn-btn border-button',
                'options' => [
                    'rn-btn' => __('Default  Button', 'rainbow-elements'),
                    'rn-btn-ulderline' => __('Ulderline Button', 'rainbow-elements'),
                    'rn-btn border-button' => __('Border Button', 'rainbow-elements'),

                ],
            ]
        );

        $this->add_control(
            'btn_size',
            [
                'label' => __('Button Size', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'btn-medium',
                'options' => [
                    'btn-large' => esc_html__('Large', 'rainbow-elements'),
                    'btn-medium' => esc_html__('Medium', 'rainbow-elements'),
                    'btn-small' => esc_html__('Small', 'rainbow-elements'),
                ],
            ]
        );


        $this->add_control(
            'br_border_radius',
            [
                'label' => __('Border radius', 'rainbow-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .button-group .rbbtn' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .button-group .rbbtn::before, .button-group .rbbtn::before' => 'border-radius: {{SIZE}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'title_align',
            [
                'label' => __('Text Alignment', 'rainbow-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'rainbow-elements'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'rainbow-elements'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'rainbow-elements'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],

                'default' => 'center',
            ]
        );


        $this->add_control(
            'active_shadow',
            [
                'label' => __('Active Shadow', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_single',
            [
                'label' => __('Single Button', 'rainbow-elements'),
                'condition' => array('btn_type' => array('rn-single')),

            ]
        );

        $this->add_control(
            'active_icon',
            [
                'label' => __('Active Icon', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );

        $this->add_control(
            'buttontext',
            [
                'label' => __('Button Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'LOREM IPSUM',
            ]
        );
        $this->add_control(
            'buttonurl',
            [
                'label' => __('Button URL', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'button_group',
            [
                'label' => __('Button Group', 'rainbow-elements'),

                'condition' => array('btn_type' => array('rn-group')),

            ]
        );


        $repeater = new Repeater();

        $repeater->add_control(
            'btn_title',
            [
                'label' => esc_html__('Group Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Group Title', 'rainbow-elements'),
            ]
        );


        $repeater->add_control(
            'gbtn_style',
            [
                'label' => __('Style', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'rn-btn border-button',
                'options' => [
                    'rn-btn' => __('Default Button', 'rainbow-elements'),
                    'rn-btn-ulderline' => __('Ulderline Button', 'rainbow-elements'),
                    'rn-btn border-button' => __('Border Button', 'rainbow-elements'),

                ],
            ]
        );

        $repeater->add_control(
            'active_icon',
            [
                'label' => __('Active Icon', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );

        $repeater->add_control(
            'buttontext',
            [
                'label' => __('Button Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'LOREM IPSUM',
            ]
        );
        $repeater->add_control(
            'buttonurl',
            [
                'label' => __('Button URL', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
            ]
        );

        $this->add_control(
            'button_list',
            [
                'label' => esc_html__('option List', 'rainbow-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

                'default' => [

                    [
                        'btn_title' => esc_html__('LOREM IPSUM', 'rainbow-elements'),
                    ],
                    [
                        'btn_title' => esc_html__('LOREM IPSUM', 'rainbow-elements'),
                    ],
                ],
                'title_field' => '{{{ btn_title }}}',
            ]
        );

        $this->end_controls_section();


        // Style Title tab section
        $this->start_controls_section(
            'br_style_section',
            [
                'label' => __('Button Style', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Button Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .button-group a.rn-btn, {{WRAPPER}} .button-group  button.rn-btn',
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,

                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .button-group a.rn-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .button-group  button.rn-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .button-group a.rn-btn.border-button' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => __(' Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .button-group a.rn-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,

                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .btn.button-group a.rn-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',


                ],
            ]
        );
    }

    protected function render()
    {

        $settings = $this->get_settings();

        if ($settings['btn_type'] == "rn-single") {

            $btn = $attr = $has_icon_button = $has_icon_button = '';
            if (!empty($settings['buttonurl']['url'])) {
                $attr = 'href="' . $settings['buttonurl']['url'] . '"';
                $attr .= !empty($settings['buttonurl']['is_external']) ? ' target="_blank"' : '';
                $attr .= !empty($settings['buttonurl']['nofollow']) ? ' rel="nofollow"' : '';
            }

            if ($settings['active_icon'] == 'yes') {
                $has_icon_button = ' <i class="feather-loader"></i>';
            }

            if ($settings['active_shadow'] == 'yes') {
                $has_active_shadow = ' shadow-has';
            } else {
                $has_active_shadow = ' shadow-none';
            }

            if (!empty($settings['buttontext'])) {
                $btn = '<a class="' . $settings['btn_style'] . ' rbbtn ' . $settings['btn_type'] . ' ' . $settings['btn_size'] . ' ' . $has_active_shadow . '" ' . $attr . '> ' . $settings['buttontext'] . $has_icon_button . '</a>';
            }
            ?>

            <div class="button-group text-<?php echo wp_kses_post($settings['title_align']); ?>">
                <?php echo wp_kses_post($btn); ?>
            </div>

            <?php
        } else {
            $btn = $attr = $has_icon_button = $has_icon_button = '';
            ?>
            <div class="button-group text-<?php echo wp_kses_post($settings['title_align']); ?>">
                <?php
                foreach ($settings['button_list'] as $button_list):

                    if ($button_list['active_icon'] == 'yes') {
                        $has_icon_button = ' <i class="feather-loader"></i>';
                    }
                    if ($settings['active_shadow'] == 'yes') {
                        $has_active_shadow = ' shadow-has';
                    } else {
                        $has_active_shadow = ' shadow-none';
                    }


                    if (!empty($button_list['buttonurl']['url'])) {
                        $attr = 'href="' . $button_list['buttonurl']['url'] . '"';
                        $attr .= !empty($button_list['buttonurl']['is_external']) ? ' target="_blank"' : '';
                        $attr .= !empty($button_list['buttonurl']['nofollow']) ? ' rel="nofollow"' : '';
                    }


                    if (!empty($button_list['buttontext'])) {
                        $btn = '<a class="' . $button_list['gbtn_style'] . ' rbbtn ' . $settings['btn_type'] . ' ' . $settings['btn_size'] . ' ' . $has_active_shadow . '" ' . $attr . '> ' . $button_list['buttontext'] . $has_icon_button . '</a>';
                    }
                    ?>
                    <?php echo wp_kses_post($btn); ?>


                <?php endforeach; ?>
            </div>

        <?php }

    }
}
