<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.
if( !class_exists('rainbow_Widgets_Control') ){
    class rainbow_Widgets_Control
    {
        public function __construct()
        {
            $this->rainbow_widgets_control();

        }

        public function rainbow_widgets_control()
        {
            $sectiontitle = 'on';
            $widgets_manager = \Elementor\Plugin::instance()->widgets_manager;

            $widget_files = [
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/title.php',
                    'class' => 'Title',
                ],

                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/about-me.php',
                    'class' => 'Rb_About_Me',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/about-me2.php',
                    'class' => 'Rb_About_Me2',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/rb-divider.php',
                    'class' => 'rainbow_divider',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/image-holder.php',
                    'class' => 'Rb_Image_holder',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/our-services.php',
                    'class' => 'Rainbow_Our_Services',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/portfolio-grid.php',
                    'class' => 'Portfolio_Grid',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/my-resume.php',
                    'class' => 'Rb_My_Resume',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/resume-library-tabs.php',
                    'class' => 'Rb_Resume_library_tabs',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/testimonial-carousel.php',
                    'class' => 'Rainbow_Testimonial_Carousel',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/brand.php',
                    'class' => 'Rb_Brand',
                ],

                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/brand-library-tabs.php',
                    'class' => 'Rb_Brand_library_tabs',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/pricing-table.php',
                    'class' => 'Rainbow_Pricing_Table',
                ],

                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/library-tabs.php',
                    'class' => 'Rb_library_tabs',
                ],

                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/post-grid.php',
                    'class' => 'rainbow_post_grid',
                ],

                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/experience.php',
                    'class' => 'Rainbow_Experience_box',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/contact-info.php',
                    'class' => 'Rb_contact_info',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/list.php',
                    'class' => 'Rb_List',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/button.php',
                    'class' => 'Rb_Button',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/progress.php',
                    'class' => 'Rb_Progress',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/video-popup.php',
                    'class' => 'Video_Popup',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/about-tabs.php',
                    'class' => 'Rb_about_tabs',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/social-share.php',
                    'class' => 'Rb_social_share',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/img-carousel.php',
                    'class' => 'Rb_img_carousel',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/project-carousel.php',
                    'class' => 'Rainbow_Project_Carousel',
                ],
                [
                    'section_title' => 'on',
                    'file_path' => 'elementor/widgets/services-repeater.php',
                    'class' => 'Rainbow_Our_Services_repeater',
                ],


            ];
            foreach ($widget_files as $widget_file) {
                if (file_exists(RAINBOW_ELEMENTS_BASE_DIR . $widget_file['file_path']) && $widget_file['section_title'] == 'on') {
                    require_once RAINBOW_ELEMENTS_BASE_DIR . $widget_file['file_path'];
                    $class_name_with_namespace = "rainbow\\Rainbow_Elements\\" . $widget_file['class'];
                    $widgets_manager->register_widget_type(new $class_name_with_namespace());
                }
            }


        }
    }
}

new rainbow_Widgets_Control();