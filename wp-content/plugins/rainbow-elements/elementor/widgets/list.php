<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;

use Elementor\Widget_Base;
use Elementor\Group_Control_Css_Filter;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\CHOOSE;
use Elementor\Icons_Manager;


if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Rb_List extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-list';
    }

    public function get_title()
    {
        return __('List', 'rainbow-elements');
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
            'sec_rainbow_list',
            [
                'label' => esc_html__('List', 'rainbow-elements'),

            ]
        );

        $this->add_control(
            'style',
            [
                'label' => __('Layout', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Layout 1', 'rainbow-elements'),
                    '2' => __('Layout 2', 'rainbow-elements'),
                ],
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Slide List Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Business Stratagy .', 'rainbow-elements'),
            ]
        );

        $repeater->add_control(
            'url',
            [
                'label' => esc_html__('List Url', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
            ]
        );

        $this->add_control(
            'sc_option_list',
            [
                'label' => esc_html__('Slide List', 'rainbow-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

                'default' => [

                    [
                        'title' => esc_html__('Business Stratagy .', 'rainbow-elements'),
                        'url' => '#',

                    ],
                    [
                        'title' => esc_html__('Business Development', 'rainbow-elements'),
                        'url' => '#',

                    ],
                    [
                        'title' => esc_html__('App Development.', 'rainbow-elements'),
                        'url' => '#',

                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'list_style_section',
            [
                'label' => esc_html__('List', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'list_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .single-card-sticky .card-list li a' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_control(
            'list_hover_color',
            [
                'label' => esc_html__('Hover Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .single-card-sticky .card-list li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-card-sticky .card-list li a svg' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_font_size',
                'label' => esc_html__('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .single-card-sticky .card-list li a',
            ]
        );

        $this->add_responsive_control(
            'list_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .single-card-sticky .card-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'list_padding',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}}  .single-card-sticky .card-list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

    }

    protected function render()
    {
        $settings = $this->get_settings();

        if ($settings['style'] == '1') { ?>
            <div class="sticky-home-wrapper">
                <div class="single-card-sticky">
                    <ul class="card-list">
                        <?php foreach ($settings['sc_option_list'] as $sc_option_list): ?>
                            <li>
                                <a href="<?php echo esc_url($sc_option_list['url']['url']); ?>">
                                    <?php echo esc_attr($sc_option_list['title']); ?>
                                    <i class="feather-arrow-right"></i>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php } else { ?>
            <ul class="about-skill-style mb--40">
                <?php foreach ($settings['sc_option_list'] as $sc_option_list): ?>
                    <li><i class="feather-check"></i><span> <?php echo esc_attr($sc_option_list['title']); ?> </span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <?php
        }

    }
}