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
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Icon_Box extends Widget_Base
{

    public function get_name()
    {
        return 'wooc-icon-box';
    }

    public function get_title()
    {
        return __('Services Icon Box', 'rainbow-elements');
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
            'icon_layout',
            [
                'label' => __('General', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label' => __('Layout', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Layout 1 ( Single Image )', 'rainbow-elements'),
                    '2' => __('Layout 2', 'rainbow-elements'),

                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Title', 'rainbow-elements'),
                'placeholder' => __('Title', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => __('Sub Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Sub title', 'rainbow-elements'),
                'placeholder' => __('Sub title', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'icontype',
            [
                'label' => __('Style', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => esc_html__('Icon', 'rainbow-elements'),
                    'image' => esc_html__('Custom Image', 'rainbow-elements'),
                ],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __('Icons', 'rainbow-elements'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-university',
                    'library' => 'solid',
                ],
                'condition' => [
                    'icontype' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Image', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'icontype' => 'image',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'large',
                'separator' => 'none',
                'condition' => [
                    'icontype' => 'image',
                ],
            ]
        );


        $this->add_control(
            'detail_txt',
            [
                'label' => esc_html__('Detail Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Shop Now',
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
                    '{{WRAPPER}} .item-title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'condition' => array('title_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .item-title',
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
                    '{{WRAPPER}} .item-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => __('Content or Subtitle', 'rainbow-elements'),
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
                    '{{WRAPPER}} .item-subtitle' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'condition' => array('subtitle_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .item-subtitle',
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
                    '{{WRAPPER}} .item-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings();

        $attr = $btn = '';
        if (!empty($settings['url']['url'])) {
            $attr = 'href="' . $settings['url']['url'] . '"';
            $attr .= !empty($settings['url']['is_external']) ? ' target="_blank"' : '';
            $attr .= !empty($settings['url']['nofollow']) ? ' rel="nofollow"' : '';
        }
        if ($settings['url']['url']) {

            $btn = '<a class="item-btn btn-fill-primary" ' . $attr . '><span class="btn-text">' . $settings['detail_txt'] . '</span><span class="btn-icon"><i class="fas fa-long-arrow-alt-right"></i></span></a>';

            $title = '<a' . $attr . '>' . $settings['title'] . '</a>';

        } else {
            $title = $settings['title'];
        }
        $allowed_tags = wp_kses_allowed_html('post');

        if ('1' == $settings['layout']) { ?>
            <div class="service-grid">
                <?php if ($settings['icontype'] == 'image'): ?>
                    <div class="img-box icon">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                    </div>
                <?php else: ?>
                    <div class="icon">
                        <?php Icons_Manager::render_icon($settings['icon']); ?>
                    </div>
                <?php endif; ?>

                <div class="content">

                    <?php if ($settings['title']): ?>
                        <h5 class="title">
                            <a <?php echo wp_kses_post($attr); ?>><?php echo wp_kses_post($settings['title']); ?></a>
                        </h5>
                    <?php endif; ?>

                    <?php if ($settings['subtitle']): ?>
                        <p class="item-subtitle"><?php echo wp_kses_post($settings['subtitle']); ?></p>
                    <?php endif; ?>
                    <div class="more-btn">
                        <?php echo wp_kses($btn, $allowed_tags); ?>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="service-features">
                <div class="single-service">
                    <?php if ($settings['icontype'] == 'image'): ?>
                        <div class="img-box icon">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                        </div>
                    <?php else: ?>
                        <div class="icon">
                            <?php Icons_Manager::render_icon($settings['icon']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <?php if ($settings['title']): ?>
                            <h6 class="title"><?php echo wp_kses_post($title); ?></h6>
                        <?php endif; ?>
                        <p><?php echo wp_kses_post($settings['subtitle']); ?></p>
                    </div>
                </div>
            </div>
            <?php

        }
    }
}