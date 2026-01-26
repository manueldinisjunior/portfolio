<?php
$rainbow_options = Rainbow_Helper::rainbow_get_options();
$rainbow_mobile_menu_args = Rainbow_Helper::rainbow_mobile_menu_args();
?>

<!-- Start Mobile Menu Area  -->
<div class="popup-mobilemenu-area">
    <div class="inner">
        <div class="mobile-menu-top">
            <div class="logo">
                <?php if (isset($rainbow_options['rainbow_logo_type'])): ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home"> 
                        <?php if ('image' == $rainbow_options['rainbow_logo_type']): ?> 
                            <?php if ($rainbow_options['rainbow_head_logo']) { ?>
                                <img class="dark-logo"
                                     src="<?php echo esc_url($rainbow_options['rainbow_head_logo']['url']); ?>"
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
                           title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
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
            <div class="mobile-close">
                <div class="icon">
                    <i class="fal fa-times"></i>
                </div>
            </div>
        </div>
        <?php if (has_nav_menu('primary')) {
            wp_nav_menu($rainbow_mobile_menu_args);
        } ?>
    </div>
</div>
<!-- End Mobile Menu Area  -->