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

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Poster_banner extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-poster-banner';
    }

    public function get_title()
    {
        return esc_html__('Poster Banner', 'rainbow-elements');
    }

    public function get_icon()
    {
        return ' eicon-image-box';
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
                'label' => esc_html__('General Content', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'style',
            [
                'label' => esc_html__('Layout', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'style-one',
                'options' => [
                    'style-one' => esc_html__('Style 1', 'rainbow-elements'),
                    'style-two' => esc_html__('Style 2', 'rainbow-elements'),
                    'style-three' => esc_html__('Style 3', 'rainbow-elements'),
                    'style-four' => esc_html__('Style 4', 'rainbow-elements'),
                    'style-five' => esc_html__('Style 5', 'rainbow-elements'),

                ],
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label' => esc_html__('Box Height', 'rainbow-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'desktop_default' => [
                    'size' => 350,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 180,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 160,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-poster' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('- Welcome to inbio', 'rainbow-elements'),
                'placeholder' => esc_html__('Title', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Before / Sub Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Sub title', 'rainbow-elements'),
                'placeholder' => esc_html__('Sub title', 'rainbow-elements'),
            ]
        );


        $this->add_responsive_control(
            'radius',
            [
                'label' => esc_html__('Border Radius', 'rainbow-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],

                'devices' => ['desktop', 'tablet', 'mobile'],
                'desktop_default' => [
                    'size' => 40,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 40,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 40,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-poster' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'sec_bg',
            [
                'label' => esc_html__('Background', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'full',
                'separator' => 'none',

            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'poster_linking',
            [
                'label' => esc_html__('Poster Link', 'rainbow-elements'),

            ]
        );


        $this->add_control(
            'posterurl',
            [
                'label' => esc_html__('Detail URL', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'sec_style_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                ],
                'selectors' => array(
                    '{{WRAPPER}} .title' => 'color: {{VALUE}} !important',

                ),

            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .poster-content .info-subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-poster .inner .sub-title::before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .single-poster .inner .sub-title' => 'color: {{VALUE}}',
                ),

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sec_typography_type',
            [
                'label' => esc_html__('Title Typography', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__('Title Typography', 'rainbow-elements'),
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_responsive_control(
            'title_typo_margin',
            [
                'label' => esc_html__('Title Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__('Subtitle Typography', 'rainbow-elements'),
                'devices' => ['desktop', 'tablet', 'mobile'],
                'label' => esc_html__('Subtitle', 'rainbow-elements'),
                'selector' => '{{WRAPPER}} .info-subtitle',
            ]
        );

        $this->add_responsive_control(
            'subtitle_typo_margin',
            [
                'label' => esc_html__('Subtitle Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .single-poster .inner  .info-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .single-poster .inner .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings();
        $attr = '';
        if (!empty($settings['posterurl']['url'])) {
            $attr = 'href="' . $settings['posterurl']['url'] . '"';
            $attr .= !empty($settings['posterurl']['is_external']) ? ' target="_blank"' : '';
            $attr .= !empty($settings['posterurl']['nofollow']) ? ' rel="nofollow"' : '';
        }
        $wrapper_start = '<div class="es-item">';
        $wrapper_end = '</div>';
        if ($settings['posterurl']['url']) {
            $wrapper_start = '<a class="es-item" ' . $attr . '>';
            $wrapper_end = '</a>';
        }
        if ($settings['style'] == 'style-one') {
            ?>
            <div class="single-poster mb--0">
                <?php echo wp_kses_post($wrapper_start); ?>
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                <div class="poster-content">
                    <div class="inner">
                        <h2 class="title <?php echo wp_kses_post($settings['style']); ?>"><?php echo wp_kses_post($settings['title']); ?></h2>
                        <?php if ($settings['subtitle']): ?>
                            <span class="sub-title info-subtitle"><?php echo wp_kses_post($settings['subtitle']); ?></span>
                        <?php endif; ?>

                    </div>
                </div>
                <?php echo wp_kses_post($wrapper_end); ?>
            </div>
        <?php } elseif ($settings['style'] == 'style-two') { ?>
            <div class="single-poster">
                <?php echo wp_kses_post($wrapper_start); ?>
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                <div class="poster-content">
                    <div class="inner">
                        <h2 class="title h3 <?php echo wp_kses_post($settings['style']); ?>"><?php echo wp_kses_post($settings['title']); ?></h2>
                        <?php if ($settings['subtitle']): ?>
                            <span class="sub-title info-subtitle"><?php echo wp_kses_post($settings['subtitle']); ?></span>
                        <?php endif; ?>

                    </div>
                </div>
                <?php echo wp_kses_post($wrapper_end); ?>
            </div>
        <?php } elseif ($settings['style'] == 'style-three') { ?>
            <div class="single-poster poster-style-two mb--0">
                <?php echo wp_kses_post($wrapper_start); ?>
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                <div class="poster-content">
                    <div class="inner">
                        <h2 class="title h2 heading-color <?php echo wp_kses_post($settings['style']); ?>"><?php echo wp_kses_post($settings['title']); ?></h2>
                        <?php if ($settings['subtitle']): ?>
                            <span class="info-subtitle sub-title primary-color"><?php echo wp_kses_post($settings['subtitle']); ?></span>
                        <?php endif; ?>

                    </div>
                </div>
                <?php echo wp_kses_post($wrapper_end); ?>
            </div>
        <?php } elseif ($settings['style'] == 'style-four') { ?>
            <div class="single-poster poster-style-two mb--0">
                <?php echo wp_kses_post($wrapper_start); ?>
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                <div class="poster-content content-bottom-left">
                    <div class="inner">
                        <h2 class="title h3  <?php echo wp_kses_post($settings['style']); ?>"><?php echo wp_kses_post($settings['title']); ?></h2>
                        <?php if ($settings['subtitle']): ?>
                            <span class="info-subtitle sub-title "><?php echo wp_kses_post($settings['subtitle']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php echo wp_kses_post($wrapper_end); ?>
            </div>
        <?php } elseif ($settings['style'] == 'style-five') { ?>
            <div class="single-poster mb--0">
                <?php echo wp_kses_post($wrapper_start); ?>
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                <div class="poster-content">
                    <div class="inner">
                        <h2 class="title h3  <?php echo wp_kses_post($settings['style']); ?>"><?php echo wp_kses_post($settings['title']); ?></h2>
                        <?php if ($settings['subtitle']): ?>
                            <span class="info-subtitle sub-title "><?php echo wp_kses_post($settings['subtitle']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php echo wp_kses_post($wrapper_end); ?>
            </div>
        <?php } else { ?>
            <div class="single-poster poster-style-two mb--0">
                <?php echo wp_kses_post($wrapper_start); ?>
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                <div class="poster-content">
                    <div class="inner">
                        <h2 class="title h3  <?php echo wp_kses_post($settings['style']); ?>"><?php echo wp_kses_post($settings['title']); ?></h2>
                        <?php if ($settings['subtitle']): ?>
                            <span class="info-subtitle sub-title "><?php echo wp_kses_post($settings['subtitle']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php echo wp_kses_post($wrapper_end); ?>
            </div>
            <?php
        }
    }
}

