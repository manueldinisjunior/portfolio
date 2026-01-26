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

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class Rb_img_carousel extends Widget_Base
{

    public function get_name()
    {
        return 'rainbow-img-carousel';
    }

    public function get_title()
    {
        return esc_html__('Image Carousel', 'rainbow-elements');
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
            'carousel_content',
            [
                'label' => esc_html__('Images', 'rainbow-elements'),
            ]
        );

        $repeater = new Repeater();


        $repeater->add_control(
            'carousel_title',
            [
                'label' => esc_html__('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Rainbow-Themes', 'rainbow-elements'),
            ]
        );

        $repeater->add_control(
            'carousel_image',
            [
                'label' => esc_html__('Carousel Image Title', 'rainbow-elements'),
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
        $this->add_control(
            'list_carousel',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'carousel_title' => esc_html__('Image1', 'rainbow-elements'),

                    ],
                    [
                        'carousel_title' => esc_html__('Image2', 'rainbow-elements'),

                    ],
                    [
                        'carousel_title' => esc_html__('Image3', 'rainbow-elements'),

                    ],

                ],
                'title_field' => '{{{ carousel_title }}}',
            ]
        );

        $this->end_controls_section();


    }

    private function slick_load_scripts()
    {
        wp_enqueue_style('slick');
        wp_enqueue_style('slick-theme');
        wp_enqueue_script('slick-min');
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $i = "";
        $i == 1;
        ?>
        <div class="front-end-developer">
            <div id="carouselExampleControlsImg" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($settings['list_carousel'] as $carousel):
                        $size = 'full';
                        $img = wp_get_attachment_image($carousel['carousel_image']['id'], $size);
                        $inner_active = $i == 1 ? 'inner active' : null;
                        $i++;
                        ?>

                        <div class="carousel-item <?php echo esc_attr($inner_active); ?>">

                            <?php if ($img) { ?>
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $carousel, 'image_size', 'carousel_image' );?> 
                            <?php } else { ?>
                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $carousel, 'image_size', 'carousel_image' );?> 

                            <?php } ?> 

                        </div> 

                    <?php endforeach; ?>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControlsImg" role="button" data-slide="prev">
                    <span class="" aria-hidden="true"> <i class="feather-arrow-left"></i> </span>
                    <span class="sr-only"><?php esc_html__('Previous', 'rainbow-elements'); ?></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControlsImg" role="button" data-slide="next">
                    <span class="" aria-hidden="true"> <i class="feather-arrow-right"></i> </span>
                    <span class="sr-only"><?php esc_html__('Next', 'rainbow-elements'); ?></span>
                </a>
            </div>
        </div>

        <?php
    }

}
