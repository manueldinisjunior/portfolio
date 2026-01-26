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
$header_layout = Rainbow_Helper::rainbow_header_layout();
$header_sticky = $header_layout['header_sticky'];
$header_sticky = ("1" !== $header_sticky && "0" !== $header_sticky) ? " header-sticky " : "";
// Menu
$rainbow_nav_menu_args = Rainbow_Helper::rainbow_nav_sidenav_menu_args();
$rainbow_sidenav_menu_args = Rainbow_Helper::rainbow_mobile_menu_args();
// Get logo
$logo = empty($rainbow_options['rainbow_head_logo_sidebav']['url']) ? Rainbow_Helper::get_img('logo/logo-06.png') : $rainbow_options['rainbow_head_logo_sidebav']['url'];
$mlogo = empty($rainbow_options['rainbow_head_logo']['url']) ? Rainbow_Helper::get_img('logo/logo.png') : $rainbow_options['rainbow_head_logo']['url'];
$rainbow_nav_menu_args2 = Rainbow_Helper::nav_icon_menu_args();
$mobile_logo = empty($rainbow_options['rainbow_head_mobile_logo_sidebav']['url']) ? Rainbow_Helper::get_img('logo/logos-circle.png') : $rainbow_options['rainbow_head_mobile_logo_sidebav']['url'];
$mobile_description = $rainbow_options['rainbow_head_mobile_description'];
$menu_type = rainbow_get_acf_data( "inbio_menu_type");
if ($menu_type == "onepage"){ 
    $is_mobile = 'is-mobile-onepage';
} else {   
    $is_mobile = 'is-mobile-multipage';
}
?>
<div class="d-none d-xl-block">
    <header class="rn-header-area d-flex align-items-start flex-column left-header-style">
        <div id="rainbow-sticky-placeholder"></div>
        <div class="logo-area">
            <?php if (isset($rainbow_options['rainbow_logo_type'])): ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
                    <?php if ('image' == $rainbow_options['rainbow_logo_type']): ?>
                        <?php if ($rainbow_options['rainbow_head_logo_sidebav']) { ?>
                            <img class="dark-logo" src="<?php echo esc_url($logo); ?>"
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
        <?php if (has_nav_menu('sidenav')) {
            wp_nav_menu($rainbow_nav_menu_args2);
        }
        ?>
        <?php if ($rainbow_options['rainbow_social_share_button']):
            $rainbow_socials = Rainbow_Helper::rainbow_socials();
            ?>
            <div class="footer">


                <?php get_template_part('template-parts/header/mini-cart-icon'); ?>

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
    </header>
</div>
<div class="header-style-2 d-block d-xl-none">
    <div class="row align-items-center">
        <div class="col-6">
            <div class="logo">
                <?php if (isset($rainbow_options['rainbow_logo_type'])): ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
                        <?php if ('image' == $rainbow_options['rainbow_logo_type']): ?>
                            <?php if ($rainbow_options['rainbow_head_logo_sidebav']) { ?>
                                <img class="dark-logo" src="<?php echo esc_url($mlogo); ?>"
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
        <div class="col-6">
            <div class="header-right text-right">
                <div class="hamberger-menu">
                    <i id="menuBtn" class="feather-menu humberger-menu"></i>
                </div>
            </div>
        </div>
    </div>
</div>
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
            <?php if (has_nav_menu('sidenav')) {
                wp_nav_menu($rainbow_sidenav_menu_args);
            };
            ?>
            <div class="social-share-style-1 mt--40">
                <?php if ($rainbow_options['rainbow_social_share_title']): ?>
                    <span class="title"><?php echo esc_html($rainbow_options['rainbow_social_share_title']); ?></span>
                <?php endif; ?>

                <?php 
                 $rainbow_socials = Rainbow_Helper::rainbow_socials();
                 if ($rainbow_socials): ?>
                    <ul class="social-share d-flex liststyle">
                        <?php foreach ($rainbow_socials as $rbsocial): ?>
                            <li class="single-item"><a target="_blank" href="<?php echo esc_url($rbsocial['url']); ?>" title="<?php echo esc_attr($rbsocial['title']); ?>">
                                <i class="<?php echo esc_attr($rbsocial['icon']); ?>"></i></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <!-- end -->
        </div>
    </div>
</div>