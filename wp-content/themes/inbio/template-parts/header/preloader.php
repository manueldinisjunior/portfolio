<?php
$rainbow_options = Rainbow_Helper::rainbow_get_options();
$preloader_default_image = RAINBOW_THEME_URI . '/assets/images/preloader.gif';
if ($rainbow_options['rainbow_preloader'] !== 'no') {
    if (!empty($rainbow_options['rainbow_preloader_image']['url'])) {
        $preloader_img = $rainbow_options['rainbow_preloader_image']['url'];
        echo '<div class="preloader bgimg" id="preloader" style="background-image:url(' . esc_url($preloader_img) . ');"></div>';
    } else {
        echo '<div class="preloader bgimg" id="preloader" style="background-image:url(' . esc_url($preloader_default_image) . ');"></div>';
    }
}