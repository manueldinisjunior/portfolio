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
use Elementor\Utils;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class Rb_Brand extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-brand';
    }

    public function get_title()
    {
        return esc_html__('Brand', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'brand_layout',
            [
                'label' => esc_html__('Layout', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'style',
            [
                'label' => esc_html__('Style', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Carousel', 'rainbow-elements'),
                    '2' => esc_html__('Grid 1', 'rainbow-elements'),
                    '3' => esc_html__('Grid Skill', 'rainbow-elements'),
                    '4' => esc_html__('Grid 2', 'rainbow-elements'),
                    '5' => esc_html__('Grid 3', 'rainbow-elements'),
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'brand_content',
            [
                'label' => esc_html__('Brand', 'rainbow-elements'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'brand_image',
            [
                'label' => esc_html__('Brand Image', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'brand_title',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Rainbow-Themes', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'url',
            [
                'label' => esc_html__( 'Website Url', 'imroz' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'imroz' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );
 
        $this->add_control(
            'list_brand',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'brand_title' => esc_html__('Amy Smith', 'rainbow-elements'),
                        ['brand_image' => ['url' => Utils::get_placeholder_image_src()]],
                        

                    ],
                    [
                        'brand_title' => esc_html__('Amy Smith', 'rainbow-elements'),
                        ['brand_image' => ['url' => Utils::get_placeholder_image_src()]],

                    ],
                    [
                        'brand_title' => esc_html__('Amy Smith', 'rainbow-elements'),
                        ['brand_image' => ['url' => Utils::get_placeholder_image_src()]],

                    ],
                    [
                        'brand_title' => esc_html__('Amy Smith', 'rainbow-elements'),
                        ['brand_image' => ['url' => Utils::get_placeholder_image_src()]],

                    ],

                ],
                'title_field' => '{{{ brand_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __('Testimonial Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_style_on',
            [
                'label' => __('Customize', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );

        $this->add_control(
            'stitle_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => array('title_style_on' => array('yes')),
                'selectors' => array(
                    '{{WRAPPER}} .testimonial-style-one-content .thumb-content .title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-style-two-wrapper .thumb-content .item-title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'condition' => array('title_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .testimonial-style-one-content .thumb-content .title, {{WRAPPER}} .testimonial-style-two-wrapper .thumb-content .item-title',
            ]
        );

        $this->add_responsive_control(
            'stitle_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('title_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .testimonial-style-one-content .thumb-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .testimonial-style-two-wrapper .thumb-content .item-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',

                ],
            ]
        );
        $this->end_controls_section();

    }

    private function slick_load_scripts()
    {
        wp_enqueue_style('slick');
        wp_enqueue_style('slick-theme');
        wp_enqueue_script('slick-min');
    }

    protected function render()
    {
        $settings = $this->get_settings();

        if ($settings['style'] == "1") {
            $this->slick_load_scripts();
            $template = 'brand-1';
        } elseif ($settings['style'] == "2") {
            $template = 'brand-2';
        } elseif ($settings['style'] == "4") {
            $template = 'brand-4';
        } elseif ($settings['style'] == "5") {
            $template = 'brand-5';
        } else {
            $template = 'brand-3';
        }
        return rainbow_Elements_Helper::rainbow_element_template($template, $settings);

    }

}
