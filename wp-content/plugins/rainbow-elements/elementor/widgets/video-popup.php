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
class Video_Popup extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-video-popup';
    }

    public function get_title()
    {
        return __('Video Popup', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-video-camera';
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
                'description' => esc_html__( 'URL Example: 1. Youtube: http://www.youtube.com/watch?v=0O2aH4XLbto and 2.Vimeo: https://vimeo.com/45830194', 'rainbow-elements' ),
            ]
        );

        $this->end_controls_section();
    }

 

    protected function render()
    {
        $settings = $this->get_settings();
        
        $videourl = $settings['videourl']['url'];
        ?>
        <div class="rn-video-popup-area">
            <div class="thumbnail position-relative">
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
                <?php if (!empty($settings['videourl']['url'])): ?>
                    <a class="video-play-button" href="<?php echo esc_url($videourl); ?>">
                        <span></span>
                    </a>
                <?php endif; ?>
                <div id="video-overlay" class="video-overlay">
                    <a class="video-overlay-close">×</a>
                </div>
            </div>
        </div>
    <?php }
}