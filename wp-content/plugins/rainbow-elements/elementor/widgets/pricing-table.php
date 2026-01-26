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

class Rainbow_Pricing_Table extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-pricing-table';
    }

    public function get_title()
    {
        return __('Pricing Table ', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-icon-box';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'pricing_layout',
            [
                'label' => __('General', 'rainbow-elements'),
            ]
        );


        $this->add_control(
            'style',
            [
                'label' => esc_html__('Style', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Layout one', 'rainbow-elements'),
                    '2' => esc_html__('Layout Two', 'rainbow-elements'),

                ],
            ]
        );


        $this->add_control(
            'header_title',
            [
                'label' => __('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Design Make this Page', 'rainbow-elements'),
                'placeholder' => __('Title', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Elementor',
            ]
        );
        $this->add_control(
            'amount',
            [
                'label' => esc_html__('Amount Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '$50.00',
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => __('description', 'rainbow-elements'),
                'default' => __('All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'condition' => array('style' => array('1')),


            ]
        );

        $this->add_control(
            'detail_txt',
            [
                'label' => esc_html__('Detail Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('ORDER NOW', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => esc_html__('Detail URL', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'sec_option_list3',
            [
                'label' => esc_html__('Option List', 'rainbow-elements'),
                'condition' => array('style' => array('2')),

            ]
        );


        $repeater = new Repeater();

        $repeater->add_control(
            'list_title3',
            [
                'label' => esc_html__('List', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Livingroom Cleaning', 'rainbow-elements'),
                'placeholder' => esc_html__('Type Heading Text', 'rainbow-elements'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_on',
            [
                'label' => __('check On', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );

        $this->add_control(
            'option_list3',
            [
                'label' => esc_html__('option List', 'rainbow-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),


                'default' => [

                    [
                        'list_title3' => esc_html__('1 Page with Elementor', 'rainbow-elements'),
                    ],
                    [
                        'list_title3' => esc_html__('Design Customization', 'rainbow-elements'),
                    ],
                    [
                        'list_title3' => esc_html__('Responsive Design', 'rainbow-elements'),
                    ],
                    [
                        'list_title3' => esc_html__('Content Upload', 'rainbow-elements'),
                    ],
                    [
                        'list_title3' => esc_html__('Design Customization', 'rainbow-elements'),
                    ],


                ],
                'title_field' => '{{{ list_title3 }}}',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'sec_option_list',
            [
                'label' => esc_html__('Option List Left', 'rainbow-elements'),
                'condition' => array('style' => array('1')),

            ]
        );


        $repeater = new Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('List Left', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Livingroom Cleaning', 'rainbow-elements'),
                'placeholder' => esc_html__('Type Heading Text', 'rainbow-elements'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'option_list',
            [
                'label' => esc_html__('option List', 'rainbow-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),


                'default' => [

                    [
                        'list_title' => esc_html__('1 Page with Elementor', 'rainbow-elements'),
                    ],
                    [
                        'list_title' => esc_html__('Design Customization', 'rainbow-elements'),
                    ],
                    [
                        'list_title' => esc_html__('Responsive Design', 'rainbow-elements'),
                    ],
                    [
                        'list_title' => esc_html__('Content Upload', 'rainbow-elements'),
                    ],
                    [
                        'list_title' => esc_html__('Design Customization', 'rainbow-elements'),
                    ],
                    [
                        'list_title' => esc_html__('2 Plugins/Extensions', 'rainbow-elements'),
                    ],


                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'sec_option_list2',
            [
                'label' => esc_html__('Option List Right', 'rainbow-elements'),
                'condition' => array('style' => array('1')),


            ]
        );


        $repeater = new Repeater();

        $repeater->add_control(
            'list_title2',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Livingroom Cleaning', 'rainbow-elements'),
                'placeholder' => esc_html__('Type Heading Text', 'rainbow-elements'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'option_list2',
            [
                'label' => esc_html__('option List', 'rainbow-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [

                    [
                        'list_title2' => esc_html__('Multipage Elementor', 'rainbow-elements'),
                    ],
                    [
                        'list_title2' => esc_html__('Design Figma', 'rainbow-elements'),
                    ],
                    [
                        'list_title2' => esc_html__('Maintaine Design', 'rainbow-elements'),

                    ],
                    [
                        'list_title2' => esc_html__('Content Upload', 'rainbow-elements'),
                    ],
                    [
                        'list_title2' => esc_html__('Design With XD', 'rainbow-elements'),
                    ],
                    [
                        'list_title2' => esc_html__('8 Plugins/Extensions', 'rainbow-elements'),
                    ],


                ],
                'title_field' => '{{{ list_title2 }}}',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'footer_pricing_layout',
            [
                'label' => __('Pricing Footer', 'rainbow-elements'),
                'condition' => array('style' => array('1')),
            ]
        );

        $this->add_control(
            'footer_txt1',
            [
                'label' => esc_html__('Text 1', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('2 Days Delivery', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'footer_txt2',
            [
                'label' => esc_html__('Text 2', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Unlimited Revission', 'rainbow-elements'),
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
            'title_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .pricing-header .header-left h2.title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-wrapper .ts-header h6' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .pricing-header .header-left h2.title, {{WRAPPER}} .pricing-wrapper .ts-header h6',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .pricing-header .header-left h2.title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pricing-wrapper .ts-header h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}} .pricing-header .header-left h2.title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pricing-wrapper .ts-header h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => __('Sub Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}}  .pricing-header .header-left span' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  .pricing-wrapper .ts-header span' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}}  .pricing-header .header-left span, {{WRAPPER}} .pricing-wrapper .ts-header span',
            ]
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .pricing-header .header-left span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pricing-wrapper .ts-header span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .pricing-header .header-left span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}}  .pricing-wrapper .ts-header span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __('Content', 'rainbow-elements'),
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
                    '{{WRAPPER}}  .rn-pricing .pricing-body p.description' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}}  .rn-pricing .pricing-body p.description',
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .rn-pricing .pricing-body p.description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}}  .rn-pricing .pricing-body p.description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'list_title_style_section',
            [
                'label' => __('List Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'list_title_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .rn-pricing .pricing-body .check-wrapper .check p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rn-pricing .pricing-body .check-wrapper .check svg' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-wrapper .pricing-body .feature .name' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}}  .rn-pricing .pricing-body .check-wrapper .check p, {{WRAPPER}} .rn-pricing .pricing-body .check-wrapper .check svg, {{WRAPPER}} .pricing-style-2 .pricing-wrapper .pricing-body .feature .name',
            ]
        );

        $this->add_responsive_control(
            'list_title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .rn-pricing .pricing-body .check-wrapper .check' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pricing-wrapper .pricing-body .feature' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'list_title_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .rn-pricing .pricing-body .check-wrapper .check' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pricing-wrapper .pricing-body .feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'btn_style_section',
            [
                'label' => __('Button', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}}  .rn-pricing .pricing-footer .rn-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  .pricing-wrapper .price' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  .pricing-wrapper .pricing-footer a.rn-btn' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .rn-pricing .pricing-footer .rn-btn, {{WRAPPER}} .pricing-wrapper .price, {{WRAPPER}} .pricing-wrapper .pricing-footer a.rn-btn',
            ]
        );

        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .rn-pricing .pricing-footer .rn-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pricing-wrapper .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pricing-wrapper .pricing-footer a.rn-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}} .rn-pricing .pricing-footer .rn-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pricing-wrapper .price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pricing-wrapper .pricing-footer a.rn-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'pricing_style_section',
            [
                'label' => __('Prices', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'pricing_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .rn-pricing .pricing-header .header-right span' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pricing_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'selector' => '{{WRAPPER}} .rn-pricing .pricing-header .header-right span, {{WRAPPER}} .rn-pricing .pricing-footer .time-line .single-cmt svg',
            ]
        );

        $this->add_responsive_control(
            'pricing_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .rn-pricing .pricing-header .header-right span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .rn-pricing .pricing-header .header-right span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'footer_style_section',
            [
                'label' => __('Footer +', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'footer_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .pricing-footer .time-line .single-cmt span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-footer .time-line .single-cmt svg' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'footer_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'selector' => '{{WRAPPER}} .pricing-footer .time-line .single-cmt span, {{WRAPPER}} .rn-pricing .pricing-footer .time-line .single-cmt svg',
            ]
        );

        $this->add_responsive_control(
            'footer_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .pricing-footer .time-line .single-cmt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'footer_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .pricing-footer .time-line .single-cmt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


    }

    private function feature_load_scripts()
    {

        wp_enqueue_style('feature');
        wp_enqueue_script('feather-min');
    }


    protected function render()
    {
        $settings = $this->get_settings();
        $this->feature_load_scripts();
        $attr = $btn = $btn2 = '';
        if (!empty($settings['url']['url'])) {
            $attr = 'href="' . $settings['url']['url'] . '"';
            $attr .= !empty($settings['url']['is_external']) ? ' target="_blank"' : '';
            $attr .= !empty($settings['url']['nofollow']) ? ' rel="nofollow"' : '';
        }

        if ($settings['url']['url']) {
            $btn = '<a class="rn-btn d-block" ' . $attr . '>' . $settings['detail_txt'] . '<i class="feather-arrow-right"></i></a>';

        }
        if ($settings['url']['url']) {
            $btn2 = '<a class="rn-btn" ' . $attr . '><span>' . $settings['detail_txt'] . '</span></a>';

        }

        $allowed_tags = wp_kses_allowed_html('post');
        $title = $settings['header_title'];
        $sub_title = $settings['sub_title'];
        $price = $settings['amount'];
        $description = $settings['description'];

        if ($settings['style'] == "1") {
            ?>
            <div class="rn-pricing">
                <div class="pricing-header">
                    <div class="header-left">
                        <h2 class="title"><?php echo esc_attr($title); ?></h2>
                        <span><?php echo esc_attr($sub_title); ?></span>
                    </div>
                    <div class="header-right">
                        <span><?php echo esc_attr($price); ?></span>
                    </div>
                </div>
                <div class="pricing-body">
                    <p class="description">
                        <?php echo esc_attr($description); ?>
                    </p>
                    <div class="check-wrapper">
                        <div class="left-area">
                            <?php foreach ($settings['option_list'] as $option): ?>
                                <div class="check d-flex">
                                    <i class="feather-check"></i>
                                    <p><?php echo esc_attr($option['list_title']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="right-area">
                            <?php foreach ($settings['option_list2'] as $option): ?>
                                <div class="check d-flex">
                                    <i class="feather-check"></i>
                                    <p><?php echo esc_attr($option['list_title2']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="pricing-footer">
                    <?php echo wp_kses_post($btn); ?>
                    <div class="time-line">
                        <div class="single-cmt d-flex">
                            <i class="feather-clock"></i>
                            <span> <?php echo esc_attr($settings['footer_txt1']); ?></span>
                        </div>
                        <div class="single-cmt d-flex">
                            <i class="feather-activity"></i>
                            <span> <?php echo esc_attr($settings['footer_txt2']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else { ?>
            <div class="rn-pricing-area pricing-style-2">
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" data-aos-once="true" class="">
                    <div class="pricing-wrapper">
                        <div class="ts-header">
                            <h6><?php echo esc_attr($title); ?></h6>
                            <span><?php echo esc_attr($sub_title); ?></span>
                        </div>
                        <h3 class="price"><?php echo esc_attr($price); ?></h3>
                        <div class="pricing-body">
                            <?php foreach ($settings['option_list3'] as $option_list):
                                $list_on = $option_list['list_on'] == 'yes' ? 'on' : 'off';

                                if ($option_list['list_on'] == 'yes') { ?>
                                    <div class="feature">
                                        <i class="feather-check"></i>
                                        <span class="name <?php echo esc_attr($list_on); ?>"><?php echo esc_attr($option_list['list_title3']); ?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="feature-check">
                                        <i class="feather-x x"></i>
                                        <span class="name <?php echo esc_attr($list_on); ?>"><?php echo esc_attr($option_list['list_title3']); ?></span>
                                    </div>
                                <?php } ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="pricing-footer">
                            <?php echo wp_kses_post($btn2); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php

        }

    }
}