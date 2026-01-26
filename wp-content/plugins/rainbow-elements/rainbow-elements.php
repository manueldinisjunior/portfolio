<?php
/*
Plugin Name: Rainbow Elements
Plugin URI: #
Description: Rainbow Elements Plugin for Required Inbio Theme
Version: 2.3
Author: Rainbow-Themes
Author URI: https://themeforest.net/user/rainbow-themes
*/

if (!defined('ABSPATH')) exit;

if (!defined('RAINBOW_ELEMENTS')) {
    $plugin_data = get_file_data(__FILE__, array('version' => 'Version'));
    define('RAINBOW_ELEMENTS', $plugin_data['version']);
    define('RAINBOW_ELEMENTS_SCRIPT_VER', (WP_DEBUG) ? time() : RAINBOW_ELEMENTS);
    define('RAINBOW_ELEMENTS_THEME_PREFIX', 'rainbow');
    define('RAINBOW_PT_PREFIX', 'rainbow');
    define('RAINBOW_ELEMENTS_BASE_DIR', plugin_dir_path(__FILE__));
 
    defined('RAINBOW_ELEMENTS_ACTIVED') or define('RAINBOW_ELEMENTS_ACTIVED', (bool)function_exists('WC'));
    define('RAINBOW_ELEMENTS_BASE_URL', plugins_url('/', __FILE__));
    define('RAINBOW_CORE_URL', plugin_dir_url(__FILE__));
    define('RAINBOW_CORE_ASSETS', trailingslashit(RAINBOW_CORE_URL . 'assets'));

}

if( !class_exists('Rainbow_Elements') ){

    class Rainbow_Elements
    {

        public $plugin = 'rainbow-elements';
        public $action = 'rainbow_theme_init';
        protected static $instance;

        public function __construct()
        {
            add_action('plugins_loaded', array($this, 'load_textdomain'), 20);
            add_action($this->action, array($this, 'after_theme_loaded'));
        }

        public static function instance()
        {
            if (null == self::$instance) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function after_theme_loaded()
        {

            require_once(RAINBOW_ELEMENTS_BASE_DIR . 'lib/wp-svg/init.php'); // SVG support       
            require_once(RAINBOW_ELEMENTS_BASE_DIR . 'lib/navmenu-icon/init.php'); // Navmenu icon support
            require_once(RAINBOW_ELEMENTS_BASE_DIR . 'lib/feather-elements-icons.php'); // Navmenu icon support
            include_once(RAINBOW_ELEMENTS_BASE_DIR . '/include/custom-post.php');
            include_once(RAINBOW_ELEMENTS_BASE_DIR . '/include/social-share.php');
            include_once(RAINBOW_ELEMENTS_BASE_DIR . '/include/widgets/custom-widget-register.php');
            include_once(RAINBOW_ELEMENTS_BASE_DIR . '/include/allow-svg.php');
            include_once(RAINBOW_ELEMENTS_BASE_DIR . '/include/common-functions.php');

            if (did_action('elementor/loaded')) {
                require_once(RAINBOW_ELEMENTS_BASE_DIR . 'elementor/init.php'); // Elementor
                require_once(RAINBOW_ELEMENTS_BASE_DIR . 'elementor/helper.php'); // Elementor
            }

        }

        public function load_textdomain()
        {
            load_plugin_textdomain($this->plugin, false, dirname(plugin_basename(__FILE__)) . '/languages');
        }

    }
}

Rainbow_Elements::instance();

