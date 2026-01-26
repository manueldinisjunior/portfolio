<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if (!function_exists('rainbow_widgets_init')) {
    function rainbow_widgets_init()
    {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'inbio'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'inbio'),
            'before_widget' => '<div class="%1$s inbio-single-widget %2$s mb--40">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Sidebar Shop', 'inbio'),
            'id' => 'sidebar-shop',
            'description' => esc_html__('Add widgets here.', 'inbio'),
            'before_widget' => '<div class="%1$s inbio-single-widget %2$s mb--40">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

        $number_of_widget = 4;
        $rainbow_widget_titles = array(
            '1' => esc_html__('Footer 1', 'inbio'),
            '2' => esc_html__('Footer 2', 'inbio'),
            '3' => esc_html__('Footer 3', 'inbio'),
            '4' => esc_html__('Footer 4', 'inbio'),
        );
        for ($i = 1; $i <= $number_of_widget; $i++) {
            register_sidebar(array(
                'name' => $rainbow_widget_titles[$i],
                'id' => 'footer-' . $i,
                'before_widget' => '<div id="%1$s" class="menu-footer widget %2$s"><div class="menu-wrapper">',
                'after_widget' => '</div></div>',
                'before_title' => '<div class="menu-title"><h6 class="widget-title">',
                'after_title' => '</h6></div>',
            ));
        }
    }
}
add_action('widgets_init', 'rainbow_widgets_init');