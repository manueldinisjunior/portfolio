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
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;


if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Rb_About_Me2 extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-about-me2';
    }

    public function get_title()
    {
        return __('About Me 2 ', 'rainbow-elements');
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
            'name',
            [
                'label' => __('Name', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Michael Faraday', 'rainbow-elements'),
                'placeholder' => __('Enter your name here', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Welcome to my world', 'rainbow-elements'),

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

                'dynamic' => [
                    'active' => true,
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'large',
                'separator' => 'none',

            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'sec_option_list',
            [
                'label' => esc_html__('Social List', 'rainbow-elements'),

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

        $repeater->add_control(
            'icontype',
            [
                'label' => __('Icon Type', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'quick',
                'options' => [

                    'icon' => esc_html__('Icon', 'rainbow-elements'),
                    'image' => esc_html__('Custom Image', 'rainbow-elements'),
                ],
            ]
        );

        $repeater->add_control(
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

        $repeater->add_control(
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

        $repeater->add_control(
            'url',
            [
                'label' => esc_html__('Social URL', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
            ]
        );


        $this->add_control(
            'sc_option_list',
            [
                'label' => esc_html__('Social List', 'rainbow-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

                'default' => [

                    [
                        'title' => esc_html__('facebook.', 'rainbow-elements'),
                        'quick' => 'feather-facebook',
                    ],
                    [
                        'title' => esc_html__('twitter', 'rainbow-elements'),
                        'quick' => 'feather-twitter',
                    ],
                    [
                        'title' => esc_html__('linkedin.', 'rainbow-elements'),
                        'quick' => 'feather-linkedin',
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'sec_info_list',
            [
                'label' => esc_html__('Contact Info', 'rainbow-elements'),

            ]
        );

        $this->add_control(
            'email_label',
            [
                'label' => __('Email label', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Email', 'rainbow-elements'),
                'placeholder' => __('Email', 'rainbow-elements'),
            ]
        );


        $this->add_control(
            'email',
            [
                'label' => __('Email', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('michael@domain.com', 'rainbow-elements'),
                'placeholder' => __('Enter your email address here', 'rainbow-elements'),
            ]
        );


        $this->add_control(
            'birthday_label',
            [
                'label' => __('Birthday label', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Birthday', 'rainbow-elements'),
                'placeholder' => __('Birthday', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'birthday',
            [
                'label' => __('Birthday', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('20 August 1995', 'rainbow-elements'),
                'placeholder' => __('Enter your birthday here', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'phone_label',
            [
                'label' => __('Phone label', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Phone', 'rainbow-elements'),
                'placeholder' => __('Phone', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'phone',
            [
                'label' => __('Phone', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('(555) 555-1234', 'rainbow-elements'),
                'placeholder' => __('Enter your phone number here', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'location_label',
            [
                'label' => __('Location label', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Location', 'rainbow-elements'),
                'placeholder' => __('Location', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'location',
            [
                'label' => __('Location', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Kingston, New York 12401', 'rainbow-elements'),
                'placeholder' => __('Enter your address here', 'rainbow-elements'),
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
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'condition' => array('title_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .title',
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

    private function slick_load_scripts()
    {
        wp_enqueue_script('particles-js');
    }


    protected function render()
    {
        $settings = $this->get_settings();
        $allowed_tags = wp_kses_allowed_html('post');
        $sub_title = $settings['sub_title'];
        $name = $settings['name'];
        $allowed_tags = wp_kses_allowed_html('post');
        $myimage = $settings['myimage']['url'];
        $email_label = $settings['email_label'];
        $email = $settings['email'];
        $birthday_label = $settings['birthday_label'];
        $birthday = $settings['birthday'];
        $phone_label = $settings['phone_label'];
        $phone = $settings['phone'];
        $location_label = $settings['location_label'];
        $location = $settings['location'];
        ?>
        <div class="rn-content-wrapper ">
            <div class="row padding-tb m_dec-top align-items-center d-flex">
                <div class="col-lg-6">
                    <div class="header-left">
                        <?php if ($myimage): ?>
                            <div class="header-thumbnail">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'myimage'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="header-info-content">
                            <h4 class="title"><?php echo esc_attr($name); ?></h4>
                            <div class="status-info"><?php echo esc_attr($sub_title); ?></div>
                            <!-- social sharea area -->
                            <div class="social-share-style-1 border-none mt--40">
                                <ul class="social-share d-flex liststyle">
                                    <?php foreach ($settings['sc_option_list'] as $sc_option_list):
                                        $size = 'full';
                                        $img = wp_get_attachment_image($sc_option_list['image']['id'], $size);
                                        ?>
                                        <li class="<?php echo esc_attr($sc_option_list['title']); ?>">

                                            <a href="<?php echo esc_url($sc_option_list['url']['url']); ?>">
                                                <?php if ($sc_option_list['icontype'] == 'image'): ?>
                                                    <?php echo wp_kses_post($img); ?>
                                                <?php elseif ($sc_option_list['icontype'] == 'quick'): ?>
                                                    <i class="<?php echo esc_attr($sc_option_list['quick']); ?>"></i>
                                                <?php else: ?>
                                                    <?php Icons_Manager::render_icon($sc_option_list['icon']); ?>
                                                <?php endif; ?>
                                            </a>

                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-right">
                        <ul class="rn-header-content">
                            <li>
                                <span class="overhead"><?php echo esc_attr($email_label); ?></span><?php echo esc_attr($email); ?>
                            </li>
                            <li>
                                <span class="overhead"><?php echo esc_attr($birthday_label); ?></span><?php echo esc_attr($birthday); ?>
                            </li>
                        </ul>
                        <ul class="rn-header-content two">
                            <li>
                                <span class="overhead"><?php echo esc_attr($phone_label); ?></span><?php echo esc_attr($phone); ?>
                            </li>
                            <li>
                                <span class="overhead"><?php echo esc_attr($location_label); ?></span><?php echo esc_attr($location); ?>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>  
        <?php

    }
}