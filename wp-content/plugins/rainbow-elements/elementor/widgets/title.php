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
class Title extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-title';
    }

    public function get_title()
    {
        return __('Section Title', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-post-title';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'title_section',
            [
                'label' => __('Section Title ', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => __('Layout', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style One', 'rainbow-elements'),
                    '2' => __('Style Two', 'rainbow-elements'),
                    '3' => __('Style Three ( sticky )', 'rainbow-elements'),

                ],
                'prefix_class' => 'rainbow-title-',
            ]
        );


        $this->add_responsive_control(
            'title_align',
            [
                'label' => __('Text Alignment', 'rainbow-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'rainbow-elements'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'rainbow-elements'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'rainbow-elements'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                
                'default' => 'left',
            ]
        );


        $this->add_responsive_control(
            'sec_title_tag',
            [
                'label' => __('Title HTML Tag', 'rainbow-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'rainbow-elements'),
                        'icon' => 'eicon-editor-h6'
                    ],
                    'div' => [
                        'title' => esc_html__('div', 'rainbow-elements'),
                        'icon' => 'eicon-font'
                    ]
                ],
                'default' => 'h2',

            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => __('Title Before', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Type your Description here.', 'rainbow-elements'),
                'condition' => array('style' => array('1', '3')),
                'default' => esc_html__('Why Choose Us', 'rainbow-elements'),

            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Type your title here...', 'rainbow-elements'),
                'default' => esc_html__('Section title here', 'rainbow-elements'),
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
                    '{{WRAPPER}} .sec-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sticky-home-wrapper h5.title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .sec-title, {{WRAPPER}} .sticky-home-wrapper h5.title',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sticky-home-wrapper h5.title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sub_title_style_section',
            [
                'label' => __('Sub Title', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => array('style' => array('1', '3')),
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .sub-title',
            ]
        );

        $this->add_responsive_control(
            'sub_title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings();

        if ($settings['style'] == "1") {
            ?>
        <div class="section-title text-<?php echo wp_kses_post($settings['title_align']); ?> "
             data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true">
            <?php if ($settings['sub_title']) { ?>
                <span class="subtitle sub-title"><?php echo wp_kses_post($settings['sub_title']); ?></span>
            <?php } ?>
            <?php if ($settings['title']) { ?>
                <<?php echo esc_html($settings['sec_title_tag']); ?> class="title sec-title"><?php echo wp_kses_post($settings['title']); ?></<?php echo esc_html($settings['sec_title_tag']); ?>>
            <?php } ?>
            </div>
        <?php } elseif ($settings['style'] == "2") { ?>
            <div class="sticky-home-wrapper">
                <div class="rn-about-area">
                    <div class="inner text-<?php echo wp_kses_post($settings['title_align']); ?>">
                        <h5 class="title">
                            <?php echo wp_kses_post($settings['title']); ?>
                        </h5>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="position-sticky sticky-top rbt-sticky-top-adjust">
                <div class="section-title text-<?php echo wp_kses_post($settings['title_align']); ?> ">
                    <?php if ($settings['sub_title']) { ?>
                        <span class="subtitle sub-title"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                    <?php } ?>
                    <?php if ($settings['title']){ ?>
                    <<?php echo esc_html($settings['sec_title_tag']); ?> class="title sec-title">
                    <?php echo wp_kses_post($settings['title']); ?>
                </<?php echo esc_html($settings['sec_title_tag']); ?>>
                <?php } ?>
            </div>
            </div>
            <?php
        }
    }
}
