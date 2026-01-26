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

class inbio_Banner_Slider extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-banner-slider';
    }

    public function get_title()
    {
        return __('Banner Slider', 'rainbow-elements');
    }

    public function get_icon()
    {
        return ' eicon-banner';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'tvbanner_content_sec',
            [
                'label' => __('Layout / Banner Content', 'rainbow-elements'),

            ]
        );
        $this->add_control(
            'tvstyle',
            [
                'label' => __('Layout', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1' => __('Style 1', 'rainbow-elements'),
                    '2' => __('Style 2', 'rainbow-elements'),
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => __('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('List Title', 'rainbow-elements'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_content',
            [
                'label' => __('Content or Subtitle', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('List Content', 'rainbow-elements'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __('Replace Product Image', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );

        $repeater->add_control(
            'list_btntext',
            [
                'label' => __('Button Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Shop Collection', 'rainbow-elements'),
            ]
        );

        $repeater->add_control(
            'list_url',
            [
                'label' => __('Button Link', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',

            ]
        );


        $this->add_control(
            'list',
            [
                'label' => __('Slider List', 'rainbow-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __('Shop Your 1st <br> New Year’s Fave', 'rainbow-elements'),
                        'list_content' => __('- Try Newest', 'rainbow-elements'),
                    ],
                    [
                        'list_title' => __('Shop Your 1st <br> New Year’s Fave', 'rainbow-elements'),
                        'list_content' => __('- Try Newest', 'rainbow-elements'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => __('Sub Title or Title Before', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_style_on',
            [
                'label' => __('Customize', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );


        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => array('subtitle_style_on' => array('yes')),
                'selectors' => array(
                    '{{WRAPPER}} .inner .titlehighlighter' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'condition' => array('subtitle_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .inner .titlehighlighter',
            ]
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('subtitle_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .inner .titlehighlighter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',

                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Title', 'rainbow-elements'),
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
            'title_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => array('title_style_on' => array('yes')),
                'selectors' => array(
                    '{{WRAPPER}} .inner .title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'condition' => array('title_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .inner .title',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('title_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',

                ],
            ]
        );

        $this->end_controls_section();

    }

    private function slick_load_scripts()
    {
        wp_enqueue_style('slick');
        wp_enqueue_style('slick-theme');
        wp_enqueue_script('slick');
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $this->slick_load_scripts();

        $template = 'banner-slider-' . str_replace("style", "", $settings['tvstyle']);
        return rainbow_Elements_Helper::rainbow_element_template($template, $settings);
    }

}