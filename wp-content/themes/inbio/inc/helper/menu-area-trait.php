<?php

/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */
trait rainbowMenuAreaTrait
{

    public static function rainbow_mobile_menu_args()
    {
     
        $pagemenu = false;
        $icon_display = true;
        $text_display = true;
        if ((is_single() || is_page())) {
            $haspagemenu = get_post_meta(get_the_id(), "rainbow_select_nav_menu", true);
            if (!empty($haspagemenu)) {
                $menuid = $haspagemenu;
            } else {
                $menuid = '';
            }

            if (!empty($menuid) && $menuid != 'default') {
                $pagemenu = $menuid;
            }
        }
        if ($pagemenu) {
            $nav_menu_args = array(
                'menu' => $pagemenu,
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'mainmenu-nav navbar-example2 d-xl-block',
                'container_id' => 'sideNavMobile',
                'menu_class' => 'primary-menu nav nav-pills onepagenav',
                'menu_id' => '',
                'fallback_cb' => false,
                'walker' => new \Rainbow_Nav_Walker($icon_display, $text_display)
            );
        } else {
            $nav_menu_args = array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'mainmenu-nav navbar-example2',
                'container_id' => 'onepagenav',
                'menu_class' => 'primary-menu nav nav-pills onepagenav',
                'menu_id' => ''
                 
            );
        }

        return $nav_menu_args;
    }


    public static function rainbow_mobile_menu_args_one()
    {
     
        $pagemenu = false;
        $icon_display = true;
        $text_display = true;
        if ((is_single() || is_page())) {
            $haspagemenu = get_post_meta(get_the_id(), "rainbow_select_nav_menu", true);
            if (!empty($haspagemenu)) {
                $menuid = $haspagemenu;
            } else {
                $menuid = '';
            }

            if (!empty($menuid) && $menuid != 'default') {
                $pagemenu = $menuid;
            }
        }
        if ($pagemenu) {
            $nav_menu_args = array(
                'menu' => $pagemenu,
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'mainmenu-nav navbar-example2 d-xl-block',
                'container_id' => 'sideNavMobile',
                'menu_class' => 'primary-menu nav nav-pills',
                'menu_id' => '',
                'fallback_cb' => false,
                'walker' => new \Rainbow_Nav_Walker($icon_display, $text_display)
            );
        } else {
            $nav_menu_args = array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'mainmenu-nav navbar-example2',
                'container_id' => '',
                'menu_class' => 'primary-menu nav nav-pills',
                'menu_id' => ''
               
            );
        }

        return $nav_menu_args;
    }

    public static function nav_menu_args()
    {
        
        $pagemenu = false;
        $icon_display = true;
        $text_display = true;
        if ((is_single() || is_page())) {
            $haspagemenu = get_post_meta(get_the_id(), "rainbow_select_nav_menu", true);
            if (!empty($haspagemenu)) {
                $menuid = $haspagemenu;
            } else {
                $menuid = '';
            }

            if (!empty($menuid) && $menuid != 'default') {
                $pagemenu = $menuid;
            }
        }
        if ($pagemenu) {
            $nav_menu_args = array(
                'menu' => $pagemenu,
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'mainmenu-nav navbar-example2 d-none d-xl-block',
                'container_id' => 'onepagenav',
                'menu_class' => 'primary-menu nav nav-pills onepagenav',
                'menu_id' => '',
                'fallback_cb' => false,
                'walker' => new \Rainbow_Nav_Walker($icon_display, $text_display)
            );
        } else {
            $nav_menu_args = array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'mainmenu-nav navbar-example2 d-none d-xl-block',
                'container_id' => 'sideNav',
                'menu_class' => 'primary-menu nav nav-pills onepagenav',
                'menu_id' => ''
          
            );
        }

        return $nav_menu_args;
    }

    public static function nav_icon_menu_args()
    {
        $pagemenu = false;
        $icon_display = true;
        $text_display = true;

        if ((is_single() || is_page())) {
            $haspagemenu = get_post_meta(get_the_id(), "rainbow_select_nav_menu", true);
            if (!empty($haspagemenu)) {
                $menuid = $haspagemenu;
            } else {
                $menuid = '';
            }

            if (!empty($menuid) && $menuid != 'default') {
                $pagemenu = $menuid;
            }
        }
        if ($pagemenu) {

            $nav_menu_args = array(

                'menu' => $pagemenu,
                'theme_location' => 'sidenav',
                'container' => 'nav',
                'container_class' => 'mainmenu-nav navbar-example2',
                'container_id' => 'sideNav',
                'menu_class' => 'primary-menu nav nav-pills onepagenav',
                'fallback_cb' => false,
                'walker' => new \Rainbow_Nav_Walker($icon_display, $text_display)

            );
        } else {
            $nav_menu_args = array(

                'theme_location' => 'sidenav',
                'container' => 'nav',
                'container_class' => 'mainmenu-nav navbar-example2',
                'container_id' => 'sideNav',
                'menu_class' => 'primary-menu nav nav-pills',
//                'menu_id' => 'sideNav',
                'fallback_cb' => false,
                'walker' => new \Rainbow_Nav_Walker($icon_display, $text_display)

            );
        }

        return $nav_menu_args;
    }


    // Nav Menu Call
    public static function rainbow_nav_menu_args()
    {
        $rainbow_nav_menu_args = array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'mainmenu-nav navbar-example2 d-none d-xl-block',
            'menu_class' => 'primary-menu nav nav-pills',
            'menu_id' => 'sideNav',
            'fallback_cb' => false,
            'walker' => new Rainbow_Nav_Walker(),
        );

        return $rainbow_nav_menu_args;
    }

    // Nav Menu Call
    public static function rainbow_nav_sidenav_menu_args()
    {
        $rainbow_nav_menu_args = array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'mainmenu-nav navbar-example2',
            'container_id' => 'primary',
            'menu_class' => 'primary-menu nav nav-pills',
            'menu_id' => 'main-menu',
            'fallback_cb' => false,
            'walker' => new Rainbow_Nav_Walker(),
        );

        return $rainbow_nav_menu_args;
    }

    // Footer bottom Menu args
    public static function rainbow_heaedr_top_menu_args()
    {
        $rainbow_heaedr_top_menu_args = array(
            'theme_location' => 'headertop',
            'container' => '',
            'menu_class' => "quick-link",
            'depth' => 1,
            'fallback_cb' => false
        );

        return $rainbow_heaedr_top_menu_args;
    }

    // Off-Canvas Menu args
    public static function rainbow_offcanvas_menu_args()
    {
        $rainbow_offcanvas_menu_args = array(
            'theme_location' => 'offcanvas',
            'container' => 'div',
            'menu_class' => "main-navigation",
            'fallback_cb' => false
        );

        return $rainbow_offcanvas_menu_args;
    }

    // Footer bottom Menu args
    public static function rainbow_footer_bottom_menu_args()
    {
        $rainbow_footer_bottom_menu_args = array(
            'theme_location' => 'footerbottom',
            'container' => '',
            'menu_class' => "quick-link",
            'depth' => 1,
            'fallback_cb' => false
        );

        return $rainbow_footer_bottom_menu_args;
    }

}