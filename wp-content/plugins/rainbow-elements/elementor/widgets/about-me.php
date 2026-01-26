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
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\DATE_TIME;
use Elementor\SLIDER;
use Elementor\CHOOSE;
use Elementor\Icons_Manager;


if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Rb_About_Me extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-about-me';
    }

    public function get_title()
    {
        return __('About Me ', 'rainbow-elements');
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
            'about_layout',
            [
                'label' => __('About Header', 'rainbow-elements'),
            ]
        );


        $this->add_control(
            'style',
            [
                'label' => esc_html__('Style', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Layout One', 'rainbow-elements'),
                    '2' => esc_html__('Layout Two', 'rainbow-elements'),
                    '3' => esc_html__('Layout Three', 'rainbow-elements'),
                    '4' => esc_html__('Layout Four', 'rainbow-elements'),
                    '5' => esc_html__('Layout Five', 'rainbow-elements'),
                    '6' => esc_html__('Layout Six', 'rainbow-elements'),
                ],
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Welcome to my world', 'rainbow-elements'),
                'condition' => array('style' => array('1', '2')),
            ]
        );

        $this->add_control(
            'about_title',
            [
                'label' => __('After Name Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Hi, I’m', 'rainbow-elements'),
                'placeholder' => __('Hi, I’m', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => __('Name', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Jone Lee', 'rainbow-elements'),
                'placeholder' => __('Jone Lee', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'about_title2',
            [
                'label' => __('Before Name Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('a', 'rainbow-elements'),
                'placeholder' => __('a', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => __('Content', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('I use animation as a third dimension by which to simplify experiences and kuiding thro each and every interaction. I’m not adding motion just to spruce things up, but doing it in ways that.', 'rainbow-elements'),
                'placeholder' => __('Content', 'rainbow-elements'),
            ]
        );


        $this->add_control(
            'bgimage',
            [
                'label' => __('Background Image', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => array('style' => array('3')),
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );

        $this->add_control(
            'myimage',
            [
                'label' => __('Image', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => array('style' => array('4', '5')),
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );

        $this->add_control(
            'detail_txt',
            [
                'label' => esc_html__('Detail Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CONTACT ME', 'rainbow-elements'),
                'condition' => array('style' => array('3', '4')),
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => esc_html__('Detail URL', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
                'condition' => array('style' => array('3', '4')),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'sec_info_list',
            [
                'label' => esc_html__('Contact Info', 'rainbow-elements'),
                'condition' => array('style' => array('6')),

            ]
        );

        $this->add_control(
            'designation',
            [
                'label' => __('Designation', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Web designer & developer', 'rainbow-elements'),
                'placeholder' => __('Web designer & developer', 'rainbow-elements'),
            ]
        );


        $this->add_control(
            'email',
            [
                'label' => __('Email', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('john.slady@gmail.coms', 'rainbow-elements'),
                'placeholder' => __('john.slady@gmail.coms', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'address',
            [
                'label' => __('Address', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Paris fan', 'rainbow-elements'),
                'placeholder' => __('Paris fan', 'rainbow-elements'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sec_option_list',
            [
                'label' => esc_html__('Clip  List', 'rainbow-elements'),
                'condition' => array('style' => array('1', '2', '3', '4')),

            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Slide List Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Developer.', 'rainbow-elements'),
            ]
        );


        $this->add_control(
            'cd_option_list',
            [
                'label' => esc_html__('Slide List', 'rainbow-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

                'default' => [

                    [
                        'title' => esc_html__('Developer.', 'rainbow-elements'),
                    ],
                    [
                        'title' => esc_html__('Professional Coder.', 'rainbow-elements'),
                    ],
                    [
                        'title' => esc_html__('Developer.', 'rainbow-elements'),
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => __('Title Beore', 'rainbow-elements'),
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
                    '{{WRAPPER}} span.subtitle' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} span.subtitle',
            ]
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} span.subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}} .inner .title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .banner-inner h1' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .inner .title .header-caption span' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_control(
            'title_name_color',
            [
                'label' => __('Name Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .inner .title > span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .banner-inner h1' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .inner .title, {{WRAPPER}} .banner-inner h1, {{WRAPPER}} .inner .title .cd-headline',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .banner-inner h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __('Content or Subtitle', 'rainbow-elements'),
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
                    '{{WRAPPER}} .inner .description' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .inner .description',
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .inner .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );


        $this->end_controls_section();

    }

    private function slick_load_scripts()
    {
        wp_enqueue_script('particles-js');
        wp_enqueue_script('inbio-has-app');
    }


    protected function render()
    {
        $settings = $this->get_settings();
        $allowed_tags = wp_kses_allowed_html('post');
        $sub_title = $settings['sub_title'];
        $about_title = $settings['about_title'];
        $name = $settings['name'];
        $content = $settings['content'];
        $about_title2 = $settings['about_title2'];

        if ($settings['style'] == "3") {

            $attr = $btn = '';
            if (!empty($settings['url']['url'])) {
                $attr = 'href="' . $settings['url']['url'] . '"';
                $attr .= !empty($settings['url']['is_external']) ? ' target="_blank"' : '';
                $attr .= !empty($settings['url']['nofollow']) ? ' rel="nofollow"' : '';
            }
            if ($settings['url']['url']) {
                $btn = '<a class="rn-btn shadow-none" ' . $attr . '><span>' . $settings['detail_txt'] . '</span></a>';
            }
            $background = $settings['bgimage']['url'];
            $this->slick_load_scripts();
            ?>
            <div style="background-image: url(<?php echo esc_url($background); ?>);"
                 class="slider-style-6 height--100 rn-section-gap align-items-center with-particles bg_image--8 bg_image attachment"
                 data-black-overlay="5">
                <div class="particles-js" id="particles-js"></div>
                <div class="wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="banner-inner text-center">
                                <h1 class="fs--100"><?php echo esc_attr($about_title); ?>
                                    <span><?php echo esc_attr($name); ?></span></h1>
                                <!-- type headline start-->
                                <span class="cd-headline clip is-full-width">
                                <span><?php echo esc_attr($about_title2); ?></span>
                                    <!-- ROTATING TEXT -->
                            <span class="cd-words-wrapper">
                                <?php
                                $i = "";
                                $i == 1;
                                foreach ($settings['cd_option_list'] as $cd_option_list):
                                    $vihi = $i == 1 ? 'visible' : 'hidden';
                                    $i++;
                                    $slide_title = $cd_option_list['title'];
                                    ?>
                                    <b class="is-<?php echo esc_attr($vihi); ?>"><?php echo esc_attr($slide_title); ?></b>
                                <?php endforeach; ?>
                                </span>
                            </span>
                                <!-- type headline end -->
                                <div class="button-area">
                                    <?php echo wp_kses($btn, $allowed_tags); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php } elseif ($settings['style'] == "4") {
            $attr = $btn = $btn2 = '';
            if (!empty($settings['url']['url'])) {
                $attr = 'href="' . $settings['url']['url'] . '"';
                $attr .= !empty($settings['url']['is_external']) ? ' target="_blank"' : '';
                $attr .= !empty($settings['url']['nofollow']) ? ' rel="nofollow"' : '';
            }
            if ($settings['url']['url']) {
                $btn = '<a class="rn-btn shadow-none" ' . $attr . '><span>' . $settings['detail_txt'] . '</span></a>';
            }
            if ($settings['url']['url']) {
                $btn2 = '<a class="rn-btn" ' . $attr . '><span>' . $settings['detail_txt'] . '</span></a>';
            }
            $allowed_tags = wp_kses_allowed_html('post');
            $this->slick_load_scripts();
            $myimage = $settings['myimage']['url'];

            ?>
            <!-- start slider area -->
            <div class="slider-style-5 rn-section-gap pb--110 align-items-center with-particles">
                <div class="particles-js" id="particles-js"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-inner text-center">
                                <?php if ($myimage): ?>
                                    <div class="thumbnail gradient-border gradient-animation">
                                        <img id="border" class="gradient-border" src="<?php echo esc_url($myimage); ?>"
                                             alt="<?php echo esc_attr($name); ?>">
                                    </div>
                                <?php endif; ?>

                                <h1><?php echo esc_attr($about_title); ?> <span><?php echo esc_attr($name); ?></span>
                                </h1>
                                <!-- type headline start-->
                                <span class="cd-headline clip is-full-width">
                                        <span><?php echo esc_attr($about_title2); ?></span>
                                    <!-- ROTATING TEXT -->
                                    <span class="cd-words-wrapper">
                                        <?php
                                        $i = "";
                                        $i == 1;
                                        foreach ($settings['cd_option_list'] as $cd_option_list):
                                            $vihi = $i == 1 ? 'visible' : 'hidden';
                                            $i++;
                                            $slide_title = $cd_option_list['title'];
                                            ?>
                                            <b class="is-<?php echo esc_attr($vihi); ?>"><?php echo esc_attr($slide_title); ?></b>
                                        <?php endforeach; ?>
                                        </span>
                                    </span>
                                <!-- type headline end -->
                                <div class="button-area">
                                    <?php echo wp_kses($btn2, $allowed_tags); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start slider area End -->

        <?php } elseif ($settings['style'] == "5") {
            $myimage = $settings['myimage']['url'];
            ?>

            <div class="d-flex flex-wrap align-content-start h-100">
                <div class="sticky-top-slider position-sticky sticky-top rbt-sticky-top-adjust-two">
                    <div class="banner-details-wrapper-sticky slide pb-0">

                        <?php if ($myimage): ?>
                            <div class="thumbnail">
                                <img id="border" class="gradient-border" src="<?php echo esc_url($myimage); ?>"
                                     alt="<?php echo esc_attr($name); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="banner-title-area pt--30">
                            <h1 class="title"><?php echo esc_attr($about_title); ?>
                                <span><?php echo esc_attr($name); ?></span><br><span
                                        class="span"> <?php echo esc_attr($about_title2); ?></span></h1>
                            <p class="disc"><?php echo esc_attr($content); ?></p>
                        </div>


                    </div>
                </div>
            </div>
        <?php } elseif ($settings['style'] == "6") { ?>

            <div class="slide slider-style-3 pb-0">
                <div class="slider-wrapper pt-0">
                    <div class="slider-info">
                        <div class="user-info-top">
                            <div class="user-info-header">
                                <div class="user">
                                    <i class="feather-user"></i>
                                </div>
                                <h2 class="title">
                                    <?php echo esc_attr($about_title); ?> <span><?php echo esc_attr($name); ?></span>
                                </h2>
                                <p class="disc">
                                    <?php echo esc_attr($content); ?>
                                </p>
                            </div>
                            <div class="user-info-footer">
                                <?php if ($settings['designation']): ?>
                                    <div class="info">
                                        <i class="feather-file"></i>
                                        <span><?php echo esc_attr($settings['designation']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($settings['email']): ?>
                                    <div class="info">
                                        <i class="feather-mail"></i>
                                        <span><?php echo esc_attr($settings['email']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($settings['address']): ?>
                                    <div class="info">
                                        <i class="feather-map-pin"></i>
                                        <span><?php echo esc_attr($settings['address']); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="slide pb-0">
                <div class="content mt-0">
                    <div class="inner mb-0">
                        <span class="subtitle"><?php echo esc_attr($sub_title); ?></span>
                        <h1 class="title"><?php echo esc_attr($about_title); ?>
                            <span><?php echo esc_attr($name); ?></span><br>
                            <?php if ($settings['style'] == "2") { ?>
                                <span class="span"> <?php echo esc_attr($about_title2); ?></span>
                            <?php } else { ?>

                                <span class="header-caption">
                                <!-- type headline start-->
                                <span class="cd-headline clip is-full-width">
                                <span><?php echo esc_attr($about_title2); ?> </span>
                                    <!-- ROTATING TEXT -->
                                <span class="cd-words-wrapper">
                                <?php
                                $i = "";
                                $i == 1;
                                foreach ($settings['cd_option_list'] as $cd_option_list):
                                    $vihi = $i == 1 ? 'visible' : 'hidden';
                                    $i++;
                                    $slide_title = $cd_option_list['title'];
                                    ?>
                                    <b class="is-<?php echo esc_attr($vihi); ?>"><?php echo esc_attr($slide_title); ?></b>
                                <?php endforeach; ?>
                                </span>
                            </span>                                   
                        </span>

                            <?php } ?>
                        </h1>
                        <div>
                            <p class="description"><span><?php echo esc_attr($content); ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php

        }

    }
}