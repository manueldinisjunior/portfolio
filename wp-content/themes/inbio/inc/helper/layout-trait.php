<?php

/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */
trait rainbowLayoutTrait
{

    // Sidebar
    public static function get_sidebar_http_options()
    {
        if (isset($_GET['sidebar'])) {
            if ($_GET['sidebar'] == 'left') {
                $layout = 'left-sidebar';
            }
            if ($_GET['sidebar'] == 'right') {
                $layout = 'right-sidebar';
            }
            if ($_GET['sidebar'] == 'full') {
                $layout = 'full-width';
            }
            return $layout;

        }
    }
 

    public static function rainbow_left_get_sidebar()
    {
        $layout_abj = Rainbow_Helper::rainbow_layout_style_all();
        $layout = $layout_abj['layout'];
        if ($layout == 'left-sidebar') {
            get_sidebar();
        }
        return;
    }

    public static function rainbow_right_get_sidebar()
    {
        $layout_abj = Rainbow_Helper::rainbow_layout_style_all();
        $layout = $layout_abj['layout'];
        if ($layout == 'right-sidebar') {
            get_sidebar();
        }
        return;
    }


    /**
     * @return array
     * Project Popup Layout
     */
    public static function rainbow_portfolio_popup_style()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();

        /**
         * Get Page Options value
         */
        $project_popup_style = rainbow_get_acf_data('popup_layout');
        $tm_project_popup_style = (isset($rainbow_options['rainbow_project_popup_layout'])) ? $rainbow_options['rainbow_project_popup_layout'] : "";

        /**
         * Set Condition
         */
        $project_popup_style = (empty($project_popup_style) || $project_popup_style == "0" || $project_popup_style == "default") ? $tm_project_popup_style : $project_popup_style;

        /**
         * Load Value
         */
        $project_popup_layout = [
            'project_popup_style' => $project_popup_style,
        ];
        return $project_popup_layout;

    }


    /**
     * @return array
     * Header Layout
     */
    public static function rainbow_header_layout()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();
        $themepfix = 'rainbow';

        /**
         * Get Page Options value
         */
        if (class_exists('ACF')) {
            $header_area = rainbow_get_acf_data($themepfix . '_show_header');
            $header_style = rainbow_get_acf_data($themepfix . "_select_header_style");
            $header_sticky = rainbow_get_acf_data($themepfix . "_header_sticky");
            $header_transparent = rainbow_get_acf_data($themepfix . "_header_transparent");
            $header_button = rainbow_get_acf_data('rainbow_header_button');
            $header_button_target = rainbow_get_acf_data("rainbow_button_target");
            $header_button_type = rainbow_get_acf_data("rainbow_button_type");
            $button_url = rainbow_get_acf_data("rainbow_header_button_url");
            $button_txt = rainbow_get_acf_data("rainbow_header_button_txt");

        }

        /**
         * Set Condition
         */
        $header_area = (empty($header_area)) ? $rainbow_options['rainbow_enable_header'] : $header_area;
        $header_style = (empty($header_style) || $header_style == "0") ? $rainbow_options['rainbow_select_header_template'] : $header_style;
        $header_sticky = (empty($header_sticky)) ? $rainbow_options['rainbow_header_sticky'] : $header_sticky;
        $header_transparent = (empty($header_transparent)) ? $rainbow_options['rainbow_header_transparent'] : $header_transparent;

        $header_button = (empty($header_button)) ? $rainbow_options['rainbow_enable_button'] : $header_button;
        $header_button_target = (empty($header_button_target)) ? $rainbow_options['button_target'] : $header_button_target;
        $header_button_type = (empty($header_button_type)) ? $rainbow_options['button_type'] : $header_button_type;
        $button_txt = (empty($button_txt)) ? $rainbow_options['button_txt'] : $button_txt;
        $header_button_url = (empty($button_url)) ? $rainbow_options['button_url'] : $button_url;

        /**
         * Load Value
         */

        $header_layout = [
            'header_area' => $header_area,
            'header_style' => $header_style,
            'header_sticky' => $header_sticky,
            'header_transparent' => $header_transparent,

            'header_button' => $header_button,
            'header_button_target' => $header_button_target,
            'header_button_type' => $header_button_type,
            'button_txt' => $button_txt,
            'header_button_url' => $header_button_url,

        ];
        return $header_layout;

    }

    /**
     * @return array
     * Header Top Layout
     */
    public static function rainbow_header_top_layout()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();
        $themepfix = 'inbio';

        /**
         * Get Page Options value
         */
        if (class_exists('ACF')) {
            $header_area = get_field($themepfix . '_show_header');
            $header_style = get_field($themepfix . "_select_header_style");
            $header_sticky = get_field($themepfix . "_header_sticky");

        } 
        /**
         * Set Condition
         */
        $header_top_area = (empty($header_top_area)) ? $rainbow_options['rainbow_header_top_enable'] : $header_top_area;
        $header_top_style = (empty($header_top_style) || $header_top_style == "0") ? $rainbow_options['rainbow_select_header_top_template'] : $header_top_style;

        /**
         * Load Value
         */
        $header_layout = [
            'header_area' => $header_area,
            'header_style' => $header_style,
            'header_sticky' => $header_sticky,

        ];
        return $header_layout;

    }

    /**
     * @return array
     * Footer Layout
     */
    public static function rainbow_footer_layout()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();

        /**
         * Get Page Options value
         */
        $footer_area = rainbow_get_acf_data('rainbow_show_footer');
        $footer_style = rainbow_get_acf_data('rainbow_select_footer_style');

        /**
         * Set Condition
         */
        $footer_area = (empty($footer_area)) ? $rainbow_options['rainbow_footer_enable'] : $footer_area;
        $footer_style = (empty($footer_style) || $footer_style == "0") ? $rainbow_options['rainbow_select_footer_template'] : $footer_style;

        /**
         * Load Value
         */
        $footer_layout = [
            'footer_area' => $footer_area,
            'footer_style' => $footer_style,
        ];
        return $footer_layout;

    }

    /**
     * @return array
     * Footer Layout
     */
    public static function rainbow_shop_notification_enable()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();

        /**
         * Get Page Options value
         */
        $rainbow_shop_notification_enable = rainbow_get_acf_data('rainbow_shop_notification_enable');

        /**
         * Set Condition
         */
        $rainbow_shop_notification_enable = (empty($rainbow_shop_notification_enable)) ? $rainbow_options['rainbow_shop_notification_enable'] : $rainbow_shop_notification_enable;

        /**
         * Load Value
         */
        $rainbow_shop_notification_enable = [
            'shop_notification' => $rainbow_shop_notification_enable,
        ];
        return $rainbow_shop_notification_enable;
    }

    /**
     * @return array
     * Footer Layout
     */
    public static function rainbow_post_banner_style()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();

        /**
         * Get Page Options value
         */
        $post_banner_style = rainbow_get_acf_data('select_banner_style');
        $rainbow_single_post_style = (isset($rainbow_options['rainbow_single_post_style'])) ? $rainbow_options['rainbow_single_post_style'] : "";

        /**
         * Set Condition
         */
        $post_banner_style = (empty($post_banner_style) || $post_banner_style == "0") ? $rainbow_single_post_style : $post_banner_style;

        /**
         * Load Value
         */
        $post_banner_layout = [
            'post_banner_style' => $post_banner_style,
        ];
        return $post_banner_layout;

    }


    /**
     * @return array
     * Footer Layout
     */
    public static function rainbow_product_layout_style()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();

        /**
         * Get Page Options value
         */

        $product_wc_single_layout = rainbow_get_acf_data('product_wc_single_layout');
        $rainbow_product_wc_single_layout = (isset($rainbow_options['product_wc_single_layout'])) ? $rainbow_options['product_wc_single_layout'] : "";

        /**
         * Set Condition
         */
        $layout = (empty($product_wc_single_layout) || $product_wc_single_layout == "0") ? $rainbow_product_wc_single_layout : $product_wc_single_layout;


        if (isset($_GET['ps'])) {
            if ($_GET['ps'] == '1') {
                $layout = '1';
            }
            if ($_GET['ps'] == '2') {
                $layout = '2';
            }
            if ($_GET['ps'] == '3') {
                $layout = '3';
            }
            if ($_GET['ps'] == '4') {
                $layout = '4';
            }
            if ($_GET['ps'] == '5') {
                $layout = '5';
            }
        } else {
            $layout = $layout;
        }

        return $layout;

    }

    /**
     * @return array
     * Footer Layout
     */
    public static function rainbow_footer_top_layout()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();

        /**
         * Get Page Options value
         */
        $footer_top_area = rainbow_get_acf_data('rainbow_show_footer_top');
        /**
         * Set Condition
         */
        $footer_top_area = (empty($footer_top_area)) ? $rainbow_options['rainbow_footer_top_enable'] : $footer_top_area;

        /**
         * Load Value
         */
        $footer_top_layout = [
            'footer_top_area' => $footer_top_area,
        ];
        return $footer_top_layout;

    }

    // Sidebar
    public static function rainbow_sidebar_options()
    {

        $rainbow_options = Rainbow_Helper::rainbow_get_options();

        /**
         * Get Page Options value
         */
        $select_sidebar = rainbow_get_acf_data('select_sidebar');

        /**
         * Set Condition
         */
        $sidebar = (empty($select_sidebar) || $select_sidebar == "0") ? $rainbow_options['rainbow_single_pos'] : $select_sidebar;

        return $sidebar;

    }

    // Menu Option
    public static function rainbow_logos()
    {
        $rainbow_options = self::rainbow_get_options();
        // Logo
        $rainbow_dark_logo = empty($rainbow_options['logo']['url']) ? self::get_img('logo-black.svg') : $rainbow_options['logo']['url'];
        $rainbow_light_logo = empty($rainbow_options['logo_light']['url']) ? self::get_img('logo-white.svg') : $rainbow_options['logo_light']['url'];
        $rainbow_logo_symbol = empty($rainbow_options['logo_symbol']['url']) ? self::get_img('logo-symbol.svg') : $rainbow_options['logo_symbol']['url'];
        $menu_option = [
            'rainbow_dark_logo' => $rainbow_dark_logo,
            'rainbow_light_logo' => $rainbow_light_logo,
            'rainbow_logo_symbol' => $rainbow_logo_symbol
        ];
        return $menu_option;
    }

    // Page layout style
    public static function rainbow_layout_style()
    {
        $themepfix = 'inbio';
        $rainbow_options = self::rainbow_get_options();
        $condipfix = self::rainbow_layout_settings();

        if (is_single() || is_page()) {
            $layout = get_post_meta(get_the_ID(), $themepfix . "_layout", true);
            $layout = (empty($layout) || $layout == 'default') ? $rainbow_options[$condipfix . "_layout"] : $layout;

        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            $layout = (empty($layout) || $layout == 'default') ? $rainbow_options[$condipfix . "_layout"] : $layout;
        }

        return $layout;
    }

    // layout style
    public static function rainbow_layout_style_all()
    {
        $themepfix = 'inbio';
        $rainbow_options = self::rainbow_get_options();
        $condipfix = self::rainbow_layout_settings();
        $sidebar = Rainbow_Helper::rainbow_sidebar_options();
        $has_sidebar_contnet = (is_active_sidebar($sidebar) || is_active_sidebar('sidebar')) ? 'col-xl-8 inbio-main' : 'col-xl-12 inbio-main';

        if (is_single() || is_page()) {
            $layout = get_post_meta(get_the_ID(), $themepfix . "_layout", true);
            $layout = (empty($layout) || $layout == 'default') ? $rainbow_options[$condipfix . "_layout"] : $layout;

        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            $layout = (empty($layout) || $layout == 'default') ? $rainbow_options[$condipfix . "_layout"] : $layout;
        }

        if (isset($_GET['sidebar'])) {
            if ($_GET['sidebar'] == 'left') {
                $layout = 'left-sidebar';
            }
            if ($_GET['sidebar'] == 'right') {
                $layout = 'right-sidebar';
            }
            if ($_GET['sidebar'] == 'full') {
                $layout = 'full-width';
            }
        }

        // Layout class
        if ($layout == 'full-width') {
            $layout_class = 'col-12';
            $post_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 masonry-item';
        } else {
            $layout_class = $has_sidebar_contnet;
            $post_class = 'col-12';
        }

        $layout = [
            'layout' => $layout,
            'layout_class' => $layout_class,
            'post_class' => $post_class,
        ];
        return $layout;
    }

    // layout style
    public static function rainbow_layout_custom_taxonomy()
    {
        $rainbow_options = self::rainbow_get_options();
        $condipfix = self::rainbow_layout_settings();
        $layout = $rainbow_options[$condipfix . "_layout"];
        $sidebar = Rainbow_Helper::rainbow_sidebar_options();
        $has_sidebar_contnet = (is_active_sidebar($sidebar) || is_active_sidebar('sidebar')) ? 'col-xl-8 inbio-main' : 'col-xl-12 inbio-main';

        // Layout class
        if ($layout == 'full-width') {
            $layout_class = 'col-12';
            $post_class = 'col-lg-4';
        } else {
            $layout_class = $has_sidebar_contnet;
            $post_class = 'col-lg-6';
        }

        if (isset($_GET['sidebar'])) {
            if ($_GET['sidebar'] == 'left') {
                $layout = 'left-sidebar';
            }
            if ($_GET['sidebar'] == 'right') {
                $layout = 'right-sidebar';
            }
            if ($_GET['sidebar'] == 'full') {
                $layout = 'full-width';
            }
        }

        $layout = [
            'layout' => $layout,
            'layout_class' => $layout_class,
            'post_class' => $post_class,
        ];
        return $layout;
    }

    /**  Footer Options */
    public static function rainbow_active_footer()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();
        if (!$rainbow_options['footer_area']) {
            return false;
        }
        $footer_column = $rainbow_options['footer_column'];
        for ($i = 1; $i <= $footer_column; $i++) {
            if (is_active_sidebar('footer-' . $i)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Custom Sidebar
     */
    public static function get_custom_sidebar_fields()
    {
        $themepfix = 'inbio';
        $sidebar_fields = array();
        $sidebar_fields['sidebar'] = esc_html__('Sidebar', 'inbio');
        $sidebar_fields['widgets-shop'] = esc_html__('shop', 'inbio');
        $sidebars = get_option("{$themepfix}_custom_sidebars", array());
        if ($sidebars) {
            foreach ($sidebars as $sidebar) {
                $sidebar_fields[$sidebar['id']] = $sidebar['name'];
            }
        }
        return $sidebar_fields;
    }


}