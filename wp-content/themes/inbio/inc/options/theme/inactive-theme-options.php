<?php

/**
 * Adds a submenu page under a custom post type parent.
 */
add_action('admin_menu', 'rbt_inactive_theme_options_page');

function rbt_inactive_theme_options_page() {
    add_submenu_page(
        'inbio',
        __( 'Theme Options', 'inbio' ),
        __( 'Theme Options', 'inbio' ),
        'manage_options',
        'inactive-theme-options',
        'rbt_inactive_theme_options_page_callback'
    );
}

/**
 * Display callback for the submenu page.
 */
function rbt_inactive_theme_options_page_callback() { 
    ?>
    <div class="wrap">
        <h1><?php _e( 'Theme Options', 'inbio' ); ?></h1>
        <h4><?php _e( 'Please activate your theme and utilize the theme options.', 'inbio' ); ?></h4>

        <div class="image--box">
            <a class="rbt-image-link" href="<?php echo esc_url(home_url()); ?>/wp-admin/admin.php?page=inbio"><img style="width: 100%;" src="<?php echo get_template_directory_uri(); ?>/assets/images/inbio-option-sh.png" alt="Inactive Options"></a>
        </div>

    </div>
    <?php
}


