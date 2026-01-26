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

class Rainbow_Our_Services extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-services-table';
    }

    public function get_title()
    {
        return __('Services Box', 'rainbow-elements');
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
            'services_layout',
            [
                'label' => __('Services Info', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => __('Layout', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Layout One', 'rainbow-elements'),
                    '2' => __('Layout Two', 'rainbow-elements'),
                ],
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Header Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('From Cleaning to Disposal', 'rainbow-elements'),
                'placeholder' => __('Title', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.', 'rainbow-elements'),
                'placeholder' => __('Sub  Title', 'rainbow-elements'),
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

        $this->add_control(
            'icontype',
            [
                'label' => __('Style', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'image',
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


        $this->end_controls_section();


        $this->start_controls_section(
            'icon_style_section',
            [
                'label' => __('Icon', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .rn-service .inner .icon svg, {{WRAPPER}} .rn-service .inner .icon i, {{WRAPPER}} .service-card-one .inner svg, {{WRAPPER}} .service-card-one .inner i' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .rn-service .inner .icon svg, {{WRAPPER}}  .rn-service .inner .icon i, {{WRAPPER}} .service-card-one .inner svg, {{WRAPPER}} .service-card-one .inner i',
            ]
        );

        $this->add_responsive_control(
            'icon_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .rn-service .inner .icon svg, {{WRAPPER}}  .rn-service .inner .icon,  {{WRAPPER}} .service-card-one .inner svg, {{WRAPPER}} .service-card-one .inner i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
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
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .rn-service:hover .inner .content .read-more-button:hover' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
            'subtitle_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .rn-service .inner .content p.description, {{WRAPPER}} .service-card-one .inner p.describe' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .rn-service .inner .content p.description, {{WRAPPER}} .service-card-one .inner p.describe',
            ]
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .rn-service .inner .content p.description, {{WRAPPER}} .service-card-one .inner p.describe' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'link_style_section',
            [
                'label' => __('Link', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => '2',
                ],
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .inner .content .read-more-button i' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'link_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .inner .content .read-more-button i',
            ]
        );

        $this->add_responsive_control(
            'link_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .content .read-more-button i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
        $title = $settings['title'];
        if ($settings['url']['url']) {
            $btn = '<a class="read-more-button" ' . $attr . '><i class="feather-arrow-right"></i></a>';
            $btn2 = '<a class="over-link" ' . $attr . '></a>';
            $title = '<a ' . $attr . '>' . $title . '</a>';
        }
        $allowed_tags = wp_kses_allowed_html('post');

        $sub_title = $settings['sub_title'];


        if ($settings['style'] == "1") { ?>
            <div class="service-card-one border-style">
                <div class="inner">
                    <?php if ($settings['icontype'] == 'image'): ?>
                        <div class="img-box icon">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                        </div>
                    <?php else: ?>
                        <div class="icon icon-box">
                            <?php Icons_Manager::render_icon($settings['icon']); ?>
                        </div>
                    <?php endif; ?>

                    <h6 class="title color-lightn">
                        <?php echo wp_kses($title, $allowed_tags); ?>
                    </h6>
                    <?php if ($sub_title): ?>
                        <p class="describe">
                            <?php echo wp_kses($sub_title, $allowed_tags); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        <?php } else { ?>

            <div class="rn-service">
                <div class="inner">
                    <?php if ($settings['icontype'] == 'image'): ?>
                        <div class="img-box icon">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                        </div>
                    <?php else: ?>
                        <div class="icon icon-box">
                            <?php Icons_Manager::render_icon($settings['icon']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <h4 class="title"> <?php echo wp_kses($title, $allowed_tags); ?></h4>
                        <p class="description"> <?php echo wp_kses($sub_title, $allowed_tags); ?></p>
                        <?php echo wp_kses($btn, $allowed_tags); ?>
                    </div>
                </div>

            </div>
            <?php
        }
    }
}