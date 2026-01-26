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

class Rb_Progress extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-progress-share';
    }

    public function get_title()
    {
        return __('Progress Skill', 'rainbow-elements');
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
            'sk_layout',
            [
                'label' => __('Skill Header', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => __('Title Before', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Features', 'rainbow-elements'),
                'placeholder' => __('Features', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Design Skill', 'rainbow-elements'),
                'placeholder' => __('Design Skill', 'rainbow-elements'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'sec_skill_list',
            [
                'label' => esc_html__('Skill List', 'rainbow-elements'),

            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'skill_title',
            [
                'label' => esc_html__('Skill List Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('PHOTOSHOT.', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'skill_vle',
            [
                'label' => esc_html__('Progress Bar', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('95.', 'rainbow-elements'),
            ]
        );


        $this->add_control(
            'sc_skill_list',
            [
                'label' => esc_html__('Slide List', 'rainbow-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

                'default' => [

                    [
                        'skill_title' => esc_html__('PHOTOSHOT.', 'rainbow-elements'),
                        'skill_vle' => '100',
                    ],
                    [
                        'skill_title' => esc_html__('FIGMA', 'rainbow-elements'),
                        'skill_vle' => '95',
                    ],
                    [
                        'skill_title' => esc_html__('ADOBE XD.', 'rainbow-elements'),
                        'skill_vle' => '60',
                    ],
                    [
                        'skill_title' => esc_html__('ADOBE ILLUSTRATOR', 'rainbow-elements'),
                        'skill_vle' => '70',
                    ],
                    [
                        'skill_title' => esc_html__('DESIGN', 'rainbow-elements'),
                        'skill_vle' => '90',
                    ],

                ],
                'title_field' => '{{{ skill_title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'title_before_style_section',
            [
                'label' => esc_html__('Title Before', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_before_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .subtitle' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_before_font_size',
                'label' => esc_html__('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .subtitle',
            ]
        );

        $this->add_responsive_control(
            'title_before_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'title_before_padding',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .maintitle' => 'color: {{VALUE}}',

                ),
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => esc_html__('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .maintitle',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .maintitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .maintitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'skill_list_style_section',
            [
                'label' => esc_html__('Skill List ', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'skill_list_title_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .progress-charts h6.heading' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .progress-charts .progress .progress-bar span.percent-label' => 'color: {{VALUE}}',

                ),
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'skill_list_title_font_size',
                'label' => esc_html__('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .progress-charts h6.heading, {{WRAPPER}} .progress-charts .progress .progress-bar span.percent-label',
            ]
        );

        $this->add_responsive_control(
            'skill_list_title_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .progress-charts h6.heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .progress-charts .progress .progress-bar span.percent-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'skill_list_title_padding',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .progress-charts h6.heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}}  .progress-charts .progress .progress-bar span.percent-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings();
        $allowed_tags = wp_kses_allowed_html('post');
        $title = $settings['title'];

        ?>
        <div class="proggressbar-area">
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-aos-once="true"
                 class="progress-wrapper">
                <div class="content">
                    <span class="subtitle"><?php echo esc_attr($settings['sub_title']); ?></span>
                    <h4 class="maintitle"><?php echo esc_attr($settings['title']); ?></h4>
                    <?php foreach ($settings['sc_skill_list'] as $skill_list): ?>
                        <div class="progress-charts">
                            <h6 class="heading heading-h6"><?php echo esc_attr($skill_list['skill_title']); ?></h6>
                            <div class="progress">
                                <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".3s"
                                     role="progressbar"
                                     style="width: <?php echo esc_attr($skill_list['skill_vle']); ?>%"
                                     aria-valuenow="<?php echo esc_attr($skill_list['skill_vle']); ?>" aria-valuemin="0"
                                     aria-valuemax="<?php echo esc_attr($skill_list['skill_vle']); ?>"><span
                                            class="percent-label"><?php echo esc_attr($skill_list['skill_vle']); ?>%</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php

    }
}