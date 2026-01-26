<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */

trait rainbowsocialTrait
{

    public static function rainbow_socials()
    {
        $rainbow_get_options = self::rainbow_get_options();
        $rainbow_socials = array(
            'social_facebook' => array(
                'icon' => 'feather-facebook',
                'url' => $rainbow_get_options['social_facebook'],
                'title' => esc_html__('Facebook', 'inbio'),
            ),
            'social_twitter' => array(
                'icon' => 'feather-twitter',
                'url' => $rainbow_get_options['social_twitter'],
                'title' => esc_html__('Twitter', 'inbio'),
            ),
            'social_linkedin' => array(
                'icon' => 'feather-linkedin',
                'url' => $rainbow_get_options['social_linkedin'],
                'title' => esc_html__('Linkedin', 'inbio'),
            ),
            'social_youtube' => array(
                'icon' => 'feather-youtube',
                'url' => $rainbow_get_options['social_youtube'],
                'title' => esc_html__('Youtube', 'inbio'),
            ),
            'social_instagram' => array(
                'icon' => 'feather-instagram',
                'url' => $rainbow_get_options['social_instagram'],
                'title' => esc_html__('Instagram', 'inbio'),
            ),
            'social_tiktok' => array(
                'icon' => 'rbt-icon rbt-tiktok',
                'url' => $rainbow_get_options['social_tiktok'],
                'title' => esc_html__('Tiktok', 'inbio'),
            ),
            'social_telegram' => array(
                'icon' => 'fab fa-telegram',
                'url' => $rainbow_get_options['social_telegram'],
                'title' => esc_html__('Telegram', 'inbio'),
            ),
            'social_snapchat' => array(
                'icon' => 'fab fa-snapchat',
                'url' => $rainbow_get_options['social_snapchat'],
                'title' => esc_html__('Snapchat', 'inbio'),
            ),
            'social_whatsapp' => array(
                'icon' => 'fab fa-whatsapp',
                'url' => $rainbow_get_options['social_whatsapp'],
                'title' => esc_html__('WhatsApp', 'inbio'),
            ),
            'social_pinterest' => array(
                'icon' => 'fab fa-pinterest',
                'url' => $rainbow_get_options['social_pinterest'],
                'title' => esc_html__('Pinterest', 'inbio'),
            ),
            'social_reddit' => array(
                'icon' => 'fab fa-reddit',
                'url' => $rainbow_get_options['social_reddit'],
                'title' => esc_html__('Reddit', 'inbio'),
            ),
            'social_vimeo' => array(
                'icon' => 'fab fa-vimeo',
                'url' => $rainbow_get_options['social_vimeo'],
                'title' => esc_html__('Vimeo', 'inbio'),
            ),
            'social_qq' => array(
                'icon' => 'fab fa-qq',
                'url' => $rainbow_get_options['social_qq'],
                'title' => esc_html__('QQ', 'inbio'),
            ),
            'social_skype' => array(
                'icon' => 'fab fa-skype',
                'url' => $rainbow_get_options['social_skype'],
                'title' => esc_html__('Skype', 'inbio'),
            ),
            'social_viber' => array(
                'icon' => 'fab fa-viber',
                'url' => $rainbow_get_options['social_viber'],
                'title' => esc_html__('Viber', 'inbio'),
            ),
            'social_wordpress' => array(
                'icon' => 'fab fa-wordpress',
                'url' => $rainbow_get_options['social_wordpress'],
                'title' => esc_html__('WordPress', 'inbio'),
            ),
            'social_discord' => array(
                'icon' => 'fab fa-discord',
                'url' => $rainbow_get_options['social_discord'],
                'title' => esc_html__('Discord', 'inbio'),
            ),
            'social_stack_overflow' => array(
                'icon' => 'fab fa-stack-overflow',
                'url' => $rainbow_get_options['social_stack_overflow'],
                'title' => esc_html__('Stack Overflow', 'inbio'),
            ),
            'social_stack_dribbble' => array(
                'icon' => 'fab fa-dribbble',
                'url' => $rainbow_get_options['social_stack_dribbble'],
                'title' => esc_html__('Dribbble', 'inbio'),
            ),
            'social_stack_behance' => array(
                'icon' => 'fab fa-behance',
                'url' => $rainbow_get_options['social_stack_behance'],
                'title' => esc_html__('Behance', 'inbio'),
            ),

        );
        return array_filter($rainbow_socials, array(__CLASS__, 'rainbow_filter_social'));
    }

    public static function rainbow_filter_social($args)
    {
        return ($args['url'] != '');
    }

}
