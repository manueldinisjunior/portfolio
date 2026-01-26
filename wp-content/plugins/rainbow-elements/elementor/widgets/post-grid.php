<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class rainbow_post_grid extends Widget_Base
{

    use \Elementor\inbioElementCommonFunctions;

    public function get_name()
    {
        return 'rainbow-post-grid';
    }

    public function get_title()
    {
        return esc_html__('Blog Post', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    public function get_post_name($post_type = 'post')
    {
        $options = array();
        $options = ['0' => esc_html__('None', 'rainbow-elements')];
        $abc_post = array('posts_per_page' => -1, 'post_type' => $post_type);
        $abc_post_terms = get_posts($abc_post);
        if (!empty($abc_post_terms) && !is_wp_error($abc_post_terms)) {
            foreach ($abc_post_terms as $term) {
                $options[$term->ID] = $term->post_title;
            }
            return $options;
        }
    }


    protected function register_controls()
    {

        $terms = get_terms(array('taxonomy' => 'category', 'fields' => 'id=>name'));
        $category_dropdown = array(0 => esc_html__('All Categories', 'rainbow-elements'));

        foreach ($terms as $id => $name) {
            $category_dropdown[$id] = $name;
        }


        $this->start_controls_section(

            'sec_query_main',
            [
                'label' => esc_html__('Query', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $category_dropdown,
                'label_block' => true
            ]
        );
        $this->add_control(
            'exclude_category',
            [
                'label' => esc_html__('Exclude Category', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $category_dropdown,
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
                'options' => $this->get_post_name(),
            ]
        );
        $this->add_control(
            'post__not_in',
            [
                'label' => esc_html__('Exclude post', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_post_name(),
                'multiple' => true,
                'label_block' => true
            ]
        );
         
        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'rainbow-elements'),
                'type' => Controls_Manager::NUMBER,
                'default' => '3',
            ]
        );
        $this->add_control(
            'offset',
            [
                'label' => esc_html__('Offset', 'rainbow-elements'),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'ID' => 'Post ID',
                    'author' => 'Post Author',
                    'title' => 'Title',
                    'date' => 'Date',
                    'modified' => 'Last Modified Date',
                    'parent' => 'Parent Id',
                    'rand' => 'Random',
                    'comment_count' => 'Comment Count',
                    'menu_order' => 'Menu Order',
                ),
                'default' => 'date',

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
                'default' => 'asc',

            ]
        );
        $this->add_control(
            'ignore_sticky_posts',
            [
                'label' => esc_html__('Ignore sticky posts', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
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
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'rainbow-elements'),
                'label_off' => esc_html__('No', 'rainbow-elements'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'rainbow-thumbnail-sm',
                'separator' => 'none',
                'exclude' => [ 'custom' ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'popup_image_size',
                'default' => 'rainbow-thumbnail-archive',
                'separator' => 'none',
                'exclude' => [ 'custom' ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'display_options_section',
            [
                'label' => __('Display Options', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'row_gap',
            [
                'label' => __('Row Gap', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'options' => array(
                    'row--25' => esc_html__('row--25', 'rainbow-elements'),
                    'row--20' => esc_html__('row--20', 'rainbow-elements'),
                    'row--15' => esc_html__('row--15', 'rainbow-elements'),
                ),
                'default' => 'row--25',
            ]
        );

        $this->add_control(
            'post_title_length',
            [
                'label' => __('Post Title Length', 'rainbow-elements'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,

            ]

        );
        $this->add_control(
            'cat_display',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => __('Category Display', 'rainbow-elements'),
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'yes',
                'description' => __('Show or Hide Category. Default: On', 'rainbow-elements'),

                'separator' => 'before',
            ]
        );
        $this->add_control(
            'meta_display',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => __('Meta Display', 'rainbow-elements'),
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'yes',
                'description' => __('Show or Hide Meta. Default: On', 'rainbow-elements'),

                'separator' => 'before',
            ]
        );
        $this->add_control(
            'content_display',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => __('Content Display', 'rainbow-elements'),
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'yes',
                'description' => __('Show or Hide Content. Default: On', 'rainbow-elements'),

                'separator' => 'before',
            ]
        );
        $this->add_control(
            'post_content_length',
            [
                'label' => __('Post Excerpt Length', 'rainbow-elements'),
                'type' => Controls_Manager::NUMBER,
                'default' => 20,
                'condition' => array('content_display' => array('yes')),

            ]

        );


        $this->add_control(
            'blog_modal_popup_display',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => __('Popup Display', 'rainbow-elements'),
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'yes',
                'description' => __('Show or Hide Popup . Default: On', 'rainbow-elements'),
               
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'category_style_section',
            [
                'label' => __('Category', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .category-info .category-list a' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_control(
            'category_hover_color',
            [
                'label' => __('Hover Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .category-info .category-list a:hover' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .category-info .category-list a',
            ]
        );

        $this->add_responsive_control(
            'category_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .category-info .category-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'category_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .category-info .category-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'meta_style_section',
            [
                'label' => __('Meta', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'meta_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .category-info .meta span' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .category-info .meta span',
            ]
        );

        $this->add_responsive_control(
            'meta_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .category-info .meta span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'meta_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .category-info .meta span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Post Title', 'rainbow-elements'),
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
                    '{{WRAPPER}} .inner .content .title a' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_control(
            'title_hover_color',
            [
                'label' => __('Hover Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .inner .content .title a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .inner .content .title:hover a i' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .inner .content .title a',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}} .inner .content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __('Post Content', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .inner .content .post-excerpts' => 'color: {{VALUE}}',
                ),
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .inner .content .post-excerpts',
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .content .post-excerpts' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .content .post-excerpts' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->rainbow_columns('post_columns', 'Post - Columns', '4', '6', '6', '12');


    }

    protected function render()
    {

        $settings = $this->get_settings();
        $template = 'post-grid-1';
        return rainbow_Elements_Helper::rainbow_element_template($template, $settings);

    }
}
