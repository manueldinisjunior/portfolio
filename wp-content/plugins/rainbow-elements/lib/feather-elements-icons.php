<?php

/**
 * Load module's scripts and styles if any module is active.
 */
function rainbow_element_enqueue()
{
   
    wp_enqueue_style('rainbow-feather-icons', RAINBOW_CORE_URL . 'assets/css/feather.css', null, '1.0');
   // wp_enqueue_script('rainbow-element-scripts', RAINBOW_CORE_URL . 'assets/js/element-scripts.js', array('jquery'), '1.0', true);
}

//add_action('wp_enqueue_scripts', 'rainbow_element_enqueue');


function rainbow_enqueue_editor_scripts()
{
    wp_enqueue_style('rainbow-element-addons-editor', RAINBOW_CORE_URL . 'assets/css/editor.css', null, '1.0');
}

add_action('elementor/editor/after_enqueue_scripts', 'rainbow_enqueue_editor_scripts');


/**
 * Check elementor version
 *
 * @param string $version
 * @param string $operator
 * @return bool
 */
function rainbow_is_elementor_version($operator = '<', $version = '2.6.0')
{
    return defined('ELEMENTOR_VERSION') && version_compare(ELEMENTOR_VERSION, $version, $operator);
}


/**
 * Render icon html with backward compatibility
 *
 * @param array $settings
 * @param string $old_icon_id
 * @param string $new_icon_id
 * @param array $attributes
 */
function rainbow_render_icon($settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = [])
{
    // Check if its already migrated
    $migrated = isset($settings['__fa4_migrated'][$new_icon_id]);
    // Check if its a new widget without previously selected icon using the old Icon control
    $is_new = empty($settings[$old_icon_id]);

    $attributes['aria-hidden'] = 'true';

    if (rainbow_is_elementor_version('>=', '2.6.0') && ($is_new || $migrated)) {
        \Elementor\Icons_Manager::render_icon($settings[$new_icon_id], $attributes);
    } else {
        if (empty($attributes['class'])) {
            $attributes['class'] = $settings[$old_icon_id];
        } else {
            if (is_array($attributes['class'])) {
                $attributes['class'][] = $settings[$old_icon_id];
            } else {
                $attributes['class'] .= ' ' . $settings[$old_icon_id];
            }
        }
        printf('<i %s></i>', \Elementor\Utils::render_html_attributes($attributes));
    }
}

/**
 * Adding custom icon to icon control in Elementor
 */
function rainbow_add_custom_icons_tab($tabs = array())
{
    // Append new icons
    $feather_icons = array(
        'feather-activity',
        'feather-airplay',
        'feather-alert-circle',
        'feather-alert-octagon',
        'feather-alert-triangle',
        'feather-align-center',
        'feather-align-justify',
        'feather-align-left',
        'feather-align-right',
        'feather-anchor',
        'feather-aperture',
        'feather-archive',
        'feather-arrow-down',
        'feather-arrow-down-circle',
        'feather-arrow-down-left',
        'feather-arrow-down-right',
        'feather-arrow-left',
        'feather-arrow-left-circle',
        'feather-arrow-right',
        'feather-arrow-right-circle',
        'feather-arrow-up',
        'feather-arrow-up-circle',
        'feather-arrow-up-left',
        'feather-arrow-up-right',
        'feather-at-sign',
        'feather-award',
        'feather-bar-chart',
        'feather-bar-chart-2',
        'feather-battery',
        'feather-battery-charging',
        'feather-bell',
        'feather-bell-off',
        'feather-bluetooth',
        'feather-bold',
        'feather-book',
        'feather-book-open',
        'feather-bookmark',
        'feather-box',
        'feather-briefcase',
        'feather-calendar',
        'feather-camera',
        'feather-camera-off',
        'feather-cast',
        'feather-check',
        'feather-check-circle',
        'feather-check-square',
        'feather-chevron-down',
        'feather-chevron-left',
        'feather-chevron-right',
        'feather-chevron-up',
        'feather-chevrons-down',
        'feather-chevrons-left',
        'feather-chevrons-right',
        'feather-chevrons-up',
        'feather-chrome',
        'feather-circle',
        'feather-clipboard',
        'feather-clock',
        'feather-cloud',
        'feather-cloud-drizzle',
        'feather-cloud-lightning',
        'feather-cloud-off',
        'feather-cloud-rain',
        'feather-cloud-snow',
        'feather-code',
        'feather-codepen',
        'feather-command',
        'feather-compass',
        'feather-copy',
        'feather-corner-down-left',
        'feather-corner-down-right',
        'feather-corner-left-down',
        'feather-corner-left-up',
        'feather-corner-right-down',
        'feather-corner-right-up',
        'feather-corner-up-left',
        'feather-corner-up-right',
        'feather-cpu',
        'feather-credit-card',
        'feather-crop',
        'feather-crosshair',
        'feather-database',
        'feather-delete',
        'feather-disc',
        'feather-dollar-sign',
        'feather-download',
        'feather-download-cloud',
        'feather-droplet',
        'feather-edit',
        'feather-edit-2',
        'feather-edit-3',
        'feather-external-link',
        'feather-eye',
        'feather-eye-off',
        'feather-facebook',
        'feather-fast-forward',
        'feather-feather',
        'feather-file',
        'feather-file-minus',
        'feather-file-plus',
        'feather-file-text',
        'feather-film',
        'feather-filter',
        'feather-flag',
        'feather-folder',
        'feather-folder-minus',
        'feather-folder-plus',
        'feather-gift',
        'feather-git-branch',
        'feather-git-commit',
        'feather-git-merge',
        'feather-git-pull-request',
        'feather-github',
        'feather-gitlab',
        'feather-globe',
        'feather-grid',
        'feather-hard-drive',
        'feather-hash',
        'feather-headphones',
        'feather-heart',
        'feather-help-circle',
        'feather-home',
        'feather-image',
        'feather-inbox',
        'feather-info',
        'feather-instagram',
        'feather-italic',
        'feather-layers',
        'feather-layout',
        'feather-life-buoy',
        'feather-link',
        'feather-link-2',
        'feather-linkedin',
        'feather-list',
        'feather-loader',
        'feather-lock',
        'feather-log-in',
        'feather-log-out',
        'feather-mail',
        'feather-map',
        'feather-map-pin',
        'feather-maximize',
        'feather-maximize-2',
        'feather-menu',
        'feather-message-circle',
        'feather-message-square',
        'feather-mic',
        'feather-mic-off',
        'feather-minimize',
        'feather-minimize-2',
        'feather-minus',
        'feather-minus-circle',
        'feather-minus-square',
        'feather-monitor',
        'feather-moon',
        'feather-more-horizontal',
        'feather-more-vertical',
        'feather-move',
        'feather-music',
        'feather-navigation',
        'feather-navigation-2',
        'feather-octagon',
        'feather-package',
        'feather-paperclip',
        'feather-pause',
        'feather-pause-circle',
        'feather-percent',
        'feather-phone',
        'feather-phone-call',
        'feather-phone-forwarded',
        'feather-phone-incoming',
        'feather-phone-missed',
        'feather-phone-off',
        'feather-phone-outgoing',
        'feather-pie-chart',
        'feather-play',
        'feather-play-circle',
        'feather-plus',
        'feather-plus-circle',
        'feather-plus-square',
        'feather-pocket',
        'feather-power',
        'feather-printer',
        'feather-radio',
        'feather-refresh-ccw',
        'feather-refresh-cw',
        'feather-repeat',
        'feather-rewind',
        'feather-rotate-ccw',
        'feather-rotate-cw',
        'feather-rss',
        'feather-save',
        'feather-scissors',
        'feather-search',
        'feather-send',
        'feather-server',
        'feather-settings',
        'feather-share',
        'feather-share-2',
        'feather-shield',
        'feather-shield-off',
        'feather-shopping-bag',
        'feather-shopping-cart',
        'feather-shuffle',
        'feather-sidebar',
        'feather-skip-back',
        'feather-skip-forward',
        'feather-slack',
        'feather-slash',
        'feather-sliders',
        'feather-smartphone',
        'feather-speaker',
        'feather-square',
        'feather-star',
        'feather-stop-circle',
        'feather-sun',
        'feather-sunrise',
        'feather-sunset',
        'feather-tablet',
        'feather-tag',
        'feather-target',
        'feather-terminal',
        'feather-thermometer',
        'feather-thumbs-down',
        'feather-thumbs-up',
        'feather-toggle-left',
        'feather-toggle-right',
        'feather-trash',
        'feather-trash-2',
        'feather-trending-down',
        'feather-trending-up',
        'feather-triangle',
        'feather-truck',
        'feather-tv',
        'feather-twitter',
        'feather-type',
        'feather-umbrella',
        'feather-underline',
        'feather-unlock',
        'feather-upload',
        'feather-upload-cloud',
        'feather-user',
        'feather-user-check',
        'feather-user-minus',
        'feather-user-plus',
        'feather-user-x',
        'feather-users',
        'feather-video',
        'feather-video-off',
        'feather-voicemail',
        'feather-volume',
        'feather-volume-1',
        'feather-volume-2',
        'feather-volume-x',
        'feather-watch',
        'feather-wifi',
        'feather-wifi-off',
        'feather-wind',
        'feather-x',
        'feather-x-circle',
        'feather-x-square',
        'feather-youtube',
        'feather-zap',
        'feather-zap-off',
        'feather-zoom-in',
        'feather-zoom-out',
    );

    $tabs['rbt-feather-icons'] = array(
        'name' => 'rbt-feather-icons',
        'label' => esc_html__('Inbio - Feather Icons', 'rainbow-elements'),
        'labelIcon' => 'rt-icon',
        'prefix' => '',
        'displayPrefix' => 'rbt',
        'url' => RAINBOW_CORE_URL . 'assets/css/feather.css',
        'icons' => $feather_icons,
        'ver' => '1.0.0',
    );

    return $tabs;
}

add_filter('elementor/icons_manager/additional_tabs', 'rainbow_add_custom_icons_tab');

