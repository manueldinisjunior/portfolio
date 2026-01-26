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
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class Rainbow_Project_Carousel extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-project-carousel';
    }

    public function get_title()
    {
        return esc_html__('Project Carousel', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    public function rainbow_get_img($img)
    {
        $img = RAINBOW_ELEMENTS_BASE_URL . 'assets/images/' . $img;
        return $img;
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'project_content',
            [
                'label' => esc_html__('Project', 'rainbow-elements'),

            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'project_image',
            [
                'label' => esc_html__('Project Image', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->rainbow_get_img('placeholder.jpg'),
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'project_image_size',
                'default' => 'rainbow-thumbnail-single',
                'separator' => 'none',
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('The services provice for Design', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'designation',
            [
                'label' => esc_html__('Designation', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, quidem dignissimos. Perspiciatis fuga soluta officiis eligendi labore, omnis ut velit vitae suscipit alias cumque temporibus. ', 'rainbow-elements'),
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


        $this->add_control(
            'list_project',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'title' => esc_html__('The services provice for Design', 'rainbow-elements'),
                        'designation' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, quidem dignissimos. Perspiciatis fuga soluta officiis eligendi labore, omnis ut velit vitae suscipit alias cumque temporibus.',
                    ],
                    [
                        'title' => esc_html__('Restaurant Mobile Application Figma Design', 'rainbow-elements'),
                        'designation' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, quidem dignissimos. Perspiciatis fuga soluta officiis eligendi labore, omnis ut velit vitae suscipit alias cumque temporibus.',
                    ],
                    [
                        'title' => esc_html__('Workout Website Design And Development', 'rainbow-elements'),
                        'designation' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, quidem dignissimos. Perspiciatis fuga soluta officiis eligendi labore, omnis ut velit vitae suscipit alias cumque temporibus.',
                    ],
                    [
                        'title' => esc_html__('Restaurant Mobile Application Figma Design', 'rainbow-elements'),
                        'designation' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, quidem dignissimos. Perspiciatis fuga soluta officiis eligendi labore, omnis ut velit vitae suscipit alias cumque temporibus.',
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __('Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stitle_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}}  .portfolio-single .inner .title' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .portfolio-single .inner .title',
            ]
        );

        $this->add_responsive_control(
            'stitle_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .portfolio-single .inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',


                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__('Content', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .portfolio-single .inner p.description' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_font_size',
                'label' => esc_html__('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .portfolio-single .inner p.description',
            ]
        );

        $this->add_responsive_control(
            'content_title_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .portfolio-single .inner p.description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',


                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();

        $template = 'project-carousel-1';
        return rainbow_Elements_Helper::rainbow_element_template($template, $settings);

    }

}
