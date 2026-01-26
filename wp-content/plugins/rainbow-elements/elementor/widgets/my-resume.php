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

class Rb_My_Resume extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-my-resume';
    }

    public function get_title()
    {
        return __('My Resume ', 'rainbow-elements');
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
            'resume_layout',
            [
                'label' => __('Resume Header', 'rainbow-elements'),
            ]
        );


        $this->add_control(
            'resume_title',
            [
                'label' => __('Resume Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Education Quality', 'rainbow-elements'),
                'placeholder' => __('Resume Title', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => '2007 - 2010',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sec_option_list',
            [
                'label' => esc_html__('Resume List', 'rainbow-elements'),

            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Personal Portfolio April Fools', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('University of DVI (1997 - 2001))', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'subject_date',
            [
                'label' => esc_html__('Subject Date', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('4.30/5', 'rainbow-elements'),
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Subject Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('The education should be very interactual. Ut tincidunt est ac dolor aliquam sodales. Phasellus sed mauris hendrerit, laoreet sem in, lobortis mauris hendrerit ante.', 'rainbow-elements'),
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
                        'title' => esc_html__('Personal Portfolio April Fools', 'rainbow-elements'),
                    ],
                    [
                        'title' => esc_html__('Examples Of Personal Portfolio', 'rainbow-elements'),
                    ],
                    [
                        'title' => esc_html__('Tips For Personal Portfolio', 'rainbow-elements'),
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'title_before_style_section',
            [
                'label' => __('Title Before', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_before_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .content span.subtitle' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_before_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}}  .content span.subtitle',
            ]
        );

        $this->add_responsive_control(
            'title_before_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .content span.subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}}  .content span.subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Section Title', 'rainbow-elements'),
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
                    '{{WRAPPER}}  .content .maintitle' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}}  .content .maintitle',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .content .maintitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}}  .content .maintitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}}  .resume-single-list .inner .heading .title h4' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .resume-single-list .inner .heading .title h4',
            ]
        );

        $this->add_responsive_control(
            'list_title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .resume-single-list .inner .heading .title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}}  .resume-single-list .inner .heading .title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'list_subtitle_style_section',
            [
                'label' => __('List Sub Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'list_subtitle_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}}  .resume-single-list .inner .heading .title .list-sub-title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_subtitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .resume-single-list .inner .heading .title .list-sub-title',
            ]
        );

        $this->add_responsive_control(
            'list_subtitle_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .resume-single-list .inner .heading .title .list-sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'list_subtitle_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .resume-single-list .inner .heading .title .list-sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'list_content_style_section',
            [
                'label' => __('List Sub Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'list_content_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}}  .resume-single-list .inner p.description' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_content_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .resume-single-list .inner p.description',
            ]
        );

        $this->add_responsive_control(
            'list_content_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .resume-single-list .inner p.description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'list_content_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .resume-single-list .inner  p.description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'date_time_style_section',
            [
                'label' => __('Date-of-time', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'list_date_time_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .resume-single-list .inner .heading .date-of-time span' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_date_time_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .resume-single-list .inner .heading .date-of-time span',
            ]
        );

        $this->add_responsive_control(
            'list_date_time_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .resume-single-list .inner .heading .date-of-time span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'list_date_time_padding',
            [
                'label' => __('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .resume-single-list .inner .heading .date-of-time span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $allowed_tags = wp_kses_allowed_html('post');
        $resume_title = $settings['resume_title'];
        $sub_title = $settings['sub_title'];
        ?>

        <div class="personal-experience-inner">
            <div class="content">
                <span class="subtitle"><?php echo esc_attr($sub_title); ?></span>
                <h4 class="maintitle"><?php echo esc_attr($resume_title); ?></h4>
                <div class="experience-list">
                    <?php foreach ($settings['option_list'] as $option): ?>
                        <!-- Start Single List  -->
                        <div class="resume-single-list">
                            <div class="inner">
                                <div class="heading">
                                    <div class="title">
                                        <h4 class="list-title"><?php echo wp_kses_post($option['title']); ?></h4>
                                        <span class="list-sub-title"><?php echo wp_kses_post($option['sub_title']); ?></span>
                                    </div>
                                    <div class="date-of-time">
                                        <span><?php echo wp_kses_post($option['subject_date']); ?></span>
                                    </div>
                                </div>
                                <p class="description">
                                    <?php echo wp_kses_post($option['content']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php

    }
}