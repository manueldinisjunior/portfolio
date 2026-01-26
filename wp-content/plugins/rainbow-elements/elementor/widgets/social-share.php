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
use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Rb_social_share extends Widget_Base
{
    use \Elementor\inbioElementCommonFunctions;

    public function get_name()
    {
        return 'rainbow-social-share';
    }

    public function get_title()
    {
        return __('Social Share / Skill', 'rainbow-elements');
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
            'sk_layout',
            [
                'label' => __('Social', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__('Size', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Medium', 'rainbow-elements'),
                    '2' => esc_html__('Large', 'rainbow-elements'),

                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('find with me', 'rainbow-elements'),
                'placeholder' => __('find with me', 'rainbow-elements'),
            ]
        );

        $this->add_responsive_control(
            'title_align',
            [
                'label' => __('Title Alignment', 'rainbow-elements'),
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
            'icon_align',
            [
                'label' => __('Icon Alignment', 'rainbow-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'justify-content-left' => [
                        'title' => __('Left', 'rainbow-elements'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'justify-content-center' => [
                        'title' => __('Center', 'rainbow-elements'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'justify-content-end' => [
                        'title' => __('Right', 'rainbow-elements'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],

                'default' => 'justify-content-left',
            ]
        );
        $this->add_control(
            'has_Shadow',
            [
                'label' => __('Box Shadow', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'no',

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
                    'value' => 'feather-facebook',
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

        $repeater->add_control(
            'url',
            [
                'label' => esc_html__('Add your link URL here.', 'rainbow-elements'),
                'description' => esc_html__('Leave it blank if you do not want to link.', 'rainbow-elements'),
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
                        'title' => esc_html__('Facebook', 'rainbow-elements'),
                        'icon' => [
                            'value' => 'feather-facebook',
                            'library' => 'rbt-feather-icons',
                        ],
                    ],
                    [
                        'title' => esc_html__('Twitter', 'rainbow-elements'),
                        'icon' => [
                            'value' => 'feather-twitter',
                            'library' => 'rbt-feather-icons',
                        ],
                         
                    ],
                    [
                        'title' => esc_html__('Linkedin', 'rainbow-elements'),
                        
                        'icon' => [
                            'value' => 'feather-linkedin',
                            'library' => 'rbt-feather-icons',
                        ],
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        $this->rainbow_basic_style_controls('social_title', 'Social Title', '.slide .skill-share-inner span.title');


        $this->start_controls_section(
            'social_icon_style_section',
            [
                'label' => __('Social Icon', 'rainbow-elements'),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'social_icon_color',
            [
                'label' => __('Color', 'rainbow-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',

                'selectors' => array(
                    '{{WRAPPER}} .social-share li a svg, {{WRAPPER}} .social-share li a i' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'social_icon_font_size',
                'label' => __('Typography', 'rainbow-elements'),

                'selector' => '{{WRAPPER}} .social-share li a i, {{WRAPPER}} .social-share li a svg',
            ]
        );

        $this->add_responsive_control(
            'social_icon_margin',
            [
                'label' => __('Margin', 'rainbow-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],

                'selectors' => [
                    '{{WRAPPER}} .slide .skill-share-inner .skill-share li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();
 
    }

    protected function render()
    {
        $settings = $this->get_settings();

        $allowed_tags = wp_kses_allowed_html('post');
        $title = $settings['title'];
        $has_Shadow = $settings['has_Shadow'] == 'yes' ? "has_Shadow" : "no_has_Shadow";

        if ($settings['style'] == "1") {
            ?>
            <div class="slide pb-0">
                <div class="social-share-inner-left text-<?php echo esc_attr($settings['title_align']); ?> skill-share-inner">
                    <?php if ($title) { ?>
                        <span class="title text-<?php echo esc_attr($settings['title_align']); ?>"><?php echo esc_attr($title); ?></span>
                    <?php } ?>
                    <ul class="social-share skill-share <?php echo esc_attr($settings['icon_align']); ?>  d-flex liststyle <?php echo esc_attr($has_Shadow); ?> ">
                        <?php foreach ($settings['sc_option_list'] as $sc_option_list):
                            $size = 'full';
                            $img = wp_get_attachment_image($sc_option_list['image']['id'], $size);
                            $link = $sc_option_list['url']['url'];
                            $target = $sc_option_list['url']['is_external'] ? ' target="_blank"' : '';
                            $rel = $sc_option_list['url']['nofollow'] ? ' rel="nofollow"' : '';
                            $social_title = !empty($sc_option_list['title']) ? ' title="' . $sc_option_list['title'] . '"' : '';
                            ?>
                            <li class="<?php echo rainbow_slugify($sc_option_list['title']); ?>">
                                <?php if (!empty($link)){ ?> <a
                                        href="<?php echo esc_url($link); ?>" <?php echo rainbow_escapeing($target); ?><?php echo rainbow_escapeing($rel); ?><?php echo rainbow_escapeing($social_title); ?>> <?php } ?>
                                    <?php if ($sc_option_list['icontype'] == 'image'): ?>
                                        <?php echo wp_kses_post($img); ?>
                                    <?php else: ?>
                                        <?php Icons_Manager::render_icon($sc_option_list['icon']); ?>
                                    <?php endif; ?>
                                    <?php if (!empty($link)){ ?> </a> <?php } ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>
        <?php } else { ?>
            <div class="sticky-home-wrapper">
                <div class="rn-skill-area">
                    <div class="inner slide">
                        <div class="skill-share-inner pt--100 text-<?php echo esc_attr($settings['title_align']); ?>">
                            <?php if ($title) { ?>
                                <span class="title text-<?php echo esc_attr($settings['title_align']); ?>"><?php echo esc_attr($title); ?></span>
                            <?php } ?>
                            <ul class="skill-share <?php echo esc_attr($settings['icon_align']); ?>  d-flex  liststyle <?php echo esc_attr($has_Shadow); ?> ">
                                <?php foreach ($settings['sc_option_list'] as $sc_option_list):
                                    $size = 'full';
                                    $img = wp_get_attachment_image($sc_option_list['image']['id'], $size);
                                    $link = $sc_option_list['url']['url'];
                                    $target = $sc_option_list['url']['is_external'] ? ' target="_blank"' : '';
                                    $rel = $sc_option_list['url']['nofollow'] ? ' rel="nofollow"' : '';
                                    $social_title = !empty($sc_option_list['title']) ? ' title="' . $sc_option_list['title'] . '"' : '';
                                    ?>
                                    <li class="<?php echo rainbow_slugify($sc_option_list['title']); ?>">
                                        <?php if (!empty($link)){ ?> <a
                                                href="<?php echo esc_url($link); ?>" <?php echo rainbow_escapeing($target); ?><?php echo rainbow_escapeing($rel); ?><?php echo rainbow_escapeing($social_title); ?>> <?php } ?>
                                            <?php if ($sc_option_list['icontype'] == 'image'): ?>
                                                <?php echo wp_kses_post($img); ?>
                                            <?php else: ?>
                                                <?php Icons_Manager::render_icon($sc_option_list['icon']); ?>
                                            <?php endif; ?>
                                            <?php if (!empty($link)){ ?> </a> <?php } ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php }

    }
}