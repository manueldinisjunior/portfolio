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
class Rainbow_Testimonial_Carousel extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-testimonial';
    }

    public function get_title()
    {
        return esc_html__('Testimonial Carousel', 'rainbow-elements');
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
            'testimonial_layout',
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
                    '1' => esc_html__('Style One', 'rainbow-elements'),
                    '2' => esc_html__('Style Two', 'rainbow-elements'),
                    '3' => esc_html__('Style Three', 'rainbow-elements'),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Type your title here...', 'rainbow-elements'),
                'default' => esc_html__('Testimonial', 'rainbow-elements'),
                'condition' => [
                    'style' => '3',
                ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'testimonial_content',
            [
                'label' => esc_html__('Testimonial List', 'rainbow-elements'),
                'condition' => [
                    'style' => '1',
                ],
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'testimonial_image',
            [
                'label' => esc_html__('Testimonial Image', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'titlebefore',
            [
                'label' => esc_html__('Before Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Rainbow-Themes', 'rainbow-elements'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Rainbow-Themes', 'rainbow-elements'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'designation',
            [
                'label' => esc_html__('Designation', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Chief Operating Officer', 'rainbow-elements'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'subject_title',
            [
                'label' => esc_html__('Subject Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Android App Development', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'subject_date',
            [
                'label' => esc_html__('Subject Date', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('via Upwork - Mar 4, 2015 - Aug 30, 2021', 'rainbow-elements'),
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Very good Design. Flexible. Fast Support.', 'rainbow-elements'),
            ]
        );


        $repeater->add_control(
            'show_rating',
            [
                'label' => __('Show Rating', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'return_value' => 'yes',
                'description' => esc_html__('Enable or disable Show Rating. Default: On', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'rating',
            [
                'label' => __('Rating', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('1 Star', 'kctheme'),
                    '2' => __('2 Stars', 'kctheme'),
                    '3' => __('3 Stars', 'kctheme'),
                    '4' => __('4 Stars', 'kctheme'),
                    '5' => __('5 Stars', 'kctheme'),
                ],
                'condition' => [
                    'show_rating' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'list_testimonial',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'title' => esc_html__('Amy Smith', 'rainbow-elements'),
                        'content' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],
                    [
                        'title' => esc_html__('Amy Smith', 'rainbow-elements'),
                        'content' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],
                    [
                        'title' => esc_html__('Amy Smith', 'rainbow-elements'),
                        'content' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],
                    [
                        'title' => esc_html__('Amy Smith', 'rainbow-elements'),
                        'content' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'testimonial_content2',
            [
                'label' => esc_html__('Testimonial', 'rainbow-elements'),
                'condition' => [
                    'style' => '2',
                ],

                'condition' => array('style' => array('2', '3')),
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'testimonial_image2',
            [
                'label' => esc_html__('Testimonial Image', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->add_control(
            'title2',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('@alamin', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'designation2',
            [
                'label' => esc_html__('Designation', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__(' Engineer', 'rainbow-elements'),
            ]
        );


        $repeater->add_control(
            'content2',
            [
                'label' => esc_html__('Content', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Very good Design. Flexible. Fast Support.', 'rainbow-elements'),
            ]
        );


        $this->add_control(
            'list_testimonial2',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'title2' => esc_html__('Amy Smith', 'rainbow-elements'),
                        'content2' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],
                    [
                        'title2' => esc_html__('Amy Smith', 'rainbow-elements'),
                        'content2' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],
                    [
                        'title2' => esc_html__('Amy Smith', 'rainbow-elements'),
                        'content2' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],
                    [
                        'title2' => esc_html__('Amy Smith', 'rainbow-elements'),
                        'content2' => 'This is the best website I have ordered something from. I highly recommend.',
                    ],

                ],
                'title_field' => '{{{ title2 }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'title_before_style_section',
            [
                'label' => __('Card Title Before', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => '1',
                ],
            ]
        );

        $this->add_control(
            'title_before_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .inner .card-info .card-content .subtitle' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_before_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .inner .card-info .card-content .subtitle',
            ]
        );

        $this->add_responsive_control(
            'title_before_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .card-info .card-content .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'title_before_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .card-info .card-content .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Card Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .inner .card-info .card-content .title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-inner .ts-header .text-color-primary' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .inner .card-info .card-content .title, {{WRAPPER}} .testimonial-inner .ts-header .text-color-primary',

            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .card-info .card-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-inner .ts-header .text-color-primary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .card-info .card-content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-inner .ts-header .text-color-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'card_subtitle_style_section',
            [
                'label' => __('Card Sub Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'card_subtitle_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}}  .inner .card-info .card-content .designation' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  .testimonial-style-2 .testimonial-inner .testimonial-header .ts-header' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_subtitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .inner .card-info .card-content .designation, {{WRAPPER}} .testimonial-style-2 .testimonial-inner .testimonial-header .ts-header',
            ]
        );

        $this->add_responsive_control(
            'card_subtitle_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .card-info .card-content .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-style-2 .testimonial-inner .testimonial-header .ts-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'card_subtitle_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .inner .card-info .card-content .designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-style-2 .testimonial-inner .testimonial-header .ts-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'subject_title_style_section',
            [
                'label' => __('Subject Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => '1',
                ],
            ]
        );

        $this->add_control(
            'subject_title_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}}  .card-description .title-area .title-info .title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subject_title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .card-description .title-area .title-info .title',
            ]
        );

        $this->add_responsive_control(
            'subject_title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .card-description .title-area .title-info .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'subject_title_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .card-description .title-area .title-info .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'subject_subtitle_style_section',
            [
                'label' => __('Subject Sub Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => '1',
                ],
            ]
        );

        $this->add_control(
            'subject_subtitle_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .card-description .title-area .title-info .date' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subject_subtitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .card-description .title-area .title-info .date',
            ]
        );

        $this->add_responsive_control(
            'subject_subtitle_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .card-description .title-area .title-info .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'subject_subtitle_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .card-description .title-area .title-info .date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'subject_content_style_section',
            [
                'label' => __('Subject Content', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'subject_content_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .card-description .description' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-style-2 .testimonial-inner .testimonial-body p.description' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subject_content_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .card-description .description, {{WRAPPER}} .testimonial-style-2 .testimonial-inner .testimonial-body p.description',
            ]
        );

        $this->add_responsive_control(
            'subject_content_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .card-description .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-style-2 .testimonial-inner .testimonial-body p.description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'subject_content_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .card-description .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-style-2 .testimonial-inner .testimonial-body p.description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
        $this->slick_load_scripts();
        $template = 'testimonial-carousel-' . str_replace("style", "", $settings['style']);
        return rainbow_Elements_Helper::rainbow_element_template($template, $settings);

    }

}
