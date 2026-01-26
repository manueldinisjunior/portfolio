<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class Team_Grid extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-team-grid';
    }

    public function get_title()
    {
        return __('Team Grid', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    protected function register_controls()
    {
        $terms = get_terms(array('taxonomy' => "rainbow_team_category", 'fields' => 'id=>name'));
        $category_dropdown = array('0' => esc_html__('All Categories', 'rainbow-elements'));

        foreach ($terms as $id => $name) {
            $category_dropdown[$id] = $name;
        }


        $this->start_controls_section(
            'sec_query',
            [
                'label' => __('Query', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'style',
            [
                'label' => __('Style', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => __('Style One', 'rainbow-elements'),
                    'style2' => __('Style Two', 'rainbow-elements'),
                    'style3' => __('Style Three', 'rainbow-elements'),


                ],
            ]
        );
        $this->add_control(
            'number',
            [
                'label' => __('Number', 'rainbow-elements'),
                'type' => Controls_Manager::NUMBER,
                'default' => -1,
                'description' => __('Write -1 to show all', 'rainbow-elements'),
            ]

        );
        $this->add_control(
            'cat_list',
            [
                'label' => __('Categories', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'default' => '0',
                'options' => $category_dropdown,
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT2,
                'options' => array(
                    'date' => __('Date (Recents comes first)', 'rainbow-elements'),
                    'title' => __('Title', 'rainbow-elements'),
                    'menu_order' => __('Custom Order (Available via Order field inside Page Attributes box)', 'rainbow-elements'),
                ),
                'default' => 'date',
            ]
        );


        $this->add_control(
            'designation_display',
            [

                'type' => Controls_Manager::SWITCHER,
                'label' => __('Designation Display', 'rainbow-elements'),
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'yes',
                'description' => __('Show or Hide Designation. Default: On', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'social_display',
            [

                'type' => Controls_Manager::SWITCHER,
                'label' => __('Social Media Display', 'rainbow-elements'),
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'yes',
                'description' => __('Show or Hide Social Medias. Default: On', 'rainbow-elements'),
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
                'condition' => array('style' => array('2')),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'abc_responsive',
            [
                'label' => __('Responsive Columns', 'rainbow-elements'),
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
            'abc_title_style_section',
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
                    '{{WRAPPER}} .abc-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .abc-title a' => 'color: {{VALUE}}',
                ),
            ]
        );
        $this->add_control(
            'title_hover_color',
            [
                'label' => __('Hover Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => array('title_style_on' => array('yes')),
                'selectors' => array(
                    '{{WRAPPER}} .abc-title:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .abc-title a:hover' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'condition' => array('title_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .abc-title',
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
                    '{{WRAPPER}} .abc-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('title_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .abc-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'abc_sub_title_style_section',
            [
                'label' => __('Designation', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_title_style_on',
            [
                'label' => __('Customize', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );


        $this->add_control(
            'sub_title_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => array('sub_title_style_on' => array('yes')),
                'selectors' => array(
                    '{{WRAPPER}} .abc-sub-title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'condition' => array('sub_title_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .abc-sub-title',
            ]
        );

        $this->add_responsive_control(
            'sub_title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('sub_title_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .abc-sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'sub_title_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('sub_title_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .abc-sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings();
        $template = 'team-' . str_replace("style", "", $settings['style']);
        return rainbow_Elements_Helper::rainbow_element_template($template, $settings);

    }
}
