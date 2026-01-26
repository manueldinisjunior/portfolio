<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */

class Rainbow_Tgn_Config
{
    public $rainbow_theme_fix = RAINBOW_THEME_FIX;
    public $path = "https://rainbowit.net/themes/inbio/demo/plugins/";
    public $bundled_path = "https://rainbowthemes.net/resource/bundled/";

    public function __construct()
    {
        add_action('tgmpa_register', array($this, 'rainbow_tgn_plugins'));
    }

    public function rainbow_tgn_plugins()
    {
        $plugins = array(
            array(
                'name' => esc_html__('Rainbow Elements', 'inbio'),
                'slug' => 'rainbow-elements',
                'source' => 'rainbow-elements-6.5.zip',
                'required' => true,
                'version' => '6.5'
            ),
            array(
                'name'     => esc_attr__('WooCommerce', 'inbio'),
                'slug'     => 'woocommerce',
                'required' => true,
                'force_activation' => true
            ),
            array(
                'name' => esc_html__('One Click Demo Import', 'inbio'),
                'slug' => 'one-click-demo-import',
                'required' => true,
            ),
            array(
                'name' => esc_html__('Advanced Custom Fields Pro', 'inbio'),
                'slug' => 'advanced-custom-fields-pro',
                'source' => $this->bundled_path . 'advanced-custom-fields-pro.zip',
                'required' => true,
            ),

            // Repository
            array(
                'name' => esc_html__('Redux Framework', 'inbio'),
                'slug' => 'redux-framework',
                'required' => true,
            ),

            array(
                'name' => esc_html__('Elementor Page Builder', 'inbio'),
                'slug' => 'elementor',
                'required' => true,
            ),
            array(
                'name' => esc_html__('Contact Form 7', 'inbio'),
                'slug' => 'contact-form-7',
                'required' => false,
            )
           
        );

        $config = array(
            'id' => $this->rainbow_theme_fix,            // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => $this->path,              // Default absolute path to bundled plugins.
            'menu' => $this->rainbow_theme_fix . '-install-plugins', // Menu slug.
            'has_notices' => true,                    // Show admin notices or not.
            'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                    // Automatically activate plugins after installation or not.
            'message' => '',                      // Message to output right before the plugins table.
        );

        tgmpa($plugins, $config);
    }
}

new Rainbow_Tgn_Config;