<?php
/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */

// Get Value
$rainbow_options = Rainbow_Helper::rainbow_get_options();
// Menu
$rainbow_nav_menu_args = Rainbow_Helper::nav_menu_args();
// Get logo
$header_layout = Rainbow_Helper::rainbow_header_layout();
$header_transparent = $header_layout['header_transparent'];
$header_sticky = $header_layout['header_sticky'];
$logo_light = empty($rainbow_options['rainbow_light_logo']['url']) ? Rainbow_Helper::get_img('logo/logo.png') : $rainbow_options['rainbow_light_logo']['url'];
$logo_dark = empty($rainbow_options['rainbow_head_logo']['url']) ? Rainbow_Helper::get_img('logo/logo-dark.png') : $rainbow_options['rainbow_head_logo']['url'];
$header_sticky = ("no" !== $header_sticky && "0" !== $header_sticky && false !== $header_sticky) ? " header--sticky" : " ";
$header_transparent = ("no" !== $header_transparent && "0" !== $header_transparent && false !== $header_transparent) ? " header--transparent" : " ";
$rainbow_sidenav_menu_args = Rainbow_Helper::rainbow_mobile_menu_args();
$mobile_logo = empty($rainbow_options['rainbow_head_mobile_logo_sidebav']['url']) ? Rainbow_Helper::get_img('logo/logos-circle.png') : $rainbow_options['rainbow_head_mobile_logo_sidebav']['url'];
$mobile_description = $rainbow_options['rainbow_head_mobile_description'];
// Get logo
$logo = empty($rainbow_options['rainbow_head_logo_sidebav']['url']) ? Rainbow_Helper::get_img('logo/logo-06.png') : $rainbow_options['rainbow_head_logo_sidebav']['url'];
$header_button = $header_layout['header_button'];
$header_button_target = $header_layout['header_button_target'];
$header_button_type = $header_layout['header_button_type'];
$button_txt = $header_layout['button_txt'];
$header_button_url = $header_layout['header_button_url'];
$menu_type = rainbow_get_acf_data( "inbio_menu_type");
if ($menu_type == "onepage"){ 
    $is_mobile = 'is-mobile-onepage';
} else {   
    $is_mobile = 'is-mobile-multipage';
}
?>
<!-- Start Header -->
<header class="header-wrapper rn-header header-style-3 haeder-default black-logo-version header--fixed <?php echo esc_attr($header_sticky); ?> rn-d-none">
    <div class="header-wrapper m--0 rn-popup-mobile-menu row align-items-center">
        <!-- Start Header Left -->
        <div class="col-lg-2 col-6">
            <div class="header-left">
                <div class="logo">
                    <?php if (isset($rainbow_options['rainbow_logo_type'])): ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"
                           title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
                            <?php if ('image' == $rainbow_options['rainbow_logo_type']): ?>
                                <?php if ($rainbow_options['rainbow_head_logo']) { ?>
                                    <img class="dark-logo" src="<?php echo esc_url($logo_dark); ?>"
                                         alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                    <img class="light-logo" src="<?php echo esc_url($logo_light); ?>"
                                         alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php } ?>
                            <?php else: ?>
                                <?php if ('text' == $rainbow_options['rainbow_logo_type']): ?>
                                    <?php echo esc_html($rainbow_options['rainbow_logo_text']); ?>
                                <?php endif ?>
                            <?php endif ?>
                        </a>
                    <?php else: ?>
                        <h3>
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_html(get_bloginfo('name', 'display')); ?>" rel="home">
                                <?php if (isset($rainbow_options['rainbow_logo_text']) ? $rainbow_options['rainbow_logo_text'] : '') {
                                    echo esc_html($rainbow_options['rainbow_logo_text']);
                                } else {
                                    bloginfo('name');
                                }
                                ?>
                            </a>
                        </h3>
                        <?php $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) { ?>
                            <p class="site-description"><?php echo esc_html($description); ?> </p>
                        <?php } ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- End Header Left -->
        <!-- Start Header Center -->
        <div class="col-lg-10 col-6">
            <div class="header-center">
                <?php if (has_nav_menu('primary')) {
                    wp_nav_menu($rainbow_nav_menu_args);
                }; ?>
                <div class="header-right">

                    <?php get_template_part('template-parts/header/mini-cart-icon'); ?>

                    <?php if ("no" !== $header_button && "0" !== $header_button): ?>
                        <a class="<?php echo esc_html($header_button_type); ?>" target="<?php echo esc_attr($header_button_target); ?>"
                           href="<?php echo esc_url($header_button_url); ?> ">
                            <span><?php echo esc_html($button_txt); ?> </span>
                        </a>
                    <?php endif; ?>  
                    <div class="hamberger-menu d-block d-xl-none">
                        <i id="menuBtn" class="feather-menu humberger-menu"></i>
                    </div>
                    <div class="close-menu d-block">
                        <span class="closeTrigger">
                        <i data-feather="x"></i>
                    </span>
                    </div>
                </div>
                <!-- End Header Right  -->
            </div>
        </div>
        <!-- End Header Center -->
    </div>
</header>
<!-- End Header Area --> 
<!-- Start Popup Mobile Menu  -->
<div class="popup-mobile-menu <?php echo esc_attr($is_mobile); ?>">
    <div class="inner">
        <div class="menu-top">
            <div class="menu-header">
                <?php if (isset($rainbow_options['rainbow_logo_type'])): ?>
                    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
                        <?php if ('image' == $rainbow_options['rainbow_logo_type']): ?>
                            <?php if ($rainbow_options['rainbow_head_logo']) { ?>
                                <img src="<?php echo esc_url($mobile_logo); ?>"
                                     alt="<?php echo esc_attr(get_bloginfo('name')); ?>">

                            <?php } ?>
                        <?php else: ?>
                            <?php if ('text' == $rainbow_options['rainbow_logo_type']): ?>
                                <?php echo esc_html($rainbow_options['rainbow_logo_text']); ?>
                            <?php endif ?>
                        <?php endif ?>
                    </a>
                <?php else: ?>
                    <h3>
                        <a href="<?php echo esc_url(home_url('/')); ?>"
                           title="<?php echo esc_html(get_bloginfo('name', 'display')); ?>" rel="home">
                            <?php if (isset($rainbow_options['rainbow_logo_text']) ? $rainbow_options['rainbow_logo_text'] : '') {
                                echo esc_html($rainbow_options['rainbow_logo_text']);
                            } else {
                                bloginfo('name');
                            }
                            ?>
                        </a>
                    </h3>
                    <?php $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) { ?>
                        <p class="site-description"><?php echo esc_html($description); ?> </p>
                    <?php } ?>
                <?php endif ?> 
                <div class="close-button">
                    <button class="close-menu-activation close"><i class="feather feather-x"></i></button>
                </div>
            </div>
            <?php if ($mobile_description): ?>
                <p class="description"><?php echo wp_kses_post($mobile_description); ?></p>
            <?php endif; ?>
        </div>
        <div class="content">
            <?php if (has_nav_menu('primary')) {
                wp_nav_menu($rainbow_sidenav_menu_args);
            } ?>

            <?php if ($rainbow_options['rainbow_social_share_button']):
                $rainbow_socials = Rainbow_Helper::rainbow_socials();
                ?>
                <div class="footer">
                    <div class="social-share-style-1">
                        <?php if ($rainbow_options['rainbow_social_share_title']): ?>
                            <span class="title"><?php echo esc_html($rainbow_options['rainbow_social_share_title']); ?></span>
                        <?php endif; ?>
                        <?php if ($rainbow_socials): ?>
                            <ul class="social-share d-flex liststyle">
                                <?php foreach ($rainbow_socials as $rbsocial): ?>
                                    <li class="single-item"><a target="_blank"
                                                               href="<?php echo esc_url($rbsocial['url']); ?>" title="<?php echo esc_attr($rbsocial['title']); ?>"><i
                                                    class="<?php echo esc_attr($rbsocial['icon']); ?>"></i></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- End Popup Mobile Menu  -->