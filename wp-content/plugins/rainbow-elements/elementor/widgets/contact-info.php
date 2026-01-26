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
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class Rb_contact_info extends Widget_Base
{
    use \Elementor\inbioElementCommonFunctions;

    public function get_name()
    {
        return 'rainbow-contact-info';
    }

    public function get_title()
    {
        return __('Contact Info', 'rainbow-elements');
    }

    public function get_icon()
    {
        return 'eicon-post-title';
    }

    public function get_categories()
    {
        return [RAINBOW_ELEMENTS_THEME_PREFIX . '-widgets'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'contact_section',
            [
                'label' => __('Info ', 'rainbow-elements'),
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
                'default' => 'large',
                'separator' => 'none',

            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Type your title here...', 'rainbow-elements'),
                'default' => esc_html__('Nevine Acotanza', 'rainbow-elements'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Type your Description here.', 'rainbow-elements'),
                'label_block' => true,
                'default' => esc_html__('Chief Operating Officer', 'rainbow-elements'),

            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'rainbow-elements'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Type your Description here.', 'rainbow-elements'),
                'label_block' => true,
                'default' => esc_html__('Chief Operating Officer I am available for freelance work. Connect with me via and call in to my account. ', 'rainbow-elements'),

            ]
        );

        $this->add_control(
            'phone_lable',
            [
                'label' => __('Phone label', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Type your Phone here...', 'rainbow-elements'),
                'default' => esc_html__('Phone:', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'phone',
            [
                'label' => __('Phone', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Type your Phone here...', 'rainbow-elements'),
                'default' => esc_html__('+01234567890', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'email_lable',
            [
                'label' => __('Email Lable', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Type your Email here...', 'rainbow-elements'),
                'default' => esc_html__('Email:', 'rainbow-elements'),
            ]
        );

        $this->add_control(
            'email',
            [
                'label' => __('Email', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Type your Email here...', 'rainbow-elements'),
                'default' => esc_html__('admin@example.com', 'rainbow-elements'),
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'sec_contact_list',
            [
                'label' => esc_html__('Social List', 'rainbow-elements'),

            ]
        );


        $this->add_control(
            'soc_title',
            [
                'label' => __('Socials Title', 'rainbow-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('FIND WITH ME', 'rainbow-elements'),
                'placeholder' => __('FIND WITH ME', 'rainbow-elements'),
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


        $repeater = new Repeater();
        $repeater->add_control(
            'stitle',
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
                        'stitle' => esc_html__('facebook.', 'rainbow-elements'),
                        'quick' => 'feather-facebook',
                    ],
                    [
                        'stitle' => esc_html__('twitter', 'rainbow-elements'),
                        'quick' => 'feather-twitter',
                    ],
                    [
                        'stitle' => esc_html__('linkedin.', 'rainbow-elements'),
                        'quick' => 'feather-linkedin',
                    ],

                ],
                'title_field' => '{{{ stitle }}}',
            ]
        );
        $this->end_controls_section();


        $this->rainbow_basic_style_controls('title', 'Title', '.contact-about-area .title-area h4.title');
        $this->rainbow_basic_style_controls('sub_title', 'Sub Title', '.contact-about-area .title-area span');
        $this->rainbow_basic_style_controls('description', 'Description', '.contact-about-area .description p');
        $this->rainbow_basic_style_controls('email_phone', 'Email / Phone', '.contact-about-area .description span, .contact-about-area .description span a');

        $this->rainbow_basic_style_controls('social_title', 'Social Title', '.contact-about-area .social-area .name');

    }

    protected function render()
    {
        $settings = $this->get_settings();

        $allowed_tags = wp_kses_allowed_html('post');
        $soc_title = $settings['soc_title'];
        $has_Shadow = $settings['has_Shadow'] == 'yes' ? "has_Shadow" : "no_has_Shadow";
        $phoneNumber = preg_replace("/[^0-9+]/", '', $settings['phone']);
        ?>
        <div class="contact-about-area">
            <div class="thumbnail">
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image_size', 'image'); ?>
            </div>
            <div class="title-area">
                <h4 class="title"><?php echo esc_attr($settings['title']); ?></h4>
                <span><?php echo esc_attr($settings['sub_title']); ?></span>
            </div>
            <div class="description">
                <p>
                    <?php echo esc_attr($settings['content']); ?>
                </p>
                <span class="phone"><?php echo esc_attr($settings['phone_lable']); ?> <a
                            href="tel:<?php echo esc_attr($phoneNumber); ?>"><?php echo esc_attr($settings['phone']); ?></a></span>
                <span class="mail"><?php echo esc_attr($settings['email_lable']); ?> <a
                            href="mailto:<?php echo esc_attr($settings['email']); ?>"><?php echo esc_attr($settings['email']); ?></a></span>
            </div>

            <div class="social-area">
                <?php if ($soc_title) { ?>
                    <div class="name"><?php echo esc_attr($soc_title); ?></div>
                <?php } ?>

                <div class="social-icone skill-share <?php echo esc_attr($has_Shadow); ?> ">
                    <?php foreach ($settings['sc_option_list'] as $sc_option_list):
                        $size = 'full';
                        $img = wp_get_attachment_image($sc_option_list['image']['id'], $size);

                        $link = $sc_option_list['url']['url'];
                        $target = $sc_option_list['url']['is_external'] ? ' target="_blank"' : '';
                        $rel = $sc_option_list['url']['nofollow'] ? ' rel="nofollow"' : '';
                        $social_title = !empty($sc_option_list['stitle']) ? ' title="' . $sc_option_list['stitle'] . '"' : '';
                        ?>


                        <a href="<?php echo esc_url($link); ?>" <?php echo rainbow_escapeing($target); ?><?php echo rainbow_escapeing($rel); ?><?php echo rainbow_escapeing($social_title); ?>>
                            <?php if ($sc_option_list['icontype'] == 'image'): ?>
                                <?php echo wp_kses_post($img); ?>
                            <?php elseif ($sc_option_list['icontype'] == 'quick'): ?>
                                <i class="<?php echo esc_attr($sc_option_list['quick']); ?>"></i>
                            <?php else: ?>
                                <?php Icons_Manager::render_icon($sc_option_list['icon']); ?>
                            <?php endif; ?>
                        </a>


                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php
    }
}
