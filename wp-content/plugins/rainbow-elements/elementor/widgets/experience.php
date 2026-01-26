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
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class Rainbow_Experience_box extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-experience-box';
    }

    public function get_title()
    {
        return esc_html__('Experience Boxs', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    public function rainbow_get_img($img)
    {
        $img = RAINBOW_ELEMENTS_BASE_URL . 'assets/images/' . $img;
        return $img;
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'experience_content',
            [
                'label' => esc_html__('Portfolio', 'rainbow-elements'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'experience_image',
            [
                'label' => esc_html__('Portfolio Image', 'rainbow-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => $this->rainbow_get_img('placeholder.jpg'),
                ],
            ]
        );
           
        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'full',
                'separator' => 'none',
                 
            ]
        );
        $repeater->add_control(
            'date_title',
            [
                'label' => esc_html__('Date', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('2015-Present', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('App Development. ', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'designation',
            [
                'label' => esc_html__('Designation', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Co-Founder, Web Designer & Developer', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Reinvetning the way you create websites', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'detail_txt',
            [
                'label' => esc_html__('Detail Text', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CONTACT ME', 'rainbow-elements'),
            ]
        );
        $repeater->add_control(
            'url',
            [
                'label' => esc_html__('Detail URL', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
            ]
        );
        $this->add_control(
            'list_experience',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'title' => esc_html__('Software Develop.', 'rainbow-elements'),
                        'designation' => 'Co-Founder, Web Designer & Developer',
                        'url' => '#',
                    ],
                    [
                        'title' => esc_html__('Web Design. ', 'rainbow-elements'),
                        'designation' => 'Co-Founder, Web Designer & Developer',
                        'url' => '#',
                    ],
                    [
                        'title' => esc_html__('App Development. ', 'rainbow-elements'),
                        'designation' => 'Co-Founder, Web Designer & Developer',
                        'url' => '#',
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'date_style_section',
            [
                'label' => esc_html__('Date', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'date_style_on',
            [
                'label' => esc_html__('Customize', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'rainbow-elements'),
                'label_off' => esc_html__('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );


        $this->add_control(
            'date_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => array('date_style_on' => array('yes')),
                'selectors' => array(
                    '{{WRAPPER}} .experience-center .date' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_font_size',
                'label' => esc_html__('Typography', 'rainbow-elements'),
                'condition' => array('date_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .experience-center .date',
            ]
        );

        $this->add_responsive_control(
            'date_title_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('date_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .experience-center .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'date_title_padding',
            [
                'label' => esc_html__('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('date_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .experience-center .date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
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
            'stitle_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => array('title_style_on' => array('yes')),
                'selectors' => array(
                    '{{WRAPPER}} .experience-center .experience-title' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stitle_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'condition' => array('title_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .experience-center .experience-title',
            ]
        );

        $this->add_responsive_control(
            'stitle_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('title_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .experience-center .experience-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',


                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('title_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .experience-center .experience-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'designation_style_section',
            [
                'label' => esc_html__('Designation', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'designation_style_on',
            [
                'label' => esc_html__('Customize', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'rainbow-elements'),
                'label_off' => esc_html__('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => array('designation_style_on' => array('yes')),
                'selectors' => array(
                    '{{WRAPPER}} .experience-center .subtitle' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'designation_font_size',
                'label' => esc_html__('Typography', 'rainbow-elements'),
                'condition' => array('designation_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .experience-center .subtitle',
            ]
        );

        $this->add_responsive_control(
            'designation_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('designation_style_on' => array('yes')),
                'selectors' => [

                    '{{WRAPPER}} .experience-center .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'designation_padding',
            [
                'label' => esc_html__('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('designation_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .experience-center .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'disc_style_section',
            [
                'label' => esc_html__('Content', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'disc_style_on',
            [
                'label' => esc_html__('Customize', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'rainbow-elements'),
                'label_off' => esc_html__('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );

        $this->add_control(
            'disc_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => array('disc_style_on' => array('yes')),
                'selectors' => array(
                    '{{WRAPPER}} .experience-center .disc' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'disc_font_size',
                'label' => esc_html__('Typography', 'rainbow-elements'),
                'condition' => array('disc_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .experience-center .disc',
            ]
        );

        $this->add_responsive_control(
            'disc_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('disc_style_on' => array('yes')),
                'selectors' => [

                    '{{WRAPPER}} .experience-center .disc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'disc_padding',
            [
                'label' => esc_html__('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('disc_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .experience-center .disc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'button_style_section',
            [
                'label' => esc_html__('Button', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_style_on',
            [
                'label' => esc_html__('Customize', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'rainbow-elements'),
                'label_off' => esc_html__('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => array('button_style_on' => array('yes')),
                'selectors' => array(
                    '{{WRAPPER}} .experience-footer .rn-btn' => 'color: {{VALUE}}',

                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_font_size',
                'label' => esc_html__('Typography', 'rainbow-elements'),
                'condition' => array('button_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .experience-footer .rn-btn',
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => esc_html__('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('button_style_on' => array('yes')),
                'selectors' => [

                    '{{WRAPPER}} .experience-footer .rn-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'condition' => array('button_style_on' => array('yes')),
                'selectors' => [
                    '{{WRAPPER}} .experience-footer .rn-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings(); ?>

        <?php foreach ($settings['list_experience'] as $experience):
        $allowed_tags = wp_kses_allowed_html('post');

        $date_title = $experience['date_title'];
        $title = $experience['title'];
        $designation = $experience['designation'];
        $content = $experience['content'];
        $size = 'rainbow-thumbnail-lg';
        $img = wp_get_attachment_image($experience['experience_image']['id'], $size);

        $attr = $btn = '';
        if (!empty($experience['url']['url'])) {
            $attr = 'href="' . $experience['url']['url'] . '"';
            $attr .= !empty($experience['url']['is_external']) ? ' target="_blank"' : '';
            $attr .= !empty($experience['url']['nofollow']) ? ' rel="nofollow"' : '';
        }
        if ($experience['detail_txt']) {
            $btn = '<a class="rn-btn" ' . $attr . '><span>' . $experience['detail_txt'] . '</span></a>';
        }
        ?>
        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true"
             class="experience-style-two">
            <div class="experience-left">
                <?php if ($img) { ?>
                    <div class="experience-image">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $experience, 'image_size', 'experience_image' );?> 
                    
                    </div>
                <?php } else { ?>
                    <div class="experience-image">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $experience, 'image_size', 'experience_image' );?> 
                         
                    </div>
                <?php } ?>

                <div class="experience-center">
                    <span class="date"> <?php echo esc_html($date_title); ?></span>
                    <h4 class="experience-title">
                        <?php echo esc_html($title); ?>
                    </h4>
                    <h6 class="subtitle">
                        <?php echo rainbow_kses_basic($designation); ?>
                    </h6>
                    <p class="disc"> <?php echo rainbow_kses_advance($content); ?></p>
                </div>
            </div>
            <div class="experience-right">
                <div class="experience-footer">
                    <?php echo wp_kses($btn, $allowed_tags); ?>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
        <?php
    }
}
