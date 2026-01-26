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

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class Rb_Image_holder extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-image-holder';
    }

    public function get_title()
    {
        return __('Image Holder', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-image-camera';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'img_v_content',
            [
                'label' => __('Image', 'rainbow-elements'),
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
                    '2' => __('Layout 2 ( Large Padding )', 'rainbow-elements'),
                    '3' => __('Layout 3 ( Video Popup )', 'rainbow-elements'),
                    '4' => __('Layout 4 ( Gradient Box )', 'rainbow-elements'),

                ],
            ]
        );
        $this->add_control(
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
        $this->add_control(
            'videourl',
            [
                'label' => __('Video Popup URL', 'rainbow-elements'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
                'description' => esc_html__( 'URL Example: 1.Youtube: http://www.youtube.com/watch?v=0O2aH4XLbto  and 2.Vimeo: https://vimeo.com/45830194', 'rainbow-elements' ),
                'condition' => [
                    'layout' => '3',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__( 'Box Background', 'rainbow-elements' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .slide .thumbnail.box-gradient::before',
                'condition' => [
                    'layout' => '4',
                ],
            ]
        );

        $this->end_controls_section();
    }

 

    protected function render()
    {
        $settings = $this->get_settings();
        

        if ($settings['layout'] == "1") { ?>

            <div class="slide pb-0">
                <div class="thumbnail">
                    <div class="inner">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                    </div>
                </div>
            </div>
            <?php
        } elseif ($settings['layout'] == "2") { ?>

            <div class="rn-about-area">
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" data-aos-once="true"
                     class="image-area">
                    <div class="thumbnail">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                    </div>
                </div>
            </div>
            <?php
        } elseif ($settings['layout'] == "3") { ?>

            <div class="slide pb-0">
                <?php if ($settings['videourl']['url']) { ?>
                    <a class="video-play-button"
                       href="<?php echo esc_url($settings['videourl']['url']); ?>"><span></span></a>
                <?php } ?>

                <div class="thumbnail style-2">
                    <div class="inner ">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                    </div>
                </div>
                <div id="video-overlay" class="video-overlay">
                    <a class="video-overlay-close">×</a>
                </div>
            </div>


            <?php
        } else { ?>

            <div class="slide pb-0">
                <div class="thumbnail box-gradient">
                    <div class="inner">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                    </div>
                </div>
            </div>
            <?php
        }

    }
}
