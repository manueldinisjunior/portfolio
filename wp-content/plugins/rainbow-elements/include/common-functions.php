<?php

namespace rainbow\Rainbow_Elements;

namespace Elementor;

use Elementor\Group_Control_Base;
use Elementor\REPEA;


trait inbioElementCommonFunctions
{

    public static function rainbow_get_all_posts($post_type = 'post')
    {
        $options = array();
        $options = ['0' => esc_html__('None', 'rainbow-elements')];
        $rainbow_post = array('posts_per_page' => -1, 'post_type' => $post_type);
        $rainbow_post_terms = get_posts($rainbow_post);
        if (!empty($rainbow_post_terms) && !is_wp_error($rainbow_post_terms)) {
            foreach ($rainbow_post_terms as $term) {
                $options[$term->ID] = $term->post_title;
            }
            return $options;
        }
    }

    public static function rainbow_get_categories_id($taxonomy)
    {
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        ));
        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }
        }
        return $options;
    }


    public static function rainbow_get_all_pages()
    {

        $page_list = get_posts(array(
            'post_type' => 'page',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => -1,
        ));

        $pages = array();

        if (!empty($page_list) && !is_wp_error($page_list)) {
            foreach ($page_list as $page) {
                $pages[$page->post_name] = $page->post_title;
            }
        }

        return $pages;

    }


    public static function rainbow_get_all_types_post($post_type)
    {
        $posts_args = get_posts(array(
            'post_type' => $post_type,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ));

        $posts = array();

        if (!empty($posts_args) && !is_wp_error($posts_args)) {
            foreach ($posts_args as $post) {
                $posts[$post->ID] = $post->post_title;
            }
        }

        return $posts;
    }


    public static function rainbow_get_categories($taxonomy)
    {
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        ));
        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
        }
        return $options;

    }


    public static function rainbow_get_orderby_options()
    {
        $orderby = array( 

            'ID' => esc_html__('Post ID', 'rainbow-elements'),
            'author' => esc_html__('Post Author', 'rainbow-elements'),
            'title' => esc_html__('Title', 'rainbow-elements'),
            'date' => esc_html__('Date', 'rainbow-elements'),
            'modified' => esc_html__('Last Modified Date', 'rainbow-elements'),
            'parent' => esc_html__('Parent Id', 'rainbow-elements'),
            'rand' => esc_html__('Random', 'rainbow-elements'),
            'comment_count' => esc_html__('Comment Count', 'rainbow-elements'),
            'menu_order' => esc_html__('Menu Order', 'rainbow-elements'),

        );
        return $orderby;
    }


    protected function rainbow_section_title($control_id = null, $title = 'Your Section Title', $default_title_tag = 'h2', $align_field = false, $align = 'text-left')
    {
        $this->start_controls_section(
            'rainbow_' . $control_id . '_section_title',
            [
                'label' => esc_html__('Section Title', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'rainbow_' . $control_id . '_title',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => $title,
                'placeholder' => esc_html__('Type Heading Text', 'rainbow-elements'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'rainbow_' . $control_id . '_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'rainbow-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => $default_title_tag,
                'toggle' => false,
            ]
        );
        if ($align_field == true) {
            $this->add_responsive_control(
                'rainbow_' . $control_id . '_align',
                [
                    'label' => esc_html__('Alignment', 'rainbow-elements'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'text-left' => [
                            'title' => esc_html__('Left', 'rainbow-elements'),
                            'icon' => 'fa fa-align-left',
                        ],
                        'text-center' => [
                            'title' => esc_html__('Center', 'rainbow-elements'),
                            'icon' => 'fa fa-align-center',
                        ],
                        'text-right' => [
                            'title' => esc_html__('Right', 'rainbow-elements'),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => $align,
                    'toggle' => true,
                ]
            );
        }
        $this->end_controls_section();
    }

    /**
     * Render Section Title
     *
     * @param null $control_id
     * @param $settings
     */
    protected function rainbow_section_title_render($control_id, $settings)
    {
        $this->add_render_attribute('title_args', 'class', 'title');
        ?>
        <?php if ($settings['rainbow_' . $control_id . '_title_tag']) : ?>
        <<?php echo tag_escape($settings['rainbow_' . $control_id . '_title_tag']); ?><?php echo $this->get_render_attribute_string('title_args'); ?>><?php echo rainbow_kses_basic($settings['rainbow_' . $control_id . '_title']); ?></<?php echo tag_escape($settings['rainbow_' . $control_id . '_title_tag']) ?>>
    <?php endif; ?>
        <?php
    }

    /**
     * [rainbow_query_controls description]
     * @param  [type] $control_id     [description]
     * @param  [type] $control_name   [description]
     * @param string $post_type [description]
     * @param string $taxonomy [description]
     * @param string $posts_per_page [description]
     * @param string $offset [description]
     * @param string $orderby [description]
     * @param string $order [description]
     * @return [type]                 [description]
     */
    protected function rainbow_query_controls($control_id = null, $control_name = null, $post_type = 'any', $taxonomy = 'category', $posts_per_page = '6', $offset = '0', $orderby = 'date', $order = 'desc')
    {

        $this->start_controls_section(
            'rainbow-elements' . $control_id . '_query',
            [
                'label' => sprintf(esc_html__('%s Query', 'rainbow-elements'), $control_name),
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->rainbow_get_categories($taxonomy),
                'label_block' => true
            ]
        );
        $this->add_control(
            'exclude_category',
            [
                'label' => esc_html__('Exclude Category', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->rainbow_get_categories_id($taxonomy),
                'label_block' => true
            ]
        );
        $this->add_control(
            'post__in',
            [
                'type' => Controls_Manager::SELECT2,
                'label' => esc_html__('Select post manually', 'rainbow-elements'),
                'label_block' => true,
                'multiple' => true,
                'options' => $this->rainbow_get_all_posts(),
            ]
        );
        $this->add_control(
            'post__not_in',
            [
                'label' => esc_html__('Exclude post', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->rainbow_get_all_types_post($post_type),
                'multiple' => true,
                'label_block' => true
            ]
        );
        $this->add_control(
            'post_format',
            [
                'label' => esc_html__('Select Post Format', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'options' => [
                    'post-format-standard' => esc_html__('Standard', 'rainbow-elements'),
                    'post-format-audio' => esc_html__('Audio', 'rainbow-elements'),
                    'post-format-video' => esc_html__('Video', 'rainbow-elements'),
                    'post-format-gallery' => esc_html__('Gallery', 'rainbow-elements'),
                    'post-format-link' => esc_html__('Link', 'rainbow-elements'),
                    'post-format-quote' => esc_html__('Quote', 'rainbow-elements'),
                ],
                'default' => [],
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'rainbow-elements'),
                'type' => Controls_Manager::NUMBER,
                'default' => $posts_per_page,
            ]
        );
        $this->add_control(
            'offset',
            [
                'label' => esc_html__('Offset', 'rainbow-elements'),
                'type' => Controls_Manager::NUMBER,
                'default' => $offset,
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->rainbow_get_orderby_options(),
                'default' => $orderby,

            ]
        );
        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' => esc_html__('Ascending', 'rainbow-elements'),
                    'desc' => esc_html__('Descending', 'rainbow-elements'),
                ],
                'default' => $order,

            ]
        );
        $this->add_control(
            'ignore_sticky_posts',
            [
                'label' => esc_html__('Ignore sticky posts', 'rainbow-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'rainbow-elements'),
                'label_off' => esc_html__('No', 'rainbow-elements'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_only_sticky_posts',
            [
                'label' => esc_html__('Show only sticky posts', 'rainbow-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'rainbow-elements'),
                'label_off' => esc_html__('No', 'rainbow-elements'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

    }

    /**
     * [rainbow_basic_style_controls description]
     * @param  [string] $control_id       [description]
     * @param  [string] $control_name     [description]
     * @param  [string] $control_selector [description]
     * @return [styleing control]                   [ color, typography, padding, margin ]
     */
    protected function rainbow_basic_style_controls($control_id = null, $control_name = null, $control_selector = null)
    {
        $this->start_controls_section(
            'rainbow_' . $control_id . '_styling',
            [
                'label' => esc_html__($control_name, 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'rainbow_' . $control_id . '_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'rainbow_' . $control_id . '_typography',
                'label' => esc_html__('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} ' . $control_selector,
            ]
        );
        $this->add_responsive_control(
            'rainbow_' . $control_id . '_padding',
            [
                'label' => esc_html__('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'rainbow_' . $control_id . '_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    /**
     * [rainbow_section_style_controls description]
     * @param  [type] $control_id       [description]
     * @param  [type] $control_name     [description]
     * @param  [type] $control_selector [description]
     * @return [type]                   [description]
     */
    protected function rainbow_section_style_controls($control_id = null, $control_name = null, $control_selector = null)
    {
        $this->start_controls_section(
            'rainbow_' . $control_id . '_area_styling',
            [
                'label' => esc_html__($control_name, 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'rainbow_' . $control_id . 'area_background',
                'label' => esc_html__('Background', 'rainbow-elements'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} ' . $control_selector,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'rainbow_' . $control_id . 'area_border',
                'label' => esc_html__('Border', 'rainbow-elements'),
                'selector' => '{{WRAPPER}} ' . $control_selector,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'rainbow_' . $control_id . '_area_padding',
            [
                'label' => esc_html__('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'rainbow_' . $control_id . '_area_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    /**
     * [rainbow_link_controls description]
     * @param string $control_id [description]
     * @param string $control_name [description]
     * @return [type]               [description]
     */
    protected function rainbow_link_controls($control_id = 'button', $control_name = 'Button', $default = 'Read More')
    {

        $this->add_control(
            'rainbow_' . $control_id . '_show',
            [
                'label' => esc_html__('Show Button', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rainbow-elements'),
                'label_off' => esc_html__('Hide', 'rainbow-elements'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'rainbow_' . $control_id . '_text',
            [
                'label' => esc_html__($control_name . ' Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => $default,
                'title' => esc_html__('Enter button text', 'rainbow-elements'),
                'label_block' => true
            ]
        );
        $this->add_control(
            'rainbow_' . $control_id . '_link_type',
            [
                'label' => esc_html__($control_name . ' Link Type', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true
            ]
        );
        $this->add_control(
            'rainbow_' . $control_id . '_link',
            [
                'label' => esc_html__($control_name . ' link', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'rainbow-elements'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'rainbow_' . $control_id . '_link_type' => '1'
                ],
                'label_block' => true
            ]
        );
        $this->add_control(
            'rainbow_' . $control_id . '_page_link',
            [
                'label' => esc_html__('Select ' . $control_name . ' Page', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => rainbow_get_all_pages(),
                'condition' => [
                    'rainbow_' . $control_id . '_link_type' => '2'
                ]
            ]
        );

    }

    /**
     * [rainbow_link_controls_style description]
     * @param string $control_id [description]
     * @param string $control_selector [description]
     * @return [type]                   [description]
     */
    protected function rainbow_link_controls_style($control_id = 'button_style', $control_name = 'Button', $control_selector = 'a', $default_size = 'btn-large', $default_style = 'btn-solid')
    {
        /**
         * Button One
         */
        $this->start_controls_section(
            'rainbow_' . $control_id . '_button',
            [
                'label' => esc_html__($control_name, 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'rainbow_' . $control_id . '_button_style',
            [
                'label' => esc_html__('Button Style', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'btn-transparent' => esc_html__('Outline', 'rainbow-elements'),
                    'btn-solid' => esc_html__('Solid', 'rainbow-elements'),
                    'rainbow-link-button' => esc_html__('Link', 'rainbow-elements'),
                ],
                'default' => $default_style
            ]
        );

        $this->add_control(
            'rainbow_' . $control_id . '_button_size',
            [
                'label' => esc_html__('Button Size', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'btn-extra-large' => esc_html__('Extra Large', 'rainbow-elements'),
                    'btn-large' => esc_html__('Large', 'rainbow-elements'),
                    'btn-medium' => esc_html__('Medium', 'rainbow-elements'),
                    'btn-small' => esc_html__('Small', 'rainbow-elements'),
                ],
                'default' => $default_size,
                'condition' => array(
                    'rainbow_' . $control_id . '_button_style!' => 'rainbow-link-button',
                ),
            ]
        );

        $this->add_control(
            'rainbow_' . $control_id . '_button_arrow_icon',
            [
                'label' => esc_html__('Arrow Icon', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'rainbow-elements'),
                'label_off' => esc_html__('Hide', 'rainbow-elements'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'rainbow_' . $control_id . '_button_style!' => 'rainbow-link-button',
                ),
            ]
        );
        $this->add_responsive_control(
            'rainbow_' . $control_id . '_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'rainbow_' . $control_id . '_typography',
                'selector' => '{{WRAPPER}} ' . $control_selector . '',
            ]
        );


        $this->start_controls_tabs('rainbow_' . $control_id . '_button_tabs');

        // Normal State Tab
        $this->start_controls_tab('rainbow_' . $control_id . '_btn_normal', ['label' => esc_html__('Normal', 'rainbow-elements')]);

        $this->add_control(
            'rainbow_' . $control_id . '_btn_normal_text_color',
            [
                'label' => esc_html__('Text Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ' . $control_selector . ' .button-icon' => 'border-left-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'rainbow_' . $control_id . '_btn_normal_bg_color',
            [
                'label' => esc_html__('Background Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'rainbow_' . $control_id . '_btn_normal_border_color',
            [
                'label' => esc_html__('Border Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '::after' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} ' . $control_selector . '::before' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} ' . $control_selector . '.rainbow-link-button::after' => 'background: {{VALUE}};',
                ],
            ]

        );

        $this->add_control(
            'rainbow_' . $control_id . '_btn_border_radius',
            [
                'label' => esc_html__('Border Radius', 'rainbow-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . '' => 'border-radius: {{SIZE}}px;',
                    '{{WRAPPER}} ' . $control_selector . '::after' => 'border-radius: {{SIZE}}px;',
                    '{{WRAPPER}} ' . $control_selector . '::before' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('rainbow_' . $control_id . '_btn_hover', ['label' => esc_html__('Hover', 'rainbow-elements')]);

        $this->add_control(
            'rainbow_' . $control_id . '_btn_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ' . $control_selector . ':hover .button-icon' => 'border-left-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'rainbow_' . $control_id . '_btn_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} ' . $control_selector . '.btn-transparent:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'rainbow_' . $control_id . '_btn_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector . ':hover::after' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} ' . $control_selector . '.rainbow-link-button:hover::after' => 'background: {{VALUE}};',
                ],
            ]

        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }


    /**
     * @param string $control_id
     * @param string $control_name
     * @param string $default_for_lg
     * @param string $default_for_md
     * @param string $default_for_sm
     * @param string $default_for_all
     */
    protected function rainbow_columns($control_id = 'columns_options', $control_name = 'Select Columns', $default_for_lg = '4', $default_for_md = '6', $default_for_sm = '6', $default_for_all = '12')
    {
        $this->start_controls_section(
            'rainbow_' . $control_id . 'columns_section',
            [
                'label' => esc_html__($control_name, 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'rainbow_' . $control_id . '_for_desktop',
            [
                'label' => esc_html__('Columns for Desktop', 'rainbow-elements'),
                'description' => esc_html__('Screen width equal to or greater than 992px', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'rainbow-elements'),
                    6 => esc_html__('2 Columns', 'rainbow-elements'),
                    4 => esc_html__('3 Columns', 'rainbow-elements'),
                    3 => esc_html__('4 Columns', 'rainbow-elements'),
                    5 => esc_html__('5 Columns (col-5)', 'rainbow-elements'),
                    2 => esc_html__('6 Columns', 'rainbow-elements'),
                    1 => esc_html__('12 Columns', 'rainbow-elements'),
                ],
                'separator' => 'before',
                'default' => $default_for_lg,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rainbow_' . $control_id . '_for_laptop',
            [
                'label' => esc_html__('Columns for Laptop', 'rainbow-elements'),
                'description' => esc_html__('Screen width equal to or greater than 768px', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'rainbow-elements'),
                    6 => esc_html__('2 Columns', 'rainbow-elements'),
                    4 => esc_html__('3 Columns', 'rainbow-elements'),
                    3 => esc_html__('4 Columns', 'rainbow-elements'),
                    5 => esc_html__('5 Columns (col-5)', 'rainbow-elements'),
                    2 => esc_html__('6 Columns', 'rainbow-elements'),
                    1 => esc_html__('12 Columns', 'rainbow-elements'),
                ],
                'separator' => 'before',
                'default' => $default_for_md,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rainbow_' . $control_id . '_for_tablet',
            [
                'label' => esc_html__('Columns for Tablet', 'rainbow-elements'),
                'description' => esc_html__('Screen width equal to or greater than 576px', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'rainbow-elements'),
                    6 => esc_html__('2 Columns', 'rainbow-elements'),
                    4 => esc_html__('3 Columns', 'rainbow-elements'),
                    3 => esc_html__('4 Columns', 'rainbow-elements'),
                    5 => esc_html__('5 Columns (col-5)', 'rainbow-elements'),
                    2 => esc_html__('6 Columns', 'rainbow-elements'),
                    1 => esc_html__('12 Columns', 'rainbow-elements'),
                ],
                'separator' => 'before',
                'default' => $default_for_sm,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'rainbow_' . $control_id . '_for_mobile',
            [
                'label' => esc_html__('Columns for Mobile', 'rainbow-elements'),
                'description' => esc_html__('Screen width less than 576px', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    12 => esc_html__('1 Columns', 'rainbow-elements'),
                    6 => esc_html__('2 Columns', 'rainbow-elements'),
                    4 => esc_html__('3 Columns', 'rainbow-elements'),
                    3 => esc_html__('4 Columns', 'rainbow-elements'),
                    5 => esc_html__('5 Columns (col-5)', 'rainbow-elements'),
                    2 => esc_html__('6 Columns', 'rainbow-elements'),
                    1 => esc_html__('12 Columns', 'rainbow-elements'),
                ],
                'separator' => 'before',
                'default' => $default_for_all,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

}
