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
class Portfolio_Grid extends Widget_Base
{

    use \Elementor\inbioElementCommonFunctions;

    public function get_name()
    {
        return 'rainbow-portfolio-grid';
    }

    public function get_title()
    {
        return __('Portfolio', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'portfolio_sec',
            [
                'label' => __('Portfolio Query ', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => __('Layout', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Grid', 'rainbow-elements'),
                    '2' => __('Carousel', 'rainbow-elements'),
                ],
            ]
        );

        $this->add_control(
            'grid-spaces',
            [
                'label' => __('Grid spaces', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '15',
                'options' => [
                    '15' => __('Grid spaces 15', 'rainbow-elements'),
                    '20' => __('Grid spaces 20', 'rainbow-elements'),
                    '25' => __('Grid spaces 25', 'rainbow-elements'),
                ],
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => rainbow_Elements_Helper::rainbow_get_categories("rainbow_projects_category"),
                'label_block' => true
            ]
        );
        $this->add_control(
            'post__not_in',
            [
                'label' => esc_html__('Exclude', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'options' => rainbow_Elements_Helper::rainbow_get_all_types_post('rainbow_projects'),
                'multiple' => true,
                'label_block' => true
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'rainbow-elements'),
                'type' => Controls_Manager::NUMBER,
                'default' => '6',
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
                'options' => rainbow_Elements_Helper::rainbow_get_orderby_options(),
                'default' => 'date',


            ]
        );
        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' => 'Ascending',
                    'desc' => 'Descending'
                ],
                'default' => 'desc',

            ]
        );

        $this->add_control(
            'projects_meta_display',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => __('Like Meta Display', 'rainbow-elements'),
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'yes',
                'description' => __('Show or Hide meta. Default: On', 'rainbow-elements'),

            ]
        );
        $this->add_control(
            'projects_cat_display',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => __('Projects Category Display', 'rainbow-elements'),
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'yes',
                'description' => __('Show or Hide Category. Default: On', 'rainbow-elements'),

            ]
        );
        $this->add_control(
            'seemore_display',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => __('See More Display', 'rainbow-elements'),
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'no',
                'description' => __('Show or Hide See More . Default: On', 'rainbow-elements'),
                'condition' => array('style' => array('1')),
            ]
        );
        $this->add_control(
            'seemore_txt',
            [
                'label' => __('See More button Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('See More', 'rainbow-elements'),
                'placeholder' => __('See More', 'rainbow-elements'),
                'condition' => array('seemore_display' => array('yes')),
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
        $this->end_controls_section();


        $this->start_controls_section(
            'sec_modal_popup',
            [
                'label' => __('Modal Popup', 'rainbow-elements'),

            ]
        );


        $this->add_control(
            'modal_popup_display',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => __('Popup Display', 'rainbow-elements'),
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'yes',
                'description' => __('Show or Hide Popup . Default: On', 'rainbow-elements'),
               
            ]
        );

        $this->add_control(
            'like_this_txt',
            [
                'label' => __('Like This Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('LIKE THIS', 'rainbow-elements'),
                'condition' => array('modal_popup_display' => array('yes')),
                'label_block' => true
            ]
        );
        $this->add_control(
            'modal_button_txt',
            [
                'label' => __('Modal Button "VIEW PROJECT"', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('VIEW PROJECT', 'rainbow-elements'),
                'condition' => array('modal_popup_display' => array('yes')),
                'label_block' => true
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'sec_responsive',
            [
                'label' => __('Desktops/Tabs/Mobiles Columns', 'rainbow-elements'),
                'condition' => array('style' => array('1')),
            ]
        );

        $this->add_control(
            'col_lg',
            [
                'label' => __('Desktops: ≥ 1200px', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '12' => esc_html__('1 Col', 'rainbow-elements'),
                    '6' => esc_html__('2 Col', 'rainbow-elements'),
                    '4' => esc_html__('3 Col', 'rainbow-elements'),
                    '3' => esc_html__('4 Col', 'rainbow-elements'),
                ],
                'default' => '6',
            ]
        );
        $this->add_control(
            'col_md',
            [
                'label' => __('Tabs: ≥ 992px', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '12' => esc_html__('1 Col', 'rainbow-elements'),
                    '6' => esc_html__('2 Col', 'rainbow-elements'),
                    '4' => esc_html__('3 Col', 'rainbow-elements'),
                    '3' => esc_html__('4 Col', 'rainbow-elements'),
                ],
                'default' => '6',
            ]
        );
        $this->add_control(
            'col_sm',
            [
                'label' => __('Mobiles: ≥ 576px', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '12' => esc_html__('1 Col', 'rainbow-elements'),
                    '6' => esc_html__('2 Col', 'rainbow-elements'),
                    '4' => esc_html__('3 Col', 'rainbow-elements'),
                    '3' => esc_html__('4 Col', 'rainbow-elements'),
                ],
                'default' => '12',
            ]
        );
        $this->add_control(
            'col',
            [
                'label' => __('Mobiles: < 576px', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '12' => esc_html__('1 Col', 'rainbow-elements'),
                    '6' => esc_html__('2 Col', 'rainbow-elements'),
                    '4' => esc_html__('3 Col', 'rainbow-elements'),
                    '3' => esc_html__('4 Col', 'rainbow-elements'),
                ],
                'default' => '12',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'portfolio_style_section',
            [
                'label' => __('Portfolio Style', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .title a' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_control(
            'title_hover_color',
            [
                'label' => __('Title Hover Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .title a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .title:hover a i' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .title a',
            ]
        );
        $this->add_control(
            'hr-2',
            [
                'type' => Controls_Manager::DIVIDER,
                'description' => __('Write -1 to show all', 'rainbow-elements'),
                'style' => 'thick',
            ]

        );
        $this->add_control(
            'cats_color',
            [
                'label' => __('Category Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .category-info .category-list a' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_control(
            'cats_hover_color',
            [
                'label' => __('Category Hover Color', 'rainbow-elements'),
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
                'name' => 'cats_font_size',
                'label' => __('Typography', 'rainbow-elements'),


                'selector' => '{{WRAPPER}} .category-info .category-list a',
            ]
        );


        $this->add_control(
            'hr-3',
            [
                'type' => Controls_Manager::DIVIDER,
                'description' => __('Write -1 to show all', 'rainbow-elements'),
                'style' => 'thick',
            ]

        );
        $this->add_control(
            'meta_color',
            [
                'label' => __('Meta Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .rn-portfolio .inner .content .category-info .meta span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rn-portfolio .inner .content .category-info .meta span a' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_control(
            'meta_hover_color',
            [
                'label' => __('Meta Hover Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .rn-portfolio .inner .content .category-info .meta span a:hover' => 'color: {{VALUE}}',

                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_font_size',
                'label' => __('Typography', 'rainbow-elements'),


                'selector' => '{{WRAPPER}} .rn-portfolio .inner .content .category-info .meta span, {{WRAPPER}} .rn-portfolio .inner .content .category-info .meta span a',
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

        $template = 'portfolio-grid-' . str_replace("style", "", $settings['style']);
        return rainbow_Elements_Helper::rainbow_element_template($template, $settings);
    }
}