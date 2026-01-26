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
class rainbow_search extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow_search';
    }

    public function get_title()
    {
        return __('Product Search Banner', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-site-search';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'search_layout',
            [
                'label' => __('Product Search ', 'rainbow-elements'),
            ]
        );
        $this->add_control(
            'search_style',
            [
                'label' => __('Layout', 'rainbow-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => __('Layout 1 (Single Image)', 'rainbow-elements'),
                    'style2' => __('Layout 2', 'rainbow-elements'),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Type your title here...', 'rainbow-elements'),
                'default' => 'Section title here',
            ]
        );

        $this->add_control(
            'placeholder',
            [
                'label' => __('Placeholder', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Type your title here...', 'rainbow-elements'),
                'default' => 'What are you looking for?',
            ]
        );

        $this->add_control(
            'autocomplete ',
            [
                'label' => __('Autocomplete', 'rainbow-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'rainbow-elements'),
                'label_off' => __('Off', 'rainbow-elements'),
                'default' => 'no',

            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'search_bg_img',
            [
                'label' => __('Search Background Images', 'rainbow-elements'),
                'condition' => [
                    'search_style' => ['style1'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __('Background', 'plugin-domain'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .rainbow-slider-area .rainbow-slider-banner',

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'search_layout_img',
            [
                'label' => __('Search Banner Images', 'rainbow-elements'),
                'condition' => [
                    'search_style' => ['style2'],
                ],
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
        $this->add_control(
            'image5',
            [
                'label' => __('Image 5', 'rainbow-elements'),
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
            'image6',
            [
                'label' => __('Image 6', 'rainbow-elements'),
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
                    '{{WRAPPER}} .sec-title' => 'color: {{VALUE}}',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_font_size',
                'label' => __('Typography', 'rainbow-elements'),
                'condition' => array('title_style_on' => array('yes')),
                'selector' => '{{WRAPPER}} .sec-title',
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
                    '{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings();
        $search = isset($_GET['s']) ? $_GET['s'] : '';
        $product_cat = isset($_GET['product_cat']) ? $_GET['product_cat'] : '';
        $all_label = $label = esc_html__('All Categories', 'rainbow-elements');

        if (isset($_GET['product_cat'])) {
            $pcat = $_GET['product_cat'];
            if (isset($category_dropdown[$pcat])) {
                $label = $category_dropdown[$pcat]['name'];
            }
        }

        $simage1 = $settings['image1']['url'];
        $simage2 = $settings['image2']['url'];
        $simage3 = $settings['image3']['url'];
        $simage4 = $settings['image4']['url'];
        $simage5 = $settings['image5']['url'];
        $simage6 = $settings['image6']['url'];
        ?>

        <div class="rainbow-slider-area pt--85 pt_md--30 pt_sm--30">
            <div class="container p-0">
                <div class="rainbow-slider-banner bg-gradient-2">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 d-flex align-items-center">
                            <div class="slider-banner-content" data-sal="slide-up" data-sal-duration="1000"
                                 data-sal-delay="700">
                                <h1 class="h3 sec-title"><?php echo wp_kses_post($settings['title']); ?></h1>
                                <div class="product-search2 rainbow-search product-search">
                                    <div class="search-dropdown header_auto_search">
                                        <div class="search-outer visible-mobile-menu-off">
                                            <form id="search__form" class="searchform"
                                                  action="<?php echo esc_url(home_url('/')); ?>" method="get">
                                                <input type="hidden" value="product" name="post_type"/>
                                                <div class="input-outer input-group border-radius-default rainbow-search">
                                                    <input type="search"
                                                           class="placeholder product-search-input form-control"
                                                           name="s" id="s" value="" maxlength="128"
                                                           placeholder="<?php echo esc_attr($settings['placeholder']); ?>"
                                                           autocomplete="off"/>
                                                    <div class="input-group-append">
                                                        <button type="submit"
                                                                class="rainbow-btn"><?php echo esc_html('Search', 'rainbow-elements'); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="slider-banner-img">
                                <?php if ($settings['search_style'] == 'style2') { ?>

                                    <img src="<?php echo esc_url($simage1); ?>" class="img-icon img-icon1"
                                         data-sal="slide-down" data-sal-duration="1000" data-sal-delay="300" alt="Cube">
                                    <img src="<?php echo esc_url($simage2); ?>" class="img-icon img-icon2"
                                         data-sal="slide-right" data-sal-duration="1000" data-sal-delay="400"
                                         alt="Cube">
                                    <img src="<?php echo esc_url($simage3); ?>" class="img-icon img-icon3"
                                         data-sal="slide-up" data-sal-duration="1000" data-sal-delay="500" alt="Lamp">
                                    <img src="<?php echo esc_url($simage4); ?>" class="img-icon img-icon4"
                                         data-sal="zoom-in" data-sal-duration="1000" data-sal-delay="100" alt="Circle">
                                    <img src="<?php echo esc_url($simage5); ?>" class="img-icon img-icon5"
                                         data-sal="slide-left" data-sal-duration="1000" data-sal-delay="600"
                                         alt="Camera">

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($settings['search_style'] == 'style2') { ?>
                <div class="slider-left-hand" data-sal="slide-up" data-sal-duration="1000">
                    <img src="<?php echo esc_url($simage6); ?>" alt="Hand Images">
                </div>
            <?php } ?>
        </div>
        <?php

    }
}