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

class Rainbow_Our_Services_repeater extends Widget_Base
{

    use \Elementor\inbioElementCommonFunctions;

    public function get_name()
    {
        return 'rainbow-services-repeater';
    }

    public function get_title()
    {
        return __('Services Repeater ', 'rainbow-elements');
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
        $repeater = new Repeater();


        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Business Stratagy', 'rainbow-elements'),
                'placeholder' => __('Title', 'rainbow-elements'),
            ]
        );

        $repeater->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('I throw myself down among the tall grass by the stream as Ilie close to the earth.', 'rainbow-elements'),
                'placeholder' => __('Sub  Title', 'rainbow-elements'),
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


        $repeater->add_control(
            'icontype',
            [
                'label' => __('Icon Type', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
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
                    'value' => 'feather-align-justify',
                    'library' => 'rbt-feather-icons',
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


        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'full',
                'separator' => 'none',
                'condition' => [
                    'icontype' => 'image',
                ],
            ]
        );

        $repeater->add_control(
            'imgwidth',
            [
                'label' => esc_html__('Image Width', 'plugin-name'),
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
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon-box img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'icontype' => 'image',
                ],
            ]
        );

        $this->add_control(
            'services_list',
            [
                'label' => esc_html__('Services List', 'rainbow-elements'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

                'default' => [

                    [
                        'title' => esc_html__('Business Stratagy', 'rainbow-elements'),
                        'sub_title' => esc_html__('I throw myself down among the tall grass by the stream as Ilie close to the earth.', 'rainbow-elements'),
                        
                        'icon' => [
                            'value' => 'feather-align-justify',
                            'library' => 'rbt-feather-icons',
                        ],

                    ],
                    [
                        'title' => esc_html__('App Development', 'rainbow-elements'),
                        'sub_title' => esc_html__('I throw myself down among the tall grass by the stream as Ilie close to the earth.', 'rainbow-elements'),
                         
                        'icon' => [
                            'value' => 'feather-book-open',
                            'library' => 'rbt-feather-icons',
                        ],

                    ],
                    [
                        'title' => esc_html__('Business Stratagy', 'rainbow-elements'),
                        'sub_title' => esc_html__('I throw myself down among the tall grass by the stream as Ilie close to the earth.', 'rainbow-elements'),
                        
                        'icon' => [
                            'value' => 'feather-tv',
                            'library' => 'rbt-feather-icons',
                        ],

                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->add_responsive_control(
            'service_align',
            [
                'label' => esc_html__( 'Content Alignment', 'rainbow-elements' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__( 'Left', 'rainbow-elements' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__( 'Center', 'rainbow-elements' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__( 'Right', 'rainbow-elements' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'separator' => 'before',
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



        $this->rainbow_columns('service_columns', 'Service - Columns', '4', '6', '6', '12');

    }

    protected function render()
    {
        $settings = $this->get_settings();
        $allowed_tags = wp_kses_allowed_html('post');
       
        ?>
        <div class="row row--25 mt_md--10 mt_sm--10">
            <?php
            foreach ($settings['services_list'] as $option):
                $attr = $btn = '';
                if (!empty($option['url']['url'])) {
                    $attr = 'href="' . $option['url']['url'] . '"';
                    $attr .= !empty($option['url']['is_external']) ? ' target="_blank"' : '';
                    $attr .= !empty($option['url']['nofollow']) ? ' rel="nofollow"' : '';
                }
                $title = $option['title'];

                if ($option['url']['url']) {
                    $btn = '<a class="read-more-button" ' . $attr . '><i class="feather-arrow-right"></i></a>'; 
                    $title = '<a ' . $attr . '>' . $title . '</a>';
                }
                $sub_title = $option['sub_title'];

                ?>
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true"
                     class="mt--50 mt_md--30 mt_sm--30 col-lg-<?php echo esc_attr($settings['rainbow_service_columns_for_desktop']); ?> col-md-<?php echo esc_attr($settings['rainbow_service_columns_for_laptop']); ?> col-sm-<?php echo esc_attr($settings['rainbow_service_columns_for_tablet']); ?> col-<?php echo esc_attr($settings['rainbow_service_columns_for_mobile']); ?>">
                    <div class="rn-service <?php echo esc_attr($settings['service_align']); ?> elementor-repeater-item-<?php echo esc_attr($option['_id']); ?>">
                        <div class="inner">
                            <div class="icon icon-box">
                                <?php if ($option['icontype'] == 'image'): ?>
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($option, 'image_size', 'image'); ?>
                                <?php else: ?>
                                    <?php Icons_Manager::render_icon($option['icon']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="content">
                                <h4 class="title"> <?php echo wp_kses($title, $allowed_tags); ?></h4>
                                <p class="description"> <?php echo wp_kses($sub_title, $allowed_tags); ?></p>
                                <?php echo wp_kses($btn, $allowed_tags); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php

    }
}