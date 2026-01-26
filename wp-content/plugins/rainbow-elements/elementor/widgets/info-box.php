<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;

use Elementor\Widget_Base; 
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
  
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Info_Box extends Widget_Base
{

    public function get_name()
    {
        return 'wooc-info-box';
    }

    public function get_title()
    {
        return esc_html__('Info Banner', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'info-layout',
            [
                'label' => esc_html__('General', 'rainbow-elements'),
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
            'subtitle',
            [
                'label' => esc_html__('Before Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Sub title', 'rainbow-elements'),
                'placeholder' => esc_html__('Sub title', 'rainbow-elements'),
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

        $this->add_responsive_control(
            'height',
            [
                'label' => esc_html__('Banner Height', 'rainbow-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'desktop_default' => [
                    'size' => 700,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 650,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 500,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .info-box' => 'height: {{SIZE}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .info-box' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'sec_bg',
            [
                'label' => esc_html__('Background', 'rainbow-elements'),
                'condition' => array('layout' => '1'),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'rainbow-elements'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .info-box',
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
                'selectors' => array(
                    '{{WRAPPER}} .info-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .wooc-title' => 'color: {{VALUE}}'
                ),

            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Before Title Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .info-subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .wooc-subtitle' => 'color: {{VALUE}}'
                ),

            ]
        );


        $this->end_controls_section();
        $this->start_controls_section(
            'search_layout_img',
            [
                'label' => __('Banner Images', 'rainbow-elements'),
                'condition' => array('layout' => '2'),
            ]
        );

        $this->add_control(
            'image1',
            [
                'label' => __('Image 1', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );
        $this->add_control(
            'image2',
            [
                'label' => __('Image 2', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );
        $this->add_control(
            'image3',
            [
                'label' => __('Image 3', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );
        $this->add_control(
            'image4',
            [
                'label' => __('Image 4', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'sec_typography_type',
            [
                'label' => esc_html__('Typography', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__('Title Typography', 'rainbow-elements'),
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selector' => '{{WRAPPER}} .info-title',
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
                    '{{WRAPPER}}  .info-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__('Before Title Typography', 'rainbow-elements'),
                'devices' => ['desktop', 'tablet', 'mobile'],
                'label' => esc_html__('Subtitle', 'rainbow-elements'),
                'selector' => '{{WRAPPER}} .info-subtitle',
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
            $btn = '<a class="rainbow-btn" ' . $attr . '>' . $settings['detail_txt'] . '</a>';
        }
        $allowed_tags = wp_kses_allowed_html('post');

        $simage1 = $settings['image1']['url'];
        $simage2 = $settings['image2']['url'];
        $simage3 = $settings['image3']['url'];
        $simage4 = $settings['image4']['url'];
        ?>
        <div class="rainbow-slider-area">
            <div class="rainbow-slider info-box has-radius-wrapper  bg-tertiary bg-gradient-7">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="inner text-left">
                            <?php if ($settings['subtitle']): ?>
                                <span class="info-subtitle title-highlighter mb--10"><?php echo wp_kses($settings['subtitle'], $allowed_tags); ?></span>
                            <?php endif; ?>
                            <h1 class="h2 info-title"> <?php echo wp_kses($settings['title'], $allowed_tags); ?></h1>
                            <?php echo wp_kses($btn, $allowed_tags); ?>
                        </div>
                    </div>
                </div>
                <?php if ('2' == $settings['layout']): ?>
                    <div class="slider-bg-thumb">
                        <img src="<?php echo esc_url($simage1); ?>" class="thumb thumb1" alt="Women"
                             data-sal="slide-right" data-sal-duration="1000" data-sal-delay="400">
                        <img src="<?php echo esc_url($simage2); ?>" class="thumb thumb2" alt="Women"
                             data-sal="slide-left" data-sal-duration="1000" data-sal-delay="400">
                        <img src="<?php echo esc_url($simage3); ?>" class="thumb thumb3" alt="Women" data-sal="slide-up"
                             data-sal-duration="1000" data-sal-delay="300">
                        <img src="<?php echo esc_url($simage4); ?>" class="thumb thumb4" alt="Women" data-sal="zoom-out"
                             data-sal-duration="1000" data-sal-delay="900">
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}

?>
