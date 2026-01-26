<?php
/**
 * inbio Theme Customizer
 *
 * @package inbio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (!function_exists('rainbow_customize_register')) {
    function rainbow_customize_register($wp_customize)
    {
        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
        $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

        if (isset($wp_customize->selective_refresh)) {
            $wp_customize->selective_refresh->add_partial('blogname', array(
                'selector' => '.site-title a',
                'render_callback' => 'rainbow_customize_partial_blogname',
            ));
            $wp_customize->selective_refresh->add_partial('blogdescription', array(
                'selector' => '.site-description',
                'render_callback' => 'rainbow_customize_partial_blogdescription',
            ));
        }
    }
}

add_action('customize_register', 'rainbow_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
if (!function_exists('rainbow_customize_partial_blogname')) {
    function rainbow_customize_partial_blogname()
    {
        bloginfo('name');
    }
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
if (!function_exists('rainbow_customize_partial_blogdescription')) {
    function rainbow_customize_partial_blogdescription()
    {
        bloginfo('description');
    }
}
