<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Redux')) {
    return;
}
if ( !function_exists('awLoadPostTemplateInbio') ){
    
    function awLoadPostTemplateInbio($post_type){
        $awca = array();
        if(isset($_REQUEST['page']) && $_REQUEST['page'] == "rainbow_options"){
            $args = array( 'post_type' => $post_type, 'posts_per_page' => -1 );
        
            $queryAnwar = new WP_Query( $args );
            while( $queryAnwar->have_posts() ): $queryAnwar->the_post();
            error_log('in while');
                $cft = ( get_the_post_thumbnail_url() ) ? get_the_post_thumbnail_url() : get_template_directory_uri().'/assets/images/optionframework/placeholder.png' ;
                $data=array();
                $data['title']= "<h2 class='aw-image-select-title'>".get_the_title()."</h2>" ."<a class='aw-btn-style-link aw-image-select-edit-link' href='". admin_url('post.php?post='.get_the_ID().'&action=elementor') ."'>Edit This Layout</a>";
                $data['img']=$cft;
                $data['alt']= get_the_title();
                
                $awca[get_the_ID()] =$data;
            endwhile;
    
            wp_reset_postdata();
            wp_reset_query();
            
            //$export=var_export($awca, true);
            
            return $awca;
        }
    }
}


$opt_name = 'rainbow_options';
$theme = wp_get_theme();
$menu_type = InbioEducationThemes::$licence_activated ? 'submenu': 'hidden';
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panelr
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => $menu_type,
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Theme Options', 'inbio'),
    'page_title' => esc_html__('Theme Options', 'inbio'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    'forced_dev_mode_off' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => RAINBOW_THEME_FIX . '_options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    'footer_credit' => '&nbsp;',
    // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    'hide_expand' => true,
    // This variable determines if the ‘Expand Options’ buttons is visible on the options panel.
);
Redux::disable_demo();
Redux::setArgs($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

// -> START Basic Fields

/**
 * General
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'inbio'),
    'id' => 'rainbow_general',
    'icon' => 'el el-cog',
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('General Setting', 'inbio'),
    'id' => 'inbio-general-setting',
    'icon' => 'el el-adjust-alt',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'active_dark_mode',
            'type' => 'switch',
            'title' => esc_html__('Switch to Dark Mode', 'inbio'),
            'on' => esc_html__('Yes', 'inbio'),
            'off' => esc_html__('No', 'inbio'),
            'default' => true,
        ),

        array(
            'id' => 'active_box_wrapper',
            'type' => 'switch',
            'title' => esc_html__('Switch Box Wrapper', 'inbio'),
            'on' => esc_html__('Yes', 'inbio'),
            'off' => esc_html__('No', 'inbio'),
            'default' => false
        ),

        array(
            'id' => 'rainbow_logo_type',
            'type' => 'button_set',
            'title' => esc_html__('Select Logo Type', 'inbio'),
            'subtitle' => esc_html__('Select logo type, if the image is chosen the existing options of  image below will work, or text option will work. (Note: Used when Transparent Header is enabled.)', 'inbio'),
            'options' => array(
                'image' => 'Image',
                'text' => 'Text',
            ),
            'default' => 'image',
        ),
        array(
            'id' => 'rainbow_head_logo',
            'title' => esc_html__('Default Logo', 'inbio'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'inbio'),
            'type' => 'media',
            'default' => array(
                'url' => RAINBOW_IMG_URL . 'logo-dark.png'
            ),
            'required' => array('rainbow_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'rainbow_light_logo',
            'title' => esc_html__('Light Logo', 'inbio'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'inbio'),
            'type' => 'media',
            'default' => array(
                'url' => RAINBOW_IMG_URL . 'logo.png'
            ),
            'required' => array('rainbow_logo_type', 'equals', 'image'),
        ),

        array(
            'id' => 'rainbow_head_logo_sidebav',
            'title' => esc_html__('Header Side Navigation Logo', 'inbio'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'inbio'),
            'type' => 'media',
            'default' => array(
                'url' => RAINBOW_IMG_URL . 'logo-06.png'
            ),
            'required' => array('rainbow_logo_type', 'equals', 'image'),
        ),


        array(
            'id' => 'rainbow_head_mobile_logo_sidebav',
            'title' => esc_html__('Header Mobile Navigation Logo', 'inbio'),
            'subtitle' => esc_html__('Upload the main logo of your site. ( Recommended size: Width 267px and Height: 70px )', 'inbio'),
            'type' => 'media',
            'default' => array(
                'url' => RAINBOW_IMG_URL . 'logos-circle.png'
            ),
            'required' => array('rainbow_logo_type', 'equals', 'image'),
        ),

        array(
            'id' => 'rainbow_head_mobile_description',
            'type' => 'editor',
            'title' => esc_html__('Description', 'inbio'),
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 2,
            ),
            'default' => 'Inbio is a all in one personal portfolio WordPress theme. You can customize everything.',

        ),

        array(
            'id' => 'rainbow_logo_max_height',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Logo Height', 'inbio'),
            'subtitle' => esc_html__('Set custom logo height. Default value: 50px', 'inbio'),
            'width' => false,
            'output' => array(
                'max-height' => '.header-left .logo img'
            ),
            'required' => array('rainbow_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'rainbow_logo_padding',
            'type' => 'spacing',
            'title' => esc_html__('Logo Padding', 'inbio'),
            'subtitle' => esc_html__('Controls the top, right, bottom and left padding of the logo. (Note: Used when Transparent Header is enabled.)', 'inbio'),
            'mode' => 'padding',
            'units' => array('em', 'px'),
            'default' => array(
                'padding-top' => 'px',
                'padding-right' => 'px',
                'padding-bottom' => 'px',
                'padding-left' => 'px',
                'units' => 'px',
            ),
            'output' => array('.header-left .logo a'),

            'required' => array('rainbow_logo_type', 'equals', 'image'),
        ),
        array(
            'id' => 'rainbow_logo_text',
            'type' => 'text',
            'required' => array('rainbow_logo_type', 'equals', 'text'),
            'title' => esc_html__('Site Title', 'inbio'),
            'subtitle' => esc_html__('Enter your site title here. (Note: Used when Transparent Header is enabled.)', 'inbio'),
            'default' => get_bloginfo('name')
        ),
        array(
            'id' => 'rainbow_logo_text_font',
            'type' => 'typography',
            'title' => esc_html__('Site Title Font Settings', 'inbio'),
            'required' => array('rainbow_logo_type', 'equals', 'text'),
            'google' => true,
            'subsets' => false,
            'line-height' => false,
            'text-transform' => true,
            'transition' => false,
            'text-align' => false,
            'preview' => false,
            'all_styles' => true,
            'output' => array('.header-left .logo a, .haeder-default .header-brand a'),
            'units' => 'px',
            'subtitle' => esc_html__('Controls the font settings of the site title. (Note: Used when Transparent Header is enabled.)', 'inbio'),
            'default' => array(
                'google' => true,
            )
        ),
        // End logo
        array(
            'id' => 'rainbow_scroll_to_top_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Back To Top', 'inbio'),
            'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Yes', 'inbio'),
                'no' => esc_html__('No', 'inbio'),
            ),
            'default' => 'no'
        ),
        array(
            'id'       => 'rainbow_scroll_to_top_position',
            'type'     => 'select',
            'title'    => esc_html__('Select Position', 'inbio'),
            'subtitle'    => esc_html__('You can set your back to top button position left or right.', 'inbio'),
            'options'  => array(
                'left' => esc_html__('Left', 'inbio'),
                'right' => esc_html__('Right', 'inbio'),
            ),
            'default'  => 'right',
            'required' => array('rainbow_scroll_to_top_enable', 'equals', 'yes'),
        ),


    )
));


Redux::setSection(
    $opt_name,
    array(
        'title' => esc_html__('Contact & Socials', 'inbio'),
        'id' => 'socials_section',
        'heading' => esc_html__('Contact & Socials', 'inbio'),
        'desc' => esc_html__('In case you want to hide any field, just keep that field empty', 'inbio'),
        'icon' => 'el el-twitter',


        'fields' => array(


            array(
                'id' => 'social_title',
                'type' => 'text',
                'title' => esc_html__('Social Title', 'inbio'),
                'default' => esc_html__('Follow us', 'inbio'),
            ),
            array(
                'id' => 'rainbow_social_share_title',
                'type' => 'text',
                'title' => esc_html__('Social Title For Headers', 'inbio'),
                'default' => esc_html__('find with me', 'inbio'),
            ),
            array(
                'id' => 'social_facebook',
                'type' => 'text',
                'title' => esc_html__('Facebook', 'inbio'),
                'default' => '#',
            ),
            array(
                'id' => 'social_twitter',
                'type' => 'text',
                'title' => esc_html__('Twitter', 'inbio'),
                'default' => '#',
            ),

            array(
                'id' => 'social_linkedin',
                'type' => 'text',
                'title' => esc_html__('Linkedin', 'inbio'),
                'default' => '#',
            ),
            array(
                'id' => 'social_youtube',
                'type' => 'text',
                'title' => esc_html__('Youtube', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram', 'inbio'),
                'default' => '',
            ),

            array(
                'id' => 'social_tiktok',
                'type' => 'text',
                'title' => esc_html__('TikTok', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_telegram',
                'type' => 'text',
                'title' => esc_html__('Telegram', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_snapchat',
                'type' => 'text',
                'title' => esc_html__('Snapchat', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_whatsapp',
                'type' => 'text',
                'title' => esc_html__('WhatsApp', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_pinterest',
                'type' => 'text',
                'title' => esc_html__('Pinterest', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_reddit',
                'type' => 'text',
                'title' => esc_html__('Reddit', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_qq',
                'type' => 'text',
                'title' => esc_html__('QQ', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_vimeo',
                'type' => 'text',
                'title' => esc_html__('Vimeo', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_skype',
                'type' => 'text',
                'title' => esc_html__('Skype', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_viber',
                'type' => 'text',
                'title' => esc_html__('Viber', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_wordpress',
                'type' => 'text',
                'title' => esc_html__('WordPress', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_discord',
                'type' => 'text',
                'title' => esc_html__('discord', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_stack_overflow',
                'type' => 'text',
                'title' => esc_html__('Stack Overflow', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_stack_dribbble',
                'type' => 'text',
                'title' => esc_html__('Dribbble', 'inbio'),
                'default' => '',
            ),
            array(
                'id' => 'social_stack_behance',
                'type' => 'text',
                'title' => esc_html__('Behance', 'inbio'),
                'default' => '',
            ),



        )
    )
);


/**
 * Header
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'inbio'),
    'id' => 'header_id',
    'icon' => 'el el-minus',
    'fields' => array(
        array(
            'id' => 'rainbow_enable_header',
            'type' => 'switch',
            'title' => esc_html__('Header', 'inbio'),
            'subtitle' => esc_html__('Enable or disable the header area.', 'inbio'),
            'default' => true
        ),

        array(
            'id' => 'rainbow_header_sticky',
            'type' => 'switch',
            'title' => esc_html__('Enable Sticky Header ', 'inbio'),
            'subtitle' => esc_html__('Enable to activate the sticky header.', 'inbio'),
            'default' => false,
            'required' => array('rainbow_enable_header', 'equals', true),
        ),

        array(
            'id' => 'rainbow_header_transparent',
            'type' => 'switch',
            'title' => esc_html__('Enable Transparent Header ', 'inbio'),
            'subtitle' => esc_html__('Enable to activate the transparent header.', 'inbio'),
            'default' => false,
            'required' => array('rainbow_enable_header', 'equals', true),
        ),

        array(
            'id' => 'rainbow_header_offset',
            'type' => 'text',
            'title' => esc_html__('Header One Page Menu offset', 'inbio'),
            'default' => '90',
            'required' => array('rainbow_enable_header', 'equals', true),
        ),
        // Header Custom Style
        array(
            'id' => 'rainbow_select_header_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Header Layout', 'inbio'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Header Layout 1', 'inbio'),
                    'title' => esc_html__('Header Layout 1', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                ),
                '2' => array(
                    'alt' => esc_html__('Header Layout 2', 'inbio'),
                    'title' => esc_html__('Header Layout 2', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/header/2.png',
                ),
                '3' => array(
                    'alt' => esc_html__('Header Layout 3', 'inbio'),
                    'title' => esc_html__('Header Layout 3 (It will be visible only during sticky.)', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/header/3.png',
                ),
                '4' => array(
                    'alt' => esc_html__('Header Layout 4', 'inbio'),
                    'title' => esc_html__('Header Layout 4', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/header/1.png',
                ),
            ),
            'default' => '1',
            'required' => array('rainbow_enable_header', 'equals', true),
        ),


        array(
            'id' => 'rainbow_enable_button',
            'type' => 'switch',
            'title' => esc_html__('Header button', 'inbio'),
            'subtitle' => esc_html__('Enable or disable header button.', 'inbio'),
            'default' => false,
            'required' => array('rainbow_enable_header', 'equals', true),
        ),


        array(
            'id' => 'button_txt',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'inbio'),
            'default' => esc_html__('Get A Quote', 'inbio'),
            'required' => array('rainbow_enable_button', 'equals', true),
        ),

        array(
            'id' => 'button_url',
            'type' => 'text',
            'title' => esc_html__('Button Url', 'inbio'),
            'default' => '#',
            'required' => array('rainbow_enable_button', 'equals', true),
        ),
        array(
            'id' => 'button_target',
            'type' => 'select',
            'title' => esc_html__('Button Target', 'inbio'),
            'required' => array('rainbow_enable_button', 'equals', true),
            'options' => array(
                '_blank' => esc_html__('Blank', 'inbio'),
                '_self' => esc_html__('Self', 'inbio'),
                '_parent' => esc_html__('Parent', 'inbio'),
                '_top' => esc_html__('Top', 'inbio'),
            ),
            'default' => '_blank',
        ),
        array(
            'id' => 'button_type',
            'type' => 'select',
            'title' => esc_html__('Button Type', 'inbio'),
            'required' => array('rainbow_enable_button', 'equals', true),
            'options' => array(
                'rn-btn' => esc_html__('Dark Shadow Button', 'inbio'),
                'rn-btn no-shadow btn-theme' => esc_html__('Primary Color Button', 'inbio'),

            ),
            'default' => 'rn-btn',
        ),

        array(
            'id' => 'rainbow_social_share_button',
            'type' => 'switch',
            'title' => esc_html__('Social Share Links', 'inbio'),
            'subtitle' => esc_html__('Enable or disable Social.', 'inbio'),
            'default' => false,
            'required' => array('rainbow_select_header_template', 'equals', '2'),
        ),

        array(
            'id' => 'rainbow_minicart_icon',
            'type' => 'switch',
            'title' => esc_html__('Cart Icon', 'inbio'),
            'on' => esc_html__('Enabled', 'inbio'),
            'off' => esc_html__('Disabled', 'inbio'),
            'default' => false,
        ),


    )
));


/**
 * Page Banner/Title section
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Pages Banner', 'inbio'),
    'id' => 'rainbow_page_banner_section',
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'id' => 'rainbow_page_banner_enable',
            'type' => 'button_set',
            'title' => esc_html__(' Title banner', 'inbio'),
            'subtitle' => esc_html__('Show or hide  the Title banner area', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'rainbow_page_breadcrumb_enable',
            'type' => 'button_set',
            'title' => esc_html__('Breadcrumb', 'inbio'),
            'subtitle' => esc_html__('Show or hide  the Breadcrumb area', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),

    )
));

/**
 * Projects Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Project', 'inbio'),
    'id' => 'rainbow_project',
    'icon' => 'el el-file-edit',
));

/**
 * Project Archive Options
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Archive/General', 'inbio'),
    'id' => 'rainbow_project_genaral',
    'icon' => 'el el-edit',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'rainbow_project_archive_banner_enable',
            'type' => 'button_set',
            'title' => esc_html__(' Title banner', 'inbio'),
            'subtitle' => esc_html__('Show or hide  the Title banner area', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        //        array(
        //            'id' => 'rainbow_project_archive_text',
        //            'type' => 'text',
        //            'title' => esc_html__('Default Title', 'inbio'),
        //            'subtitle' => esc_html__('Controls the Default title of the page which is displayed on the page title are on the blog page.', 'inbio'),
        //            'default' => esc_html__('Projects', 'inbio'),
        //            'required' => array('rainbow_project_archive_banner_enable', 'equals', 'yes'),
        //        ),
        array(
            'id' => 'rainbow_project_archive_breadcrumb_enable',
            'type' => 'button_set',
            'title' => esc_html__('Breadcrumb', 'inbio'),
            'subtitle' => esc_html__('Show or hide  the Breadcrumb area', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'rainbow_project_archive_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Select Project Archive Sidebar', 'inbio'),
            'subtitle' => esc_html__('Choose your favorite layout', 'inbio'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'inbio'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'inbio'),
                ),
                'no' => array(
                    'alt' => esc_html__('No Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'inbio'),
                ),
            ),
            'default' => 'right',
        ),


        array(
            'id' => 'rainbow_project_modal_popup_display',
            'type' => 'button_set',
            'title' => esc_html__('Popup Display', 'inbio'),
            'subtitle' => esc_html__('On or Off popup for archive page.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('On', 'inbio'),
                'no' => esc_html__('Off', 'inbio'),
            ),
            'default' => 'yes',
        ),

        array(
            'id'       => 'rainbow_project_archive_col_lg',
            'type'     => 'select',
            'title'    => esc_html__('Select Column for Desktops', 'inbio'),
            'subtitle' => esc_html__('Desktops: ≥ 1200px', 'inbio'),
            'options'  => array(
                '12' => esc_html__('1 Col', 'inbio'),
                '6' => esc_html__('2 Col', 'inbio'),
                '4' => esc_html__('3 Col', 'inbio'),
                '3' => esc_html__('4 Col', 'inbio'),
            ),
            'default'  => '6',
        ),
        array(
            'id'       => 'rainbow_project_archive_col_md',
            'type'     => 'select',
            'title'    => esc_html__('Select Column for Tabs', 'inbio'),
            'subtitle'    => esc_html__('Tabs: ≥ 992px', 'inbio'),
            'options'  => array(
                '12' => esc_html__('1 Col', 'inbio'),
                '6' => esc_html__('2 Col', 'inbio'),
                '4' => esc_html__('3 Col', 'inbio'),
                '3' => esc_html__('4 Col', 'inbio'),
            ),
            'default'  => '6',
        ),
        array(
            'id'       => 'rainbow_project_archive_col_sm',
            'type'     => 'select',
            'title'    => esc_html__('Select Column for Large Mobiles', 'inbio'),
            'subtitle'    => esc_html__('Large Mobiles: ≥ 576px', 'inbio'),
            'options'  => array(
                '12' => esc_html__('1 Col', 'inbio'),
                '6' => esc_html__('2 Col', 'inbio'),
                '4' => esc_html__('3 Col', 'inbio'),
                '3' => esc_html__('4 Col', 'inbio'),
            ),
            'default'  => '12',
        ),
        array(
            'id'       => 'rainbow_project_archive_col',
            'type'     => 'select',
            'title'    => esc_html__('Select Column for Small Mobiles', 'inbio'),
            'subtitle'    => esc_html__('Small Mobiles: < 576px', 'inbio'),
            'options'  => array(
                '12' => esc_html__('1 Col', 'inbio'),
                '6' => esc_html__('2 Col', 'inbio'),
                '4' => esc_html__('3 Col', 'inbio'),
                '3' => esc_html__('4 Col', 'inbio'),
            ),
            'default'  => '12',
        ),

        array(
            'id' => 'rainbow_project_image_size',
            'type' => 'select',
            'title' => esc_html__('Select Thumbnail Size', 'inbio'),
            'options' => rainbow_get_thumbnail_sizes(),
            'default' => 'rainbow-thumbnail-sm',
        ),

        array(
            'id' => 'rainbow_show_project_category',
            'type' => 'button_set',
            'title' => esc_html__('Category', 'inbio'),
            'subtitle' => esc_html__('Show or hide the category of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),

        array(
            'id' => 'rainbow_show_project_like',
            'type' => 'button_set',
            'title' => esc_html__('Like', 'inbio'),
            'subtitle' => esc_html__('Show or hide the project like options. This option is only works for archives pages. Note: If you want to off the options from homepage, please set the options from the elements options.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),

        array(
            'id'       => 'rainbow_project_reset_link_count',
            'type'     => 'select',
            'multi' => true,
            'title'    => esc_html__('Select Which Post Like reset count', 'inbio'),
            'subtitle'    => esc_html__('reset portfolio post count', 'inbio'),
            'options'  => rainbow_get_all_portfolio_post(),
            'default'  => '12',
        ),

        array(
            'id' => 'project_slug',
            'type' => 'text',
            'title' => esc_html__('Project Slug', 'inbio'),
            'subtitle' => esc_html__('Change the project url slug', 'inbio'),
            'description' => esc_html__('After saving your custom portfolio slug, flush the permalinks from "Wordpress Settings > Permalinks" for the changes to take effect.', 'inbio'),
            'default' => 'projects',
        ),

        array(
            'id' => 'projects_cat_slug',
            'type' => 'text',
            'title' => esc_html__('Projects Categories Slug', 'inbio'),
            'subtitle' => esc_html__('Change the projects Categories url slug', 'inbio'),
            'description' => esc_html__('After saving your custom portfolio slug, flush the permalinks from "Wordpress Settings > Permalinks" for the changes to take effect.', 'inbio'),
            'default' => 'projects-cat',
        ),
        array(
            'id' => 'projects_request_password_link',
            'type' => 'textarea',
            'title' => esc_html__('Request Password Text and Link', 'inbio'),
            'subtitle' => esc_html__('Request portfolio protected password Text', 'inbio'),
            'description' => esc_html__('If you use link you can  provide link "https://example.com" or if you use mail you can provide the mail here "mailto:example@gmail.com"', "inbio"),
            'default' => wp_kses_post('You want password? <a href="#" tabindex="0">Request Password</a>',"inbio"),
        ),

        array(
            'id' => 'projects_password_protected_info_text',
            'type' => 'text',
            'title' => esc_html__('Password Protected Info Text', 'inbio'),
            'default' => 'Click to View',
        ),

        array(
            'id' => 'projects_password_protected_title_text',
            'type' => 'text',
            'title' => esc_html__('From title text', 'inbio'),
            'default' => esc_html__('Please enter the password to <br> view the content.', 'inbio'),
        ),



    )
));


/**
 * Single Project
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'inbio'),
    'id' => 'rainbow_project_details_id',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'rainbow_single_project_breadcrumb_enable',
            'type' => 'button_set',
            'title' => esc_html__('Breadcrumb', 'inbio'),
            'subtitle' => esc_html__('Show or hide  the Breadcrumb area', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),

        array(
            'id' => 'rainbow_single_project_pos',
            'type' => 'image_select',
            'title' => esc_html__('Project Details Sidebar', 'inbio'),
            'subtitle' => esc_html__('Choose your favorite layout', 'inbio'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'inbio'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'inbio'),
                ),
                'full' => array(
                    'alt' => esc_html__('No Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'inbio'),
                ),
            ),
            'default' => 'full',
        ),

        array(
            'id' => 'rainbow_show_single_project_like',
            'type' => 'button_set',
            'title' => esc_html__('Like Button', 'inbio'),
            'subtitle' => esc_html__('Show or hide the project like options. This option is only works for single pages. Note: If you want to off the options from homepage, please set the options from the elements options.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),

        array(
            'id' => 'like_txt',
            'type' => 'text',
            'title' => esc_html__('Link this Text', 'inbio'),

            'default' => 'LIKE THIS',
        ),

        array(
            'id' => 'view_txt',
            'type' => 'text',
            'title' => esc_html__('View Project Text', 'inbio'),

            'default' => 'VIEW PROJECT',
        ),

    )
));

/**
 * Project Popup Options
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Popup', 'inbio'),
    'id' => 'rainbow_project_popup_genaral',
    'icon' => 'el el-zoom-in',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'rainbow_project_popup_layout',
            'type' => 'image_select',
            'title' => esc_html__('Popup Layout', 'inbio'),
            'subtitle' => esc_html__('Choose your favorite layout for projects modal.', 'inbio'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Media', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/popup/left-media.jpg',
                    'title' => esc_html__('Left Media', 'inbio'),
                ),
                'center' => array(
                    'alt' => esc_html__('Center Media (Full Width)', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/popup/center-media.jpg',
                    'title' => esc_html__('Center Media', 'inbio'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Media', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/popup/right-media.jpg',
                    'title' => esc_html__('Right Media', 'inbio'),
                ),
            ),
            'default' => 'left',
        ),

        array(
            'id' => 'rainbow_project_popup_image_size',
            'type' => 'select',
            'title' => esc_html__('Popup Image Size', 'inbio'),
            'options' => rainbow_get_thumbnail_sizes(),
            'default' => '',
        ),

        array(
            'id' => 'modal_like_txt',
            'type' => 'text',
            'title' => esc_html__('Popup like Button Text', 'inbio'),

            'default' => 'LIKE THIS',
        ),

        array(
            'id' => 'modal_view_txt',
            'type' => 'text',
            'title' => esc_html__('Popup View Project Text', 'inbio'),

            'default' => 'VIEW PROJECT',
        ),

    )
));

/**
 * Blog Panel
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'inbio'),
    'id' => 'rainbow_blog',
    'icon' => 'el el-file-edit',
));

/**
 * Blog Options
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Archive', 'inbio'),
    'id' => 'rainbow_blog_genaral',
    'icon' => 'el el-edit',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'rainbow_blog_banner_enable',
            'type' => 'button_set',
            'title' => esc_html__(' Title banner', 'inbio'),
            'subtitle' => esc_html__('Show or hide  the Title banner area', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'rainbow_blog_breadcrumb_enable',
            'type' => 'button_set',
            'title' => esc_html__('Breadcrumb', 'inbio'),
            'subtitle' => esc_html__('Show or hide  the Breadcrumb area', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),

        // array(
        //     'id' => 'rainbow_blog_text',
        //     'type' => 'text',
        //     'title' => esc_html__('Default Title', 'inbio'),
        //     'subtitle' => esc_html__('Controls the Default title of the page which is displayed on the page title are on the blog page.', 'inbio'),
        //     'default' => esc_html__('Blog', 'inbio'),
        //     'required' => array('rainbow_blog_banner_enable', 'equals', 'yes'),
        // ),


        array(
            'id' => 'rainbow_blog_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Select Blog Sidebar', 'inbio'),
            'subtitle' => esc_html__('Choose your favorite blog layout', 'inbio'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'inbio'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'inbio'),
                ),
                'no' => array(
                    'alt' => esc_html__('No Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'inbio'),
                ),
            ),
            'default' => 'right',
        ),


        array(
            'id' => 'rainbow_show_post_author_meta',
            'type' => 'button_set',
            'title' => esc_html__('Author', 'inbio'),
            'subtitle' => esc_html__('Show or hide the author of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'rainbow_show_post_publish_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Publish Date', 'inbio'),
            'subtitle' => esc_html__('Show or hide the publish date of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'rainbow_show_post_updated_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Updated Date', 'inbio'),
            'subtitle' => esc_html__('Show or hide the updated date of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'rainbow_show_post_reading_time_meta',
            'type' => 'button_set',
            'title' => esc_html__('Reading Time', 'inbio'),
            'subtitle' => esc_html__('Show or hide the publish content reading time.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'rainbow_show_post_view',
            'type' => 'button_set',
            'title' => esc_html__('Post View', 'inbio'),
            'subtitle' => esc_html__('Show or hide the post view of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'rainbow_show_post_comments_meta',
            'type' => 'button_set',
            'title' => esc_html__('Comments', 'inbio'),
            'subtitle' => esc_html__('Show or hide the comments of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'rainbow_show_post_categories_meta',
            'type' => 'button_set',
            'title' => esc_html__('Categories', 'inbio'),
            'subtitle' => esc_html__('Show or hide the categories of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'rainbow_show_post_tags_meta',
            'type' => 'button_set',
            'title' => esc_html__('Tags', 'inbio'),
            'subtitle' => esc_html__('Show or hide the tags of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'no',
        ),

        array(
            'id' => 'rainbow_enable_readmore_btn',
            'type' => 'button_set',
            'title' => esc_html__('Read More Button', 'inbio'),
            'subtitle' => esc_html__('Show or hide the read more button of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'rainbow_readmore_text',
            'type' => 'text',
            'title' => esc_html__('Read More Text', 'inbio'),
            'subtitle' => esc_html__('Set the Default title of read more button.', 'inbio'),
            'default' => esc_html__('Read More', 'inbio'),
            'required' => array('rainbow_enable_readmore_btn', 'equals', 'yes'),
        ),


    )
));

/**
 * Single Post
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'inbio'),
    'id' => 'rainbow_blog_details_id',
    'icon' => 'el el-website',
    'subsection' => true,
    'fields' => array(

        // array(
        //     'id' => 'rainbow_single_post_banner_enable',
        //     'type' => 'button_set',
        //     'title' => esc_html__(' Title banner', 'inbio'),
        //     'subtitle' => esc_html__('Show or hide  the Title banner area', 'inbio'),
        //     'options' => array(
        //         'yes' => esc_html__('Show', 'inbio'),
        //         'no' => esc_html__('Hide', 'inbio'),
        //     ),
        //     'default' => 'yes',
        // ),
        // array(
        //     'id' => 'rainbow_blog_details_text',
        //     'type' => 'text',
        //     'title' => esc_html__('Default Title', 'inbio'),
        //     'subtitle' => esc_html__('Controls the Default title of the page which is displayed on the page title are on the blog details page.', 'inbio'),
        //     'default' => esc_html__('Blog Details', 'inbio'),
        //     'required' => array('rainbow_single_post_banner_enable', 'equals', 'yes'),
        // ),
        array(
            'id' => 'rainbow_single_post_breadcrumb_enable',
            'type' => 'button_set',
            'title' => esc_html__('Breadcrumb', 'inbio'),
            'subtitle' => esc_html__('Show or hide  the Breadcrumb area', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),


        array(
            'id' => 'rainbow_single_pos',
            'type' => 'image_select',
            'title' => esc_html__('Blog Details Sidebar', 'inbio'),
            'subtitle' => esc_html__('Choose your favorite layout', 'inbio'),
            'options' => array(
                'left' => array(
                    'alt' => esc_html__('Left Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                    'title' => esc_html__('Left Sidebar', 'inbio'),
                ),
                'right' => array(
                    'alt' => esc_html__('Right Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                    'title' => esc_html__('Right Sidebar', 'inbio'),
                ),
                'full' => array(
                    'alt' => esc_html__('No Sidebar', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                    'title' => esc_html__('No Sidebar', 'inbio'),
                ),
            ),
            'default' => 'full',
        ),


        array(
            'id' => 'rainbow_show_blog_details_author_meta',
            'type' => 'button_set',
            'title' => esc_html__('Author', 'inbio'),
            'subtitle' => esc_html__('Show or hide the author of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'rainbow_show_blog_details_publish_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Publish Date', 'inbio'),
            'subtitle' => esc_html__('Show or hide the publish date of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'rainbow_show_blog_details_updated_date_meta',
            'type' => 'button_set',
            'title' => esc_html__('Updated Date', 'inbio'),
            'subtitle' => esc_html__('Show or hide the updated date of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'rainbow_show_blog_details_reading_time_meta',
            'type' => 'button_set',
            'title' => esc_html__('Reading Time', 'inbio'),
            'subtitle' => esc_html__('Show or hide the publish content reading time.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'yes',
        ),
        array(
            'id' => 'rainbow_show_blog_details_comments_meta',
            'type' => 'button_set',
            'title' => esc_html__('Comments', 'inbio'),
            'subtitle' => esc_html__('Show or hide the comments of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'rainbow_show_blog_details_categories_meta',
            'type' => 'button_set',
            'title' => esc_html__('Categories', 'inbio'),
            'subtitle' => esc_html__('Show or hide the categories of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'rainbow_show_blog_details_tags_meta',
            'type' => 'button_set',
            'title' => esc_html__('Tags', 'inbio'),
            'subtitle' => esc_html__('Show or hide the tags of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'no',
        ),
        array(
            'id' => 'rainbow_show_blog_details_post_view',
            'type' => 'button_set',
            'title' => esc_html__('View Post', 'inbio'),
            'subtitle' => esc_html__('Show or hide the View Post of blog post.', 'inbio'),
            'options' => array(
                'yes' => esc_html__('Show', 'inbio'),
                'no' => esc_html__('Hide', 'inbio'),
            ),
            'default' => 'no',
        ),

        array(
            'id' => 'rainbow_blog_details_social_share',
            'type' => 'switch',
            'title' => esc_html__('Social Link', 'inbio'),
            'subtitle' => esc_html__('Show or hide the social share of single post.', 'inbio'),
            'default' => false,
        ),

    )
));


/**
 * Footer section
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'inbio'),
    'id' => 'rainbow_footer_section',
    'icon' => 'el el-photo',
    'fields' => array(
        array(
            'id' => 'rainbow_footer_enable',
            'type' => 'switch',
            'title' => esc_html__('Footer', 'inbio'),
            'subtitle' => esc_html__('Enable or disable the footer area.', 'inbio'),
            'default' => true,
        ),

        // Header Custom Style
        array(
            'id' => 'rainbow_select_footer_template',
            'type' => 'image_select',
            'title' => esc_html__('Select Footer Layout', 'inbio'),
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Footer Layout 1', 'inbio'),
                    'title' => esc_html__('Footer Layout 1', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/1.png',
                ),
                '2' => array(
                    'alt' => esc_html__('Footer Layout 2', 'inbio'),
                    'title' => esc_html__('Footer Layout 2', 'inbio'),
                    'img' => get_template_directory_uri() . '/assets/images/optionframework/footer/2.png',
                ),
            ),
            'default' => '1',
            'required' => array('rainbow_footer_enable', 'equals', true),
        ),

        array(
            'id' => 'rainbow_copyright_contact',
            'type' => 'editor',
            'title' => esc_html__('Copyright Content', 'inbio'),
            'args' => array(
                'teeny' => true,
                'textarea_rows' => 5,
            ),
            'default' => '©2022. All rights reserved by <a href="#" target="_blank" rel="noopener">Your Company.</a>',
            'required' => array('rainbow_footer_enable', 'equals', true),
        ),

        array(
            'id' => 'footer_logo_display',
            'type' => 'switch',
            'title' => esc_html__('Display Footer Logo', 'inbio'),
            'on' => esc_html__('Enabled', 'inbio'),
            'off' => esc_html__('Disabled', 'inbio'),
            'default' => false,
            'required' => array('rainbow_footer_enable', 'equals', true),
        ),


    )
));


/**
 * 404 error page
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('404 Page', 'inbio'),
    'id' => 'rainbow_error_page',
    'icon' => 'el el-eye-close',
    'fields' => array(
        array(
            'id' => 'rainbow_404_title',
            'type' => 'text',
            'title' => esc_html__('Title', 'inbio'),
            'subtitle' => esc_html__('Add your Default title.', 'inbio'),
            'value' => '404!',
            'default' => esc_html__('404!', 'inbio'),
        ),

        array(
            'id' => 'rainbow_404_subtitle',
            'type' => 'text',
            'title' => esc_html__('Sub Title', 'inbio'),
            'subtitle' => esc_html__('Add your custom subtitle.', 'inbio'),
            'default' => esc_html__('Page not found', 'inbio'),
        ),
        array(
            'id' => 'rainbow_404_content',
            'type' => 'textarea',
            'rows' => 2,
            'title' => esc_html__('Content', 'inbio'),
            'subtitle' => esc_html__('Add your custom Content.', 'inbio'),
            'default' => esc_html__('The page you were looking for could not be found.', 'inbio'),
        ),

        array(
            'id' => 'rainbow_enable_go_back_btn',
            'type' => 'button_set',
            'title' => esc_html__('Button', 'inbio'),
            'subtitle' => esc_html__('Enable or disable the go to home page button.', 'inbio'),
            'options' => array(
                'yes' => 'Enable',
                'no' => 'Disable'
            ),
            'default' => 'yes'
        ),
        array(
            'id' => 'rainbow_button_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'inbio'),
            'subtitle' => esc_html__('Set the custom text of go to home page button.', 'inbio'),
            'default' => esc_html__('Back to Homepage', 'inbio'),
            'required' => array('rainbow_enable_go_back_btn', 'equals', 'yes'),
        )
    )
));


/**
 * WooCommerce
 */
if (class_exists('WooCommerce')) {

    Redux::setSection($opt_name, array(
        'title' => esc_html__('WooCommerce', 'inbio'),
        'id' => 'woo_Settings_section',
        'icon' => 'el el-shopping-cart',
    ));
    /**
     * WooCommerce Archive
     */
    Redux::setSection($opt_name, array(
        'title' => esc_html__('General', 'inbio'),
        'id' => 'wc_sec_general',
        'icon' => 'el el-folder-open',
        'subsection' => true,


        'fields' => array(

            array(
                'id' => 'rainbow_shop_banner_enable',
                'type' => 'button_set',
                'title' => esc_html__(' Title banner', 'inbio'),
                'subtitle' => esc_html__('Show or hide  the Title banner area', 'inbio'),
                'options' => array(
                    'yes' => esc_html__('Show', 'inbio'),
                    'no' => esc_html__('Hide', 'inbio'),
                ),
                'default' => 'yes',
            ),
            array(
                'id' => 'rainbow_shop_breadcrumb_enable',
                'type' => 'button_set',
                'title' => esc_html__('Breadcrumb', 'inbio'),

                'subtitle' => esc_html__('Show or hide  the Breadcrumb area', 'inbio'),
                'options' => array(
                    'yes' => esc_html__('Show', 'inbio'),
                    'no' => esc_html__('Hide', 'inbio'),
                ),
                'default' => 'yes',
            ),


            array(
                'id' => 'wc_general_sidebar',
                'type' => 'image_select',
                'title' => esc_html__('Select Shop Sidebar', 'inbio'),
                'subtitle' => esc_html__('Choose your favorite shop layout', 'inbio'),
                'options' => array(
                    'left' => array(
                        'alt' => esc_html__('Left Sidebar', 'inbio'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/left-sidebar.png',
                        'title' => esc_html__('Left Sidebar', 'inbio'),
                    ),
                    'right' => array(
                        'alt' => esc_html__('Right Sidebar', 'inbio'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/right-sidebar.png',
                        'title' => esc_html__('Right Sidebar', 'inbio'),
                    ),
                    'no' => array(
                        'alt' => esc_html__('No Sidebar', 'inbio'),
                        'img' => get_template_directory_uri() . '/assets/images/optionframework/layout/no-sidebar.png',
                        'title' => esc_html__('No Sidebar', 'inbio'),
                    ),
                ),
                'default' => 'no',
            ),
            array(
                'id'       => 'wc_num_product_per_row',
                'type'     => 'text',
                'title'    => esc_html__('Number of Products Per Row', 'inbio'),
                'default'  => '3',
            ),
            array(
                'id'       => 'wc_num_product',
                'type'     => 'text',
                'title'    => esc_html__('Number of Products Per Page', 'inbio'),
                'default'  => '12',
            ),
        )
    ));
    /**
     * WooCommerce Single Page
     */
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Product Single Page', 'inbio'),
        'id' => 'wc_sec_product',
        'icon' => 'el el-folder-open',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'rainbow_products_breadcrumb_enable',
                'type' => 'button_set',
                'title' => esc_html__('Breadcrumb', 'inbio'),
                'subtitle' => esc_html__('Show or hide  the Breadcrumb area', 'inbio'),
                'options' => array(
                    'yes' => esc_html__('Show', 'inbio'),
                    'no' => esc_html__('Hide', 'inbio'),
                ),
                'default' => 'yes',
            ),
            array(
                'id'       => 'wc_cats',
                'type'     => 'switch',
                'title'    => esc_html__('Categories', 'inbio'),
                'on'       => esc_html__('Show', 'inbio'),
                'off'      => esc_html__('Hide', 'inbio'),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_tags',
                'type'     => 'switch',
                'title'    => esc_html__('Tags', 'inbio'),
                'on'       => esc_html__('Show', 'inbio'),
                'off'      => esc_html__('Hide', 'inbio'),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_related',
                'type'     => 'switch',
                'title'    => esc_html__('Related Products', 'inbio'),
                'on'       => esc_html__('Show', 'inbio'),
                'off'      => esc_html__('Hide', 'inbio'),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_description',
                'type'     => 'switch',
                'title'    => esc_html__('Description Tab', 'inbio'),
                'on'       => esc_html__('Show', 'inbio'),
                'off'      => esc_html__('Hide', 'inbio'),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_reviews',
                'type'     => 'switch',
                'title'    => esc_html__('Reviews Tab', 'inbio'),
                'on'       => esc_html__('Show', 'inbio'),
                'off'      => esc_html__('Hide', 'inbio'),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_additional_info',
                'type'     => 'switch',
                'title'    => esc_html__('Additional Information Tab', 'inbio'),
                'on'       => esc_html__('Show', 'inbio'),
                'off'      => esc_html__('Hide', 'inbio'),
                'default'  => true,
            ),
        )
    ));
    /**
     * WooCommerce Cart Page
     */
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Cart page', 'inbio'),
        'id' => 'wc_sec_cart',
        'icon' => 'el el-folder-open',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'wc_cross_sell',
                'type'     => 'switch',
                'title'    => esc_html__('Cross Sell Products', 'inbio'),
                'on'       => esc_html__('Show', 'inbio'),
                'off'      => esc_html__('Hide', 'inbio'),
                'default'  => true,
            ),
        )
    ));
} // End WooCommerce



/**
 * Intro Video
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Intro Video', 'inbio'),
    'id' => 'rainbow_intro_video',
    'icon' => 'el el-video',
    'fields' => array(
        array(
            'id' => 'rainbow_enable_intro_video',
            'type' => 'button_set',
            'title' => esc_html__('Enable Intro Video', 'inbio'),
            'subtitle' => esc_html__('Enable or disable the intro video from your whole website.', 'inbio'),
            'options' => array(
                'yes' => 'Enable',
                'no' => 'Disable'
            ),
            'default' => 'no'
        ),
        array(
            'id' => 'rainbow_intro_greeting_message',
            'type' => 'text',
            'title' => esc_html__('Greeting Message', 'inbio'),
            'default' => esc_html__('Hello', 'inbio'),
            'required' => array('rainbow_enable_intro_video', 'equals', 'yes'),
        ),
        array(
            'id' => 'rainbow_intro_video_url',
            'type'           => 'media',
            'library_filter' => array('mp4'),
            'mode' => false,
            'preview' => false,
            'url' => true,
            'readonly' => false,
            'title' => esc_html__('Upload your video', 'inbio'),
            'subtitle' => esc_html__('The recommended video ratio is 9:16', 'inbio'),
            'placeholder' => esc_html__('Upload a .mp4 video format.', 'inbio'),
            'required' => array('rainbow_enable_intro_video', 'equals', 'yes'),
        ),
        array(
            'id' => 'rainbow_intro_video_poster',
            'type'  => 'media',
            'preview' => true,
            'url' => true,
            'readonly' => false,
            'title' => esc_html__('Add a poster', 'inbio'),
            'subtitle' => esc_html__('Upload a poster for the intro video, You can use any type of image with a gif', 'inbio'),
            'placeholder' => esc_html__('Upload a image', 'inbio'),
            'required' => array('rainbow_enable_intro_video', 'equals', 'yes'),
        ),
        array(
            'id'       => 'rainbow_intro_video_position',
            'type'     => 'select',
            'title'    => esc_html__('Select Position', 'inbio'),
            'subtitle'    => esc_html__('You can set your intro video position left or right.', 'inbio'),
            'options'  => array(
                'left' => esc_html__('Left', 'inbio'),
                'right' => esc_html__('Right', 'inbio'),
            ),
            'default'  => 'right',
            'required' => array('rainbow_enable_intro_video', 'equals', 'yes'),
        ),
    )
));

/**
 * Notice bar
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Hire Us', 'inbio'),
    'id' => 'rainbow_chat_available',
    'icon' => 'el el-video',
    'fields' => array(
        array(
            'id' => 'rainbow_enable_chat_availability',
            'type' => 'button_set',
            'title' => esc_html__('Enable Hire Me', 'inbio'),
            'subtitle' => esc_html__('Enable or disable the Hire us options from your whole website.', 'inbio'),
            'options' => array(
                'yes' => 'Enable',
                'no' => 'Disable'
            ),
            'default' => 'no'
        ),
        array(
            'id' => 'rainbow_notice_bar_heading_title',
            'type' => 'text',
            'title' => esc_html__('Top Heading Title', 'inbio'),
            'default' => esc_html__('Clara Briones Vedia is available for hire', 'inbio'),
            'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
        ),
        array(
            'id' => 'rainbow_notice_bar_avilability_title',
            'type' => 'editor',
            'title' => esc_html__('Availability Text', 'inbio'),
            'default' => esc_html__('Availability: Maximum: 2 Hours', 'inbio'),
            'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
        ),



        array(
            'id' => 'rainbow_notice_bar_author_img',
            'type'  => 'media',
            'preview' => true,
            'url' => true,
            'readonly' => false,
            'title' => esc_html__('Add a Author Image', 'inbio'),
            'subtitle' => esc_html__('Upload a Author Image, You can use any type of image with a gif', 'inbio'),
            'placeholder' => esc_html__('Upload a image', 'inbio'),
            'default' => array(
                'url' => RAINBOW_IMG_URL . 'avater.png'
            ),
            'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
        ),
        array(
            'id' => 'rainbow_notice_bar_img_height',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Notice Bar Image Height', 'inbio'),
            'subtitle' => esc_html__('Set custom Image height. Default value: 70px', 'inbio'),
            'width' => false,
            'output' => array(
                'max-height' => '.inbio-notification-bar .profile-pic'
            ),
           'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
        ),
        array(
            'id' => 'rainbow_notice_bar_img_width',
            'type' => 'dimensions',
            'units_extended' => true,
            'units' => array('rem', 'px', '%'),
            'title' => esc_html__('Notice Bar Image Width', 'inbio'),
            'subtitle' => esc_html__('Set custom Image Width. Default value: 70px', 'inbio'),
            'height' => false,
            'output' => array(
                'max-width' => '.inbio-notification-bar .profile-pic'
            ),
           'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
        ),
        array(
            'id'       => 'rainbow_notice_bar_position',
            'type'     => 'select',
            'title'    => esc_html__('Select X Position', 'inbio'),
            'subtitle'    => esc_html__('You can availability bar position left or right.', 'inbio'),
            'options'  => array(
                'left' => esc_html__('Left', 'inbio'),
                'right' => esc_html__('Right', 'inbio'),
                'center' => esc_html__('Center', 'inbio'),
            ),
            'default'  => 'center',
            'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
        ),

        array(
            'id'       => 'rainbow_notice_bar_top_bottom_position',
            'type'     => 'select',
            'title'    => esc_html__('Select Y Position', 'inbio'),
            'subtitle'    => esc_html__('You can availability bar position top or bottom.', 'inbio'),
            'options'  => array(
                'top' => esc_html__('Top', 'inbio'),
                'bottom' => esc_html__('Bottom', 'inbio'),
                'vertical-center' => esc_html__('center', 'inbio'),
            ),
            'default'  => 'bottom',
            'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
        ),

        array(
            'id' => 'rainbow_notice_bar_button_title',
            'type' => 'text',
            'title' => esc_html__('Button Title', 'inbio'),
            'default' => esc_html__('Hire me', 'inbio'),
            'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
        ),

        array(
            'id' => 'rainbow_notice_bar_button_link',
            'type' => 'text',
            'title' => esc_html__('Button Link', 'inbio'),
            'default' => esc_html__('#', 'inbio'),
            'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
        ),
        array(
            'id' => 'rainbow_notice_bar_padding',
            'type' => 'spacing',
            'title' => esc_html__('Notice Bar Padding', 'inbio'),
            'subtitle' => esc_html__('Controls the top, right, bottom and left padding of the Notice Bar', 'inbio'),
            'mode' => 'padding',
            'units' => array('em', 'px'),
            'default' => array(
                'padding-top' => '30px',
                'padding-right' => '30px',
                'padding-bottom' => '30px',
                'padding-left' => '30px',
                'units' => 'px',
            ),
            'output' => array('.inbio-notification-bar'),
            'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
        ),
    )
));

Redux::set_field( $opt_name, 'rainbow_chat_available', array(
    'id' => 'notice_bar_show_display_time',
    'title' => esc_html__('Notice Bar Display Time', 'inbio'),
    'subtitle' => esc_html__('Set notice bar display time', 'inbio'),
    'type' => 'text',
    'default'  => '5000',
   'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_chat_available', array(
    'id' => 'notice_bar_theme_color',
    'type'     => 'select',
    'title'    => esc_html__('Select Theme Color', 'inbio'),
    'subtitle'    => esc_html__('You can set your theme color', 'inbio'),
    'options'  => array(
        'neumorphism' => esc_html__('Neumorphism', 'inbio'),
        'gradient' => esc_html__('Gradient', 'inbio'),
    ),
    'default'  => 'gradient',
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
) );


Redux::setSection($opt_name, array(
    'title' => esc_html__('Hire Us Color', 'inbio'),
    'id' => 'rainbow_chat_available_color',
    'icon' => 'el el-video',
    'subsection' => true,
));

Redux::set_field( 
    $opt_name, 
    'rainbow_chat_available_color', 
    array(
        'id'       => 'notice_bar_dark_gradient_color',
        'type'     => 'color_gradient',
        'title'    => esc_html__('Notice Bar Dark Gradient BGColor', 'inbio'),
        'subtitle' => esc_html__('Only color validation can be done on this field type', 'inbio'),
        'desc'     => esc_html__('This is the description field, again good for additional info.', 'inbio'),
        'validate' => 'color',
        'output'         => '.inbio-notification-bar',
        'gradient-type'  => true,
        'gradient-reach' => true,
        'gradient-angle' => true,
        'default'        => array(
            'from'           => '#1e2024',
            'to'             => '#23272b',
           
        ),
        'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
    ) 
);

Redux::set_field( 
    $opt_name, 
    'rainbow_chat_available_color', 
    array(
        'id'       => 'notice_bar_white__gradient_color',
        'type'     => 'color_gradient',
        'title'    => esc_html__('Notice Bar White Gradient BGColor', 'inbio'),
        'subtitle' => esc_html__('Only color validation can be done on this field type', 'inbio'),
        'desc'     => esc_html__('This is the description field, again good for additional info.', 'inbio'),
        'validate' => 'color',
        'output'         => 'body.white-version .inbio-notification-bar',
        'gradient-type'  => true,
        'gradient-reach' => true,
        'gradient-angle' => true,
        'default'        => array(
            'from'           => '#e2e8ec',
            'to'             => '#ffffff',
           
        ),
        'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
    ) 
);


Redux::set_field( $opt_name, 'rainbow_chat_available_color', array(
    'id'       => 'notice_bar_heading_color',
    'type'     => 'color',
    'title'    => esc_html__('Dark heading color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #c4cfde).', 'inbio'),
    'default'  => '#c4cfde',
    'validate' => 'color',
    'output' => array(
        'color' => '.inbio-notification-bar .name'
    ),
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_chat_available_color', array(
    'id'       => 'notice_bar_chat_color',
    'type'     => 'color',
    'title'    => esc_html__('Dark Availability Text color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #c4cfde).', 'inbio'),
    'default'  => '#c4cfde',
    'validate' => 'color',
    'output' => array(
        'color' => '.inbio-notification-bar .inbio-availability'
    ),
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
   
) );

Redux::set_field( $opt_name, 'rainbow_chat_available_color', array(
    'id'       => 'notice_bar_white_heading_color',
    'type'     => 'color',
    'title'    => esc_html__('Heading white version color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #fff).', 'inbio'),
    'default'  => '#1e2125',
    'validate' => 'color',
    'output' => array(
        'color' => 'body.white-version .inbio-notification-bar .name'
    ),
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_chat_available_color', array(
    'id'       => 'notice_bar_white__chat_color',
    'type'     => 'color',
    'title'    => esc_html__('Availability White Version text color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #3c3e41).', 'inbio'),
    'default'  => '#3c3e41',
    'validate' => 'color',
    'output' => array(
        'color' => 'body.white-version .inbio-notification-bar .inbio-availability'
    ),
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
   
) );

Redux::set_field( 
    $opt_name, 
    'rainbow_chat_available_color', 
    array(
        'id'       => 'notice_bar_dark_btn_gradient_color',
        'type'     => 'color_gradient',
        'title'    => esc_html__('Dark Button Gradient BG Color', 'inbio'),
        'subtitle' => esc_html__('Only color validation can be done on this field type', 'inbio'),
        'desc'     => esc_html__('This is the description field, again good for additional info.', 'inbio'),
        'validate' => 'color',
        'output'         => '.inbio-notification-bar .rn-btn',
        'gradient-type'  => true,
        'gradient-reach' => true,
        'gradient-angle' => true,
        'default'        => array(
            'from'           => '#1e2024',
            'to'             => '#23272b',
           
        ),
        'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
    ) 
);

Redux::set_field( 
    $opt_name, 
    'rainbow_chat_available_color', 
    array(
        'id'       => 'notice_bar_dark_btn_gradient_hoverbgcolor',
        'type'     => 'color_gradient',
        'title'    => esc_html__(' Dark Button Gradient Bg Hover Color', 'inbio'),
        'subtitle' => esc_html__('Only color validation can be done on this field type', 'inbio'),
        'desc'     => esc_html__('This is the description field, again good for additional info.', 'inbio'),
        'validate' => 'color',
        'output'         => '.inbio-notification-bar .rn-btn::before',
        'gradient-type'  => true,
        'gradient-reach' => true,
        'gradient-angle' => true,
        'default'        => array(
            'from'           => '#212428',
            'to'             => '#16181c',
           
        ),
        'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
    ) 
);

Redux::set_field( 
    $opt_name, 
    'rainbow_chat_available_color', 
    array(
        'id'       => 'notice_bar_white__button_gradient_color',
        'type'     => 'color_gradient',
        'title'    => esc_html__('White Button Gradient Color', 'inbio'),
        'subtitle' => esc_html__('Only color validation can be done on this field type', 'inbio'),
        'desc'     => esc_html__('This is the description field, again good for additional info.', 'inbio'),
        'validate' => 'color',
        'output'         => 'body.white-version .inbio-notification-bar .rn-btn',
        'gradient-type'  => true,
        'gradient-reach' => true,
        'gradient-angle' => true,
        'default'        => array(
            'from'           => '#e2e8ec',
            'to'             => '#ffffff',
           
        ),
        'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
    ) 
);



Redux::set_field( 
    $opt_name, 
    'rainbow_chat_available_color', 
    array(
        'id'       => 'notice_bar_white__button_gradient_hover_color',
        'type'     => 'color_gradient',
        'title'    => esc_html__('White Button Gradient Hover BG Color', 'inbio'),
        'subtitle' => esc_html__('Only color validation can be done on this field type', 'inbio'),
        'desc'     => esc_html__('This is the description field, again good for additional info.', 'inbio'),
        'validate' => 'color',
        'output'         => 'body.white-version .rn-btn::before',
        'gradient-type'  => true,
        'gradient-reach' => true,
        'gradient-angle' => true,
        'default'        => array(
            'from'           => '#6a67ce',
            'to'             => '#fc636b',
           
        ),
        'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
    ) 
);

Redux::set_field( $opt_name, 'rainbow_chat_available_color', array(
    'id'       => 'notice_bar_white_btn_text_color',
    'type'     => 'color',
    'title'    => esc_html__('Button text color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #ff014f).', 'inbio'),
    'default'  => '#ff014f',
    'validate' => 'color',
    'output' => array(
        'color' => '.inbio-notification-bar .rn-btn'
    ),
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_chat_available_color', array(
    'id'       => 'notice_bar_white_btn_text_hover+_color',
    'type'     => 'color',
    'title'    => esc_html__('Button text Hover color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #ff014f).', 'inbio'),
    'default'  => '#ff014f',
    'validate' => 'color',
    'output' => array(
        'color' => '.inbio-notification-bar .rn-btn:hover'
    ),
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_chat_available_color', array(
    'id'       => 'notice_bar_white__btn_textchat_color',
    'type'     => 'color',
    'title'    => esc_html__('Button text white version color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #ff014f).', 'inbio'),
    'default'  => '#ff014f',
    'validate' => 'color',
    'output' => array(
        'color' => 'body.white-version .inbio-notification-bar .rn-btn'
    ),
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
   
) );

Redux::set_field( $opt_name, 'rainbow_chat_available_color', array(
    'id'       => 'notice_bar_white__btn_textchat_hover_color',
    'type'     => 'color',
    'title'    => esc_html__('Button text white version Hover color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #fff).', 'inbio'),
    'default'  => '#fff',
    'validate' => 'color',
    'output' => array(
        'color' => 'body.white-version .inbio-notification-bar .rn-btn:hover'
    ),
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
   
) );

Redux::set_field( 
    $opt_name, 
    'rainbow_chat_available_color', 
    array(
        'id'       => 'notice_bar_dark_close_icon_gradient_color',
        'type'     => 'color_gradient',
        'title'    => esc_html__('Close Icon Dark Gradient BGColor', 'inbio'),
        'subtitle' => esc_html__('Only color validation can be done on this field type', 'inbio'),
        'desc'     => esc_html__('This is the description field, again good for additional info.', 'inbio'),
        'validate' => 'color',
        'output'         => '.inbio-notification-bar .inbio-close-button',
        'gradient-type'  => true,
        'gradient-reach' => true,
        'gradient-angle' => true,
        'default'        => array(
            'from'           => '#1e2024',
            'to'             => '#23272b',
           
        ),
        'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
    ) 
);

Redux::set_field( 
    $opt_name, 
    'rainbow_chat_available_color', 
    array(
        'id'       => 'notice_bar_dark_close_icon_whitegradient_color',
        'type'     => 'color_gradient',
        'title'    => esc_html__('Close Icon Gradient White BGColor', 'inbio'),
        'subtitle' => esc_html__('Only color validation can be done on this field type', 'inbio'),
        'desc'     => esc_html__('This is the description field, again good for additional info.', 'inbio'),
        'validate' => 'color',
        'output'         => 'body.white-version .inbio-notification-bar .inbio-close-button',
        'gradient-type'  => true,
        'gradient-reach' => true,
        'gradient-angle' => true,
        'default'        => array(
            'from'           => '#e2e8ec',
            'to'             => '#ffffff',
           
        ),
        'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
    ) 
);

Redux::set_field( $opt_name, 'rainbow_chat_available_color', array(
    'id'       => 'notice_bar_white_btn_textIcon_color',
    'type'     => 'color',
    'title'    => esc_html__('Close icon color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #ff014f).', 'inbio'),
    'default'  => '#ff014f',
    'validate' => 'color',
    'output' => array(
        'color' => '.inbio-notification-bar .inbio-close-button'
    ),
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_chat_available_color', array(
    'id'       => 'notice_bar_white__btn_iconskjtextchat_color',
    'type'     => 'color',
    'title'    => esc_html__('Close icon White Version color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #ff014f).', 'inbio'),
    'default'  => '#ff014f',
    'validate' => 'color',
    'output' => array(
        'color' => 'body.white-version .inbio-notification-bar .inbio-close-button'
    ),
    'required' => array('rainbow_enable_chat_availability', 'equals', 'yes'),
) );

/* audio sound effect*/
Redux::setSection($opt_name, array(
    'title' => esc_html__('Audio Sound Effect', 'inbio'),
    'id' => 'rainbow_audio_sound_effect',
    'icon' => 'el el-video',
));

Redux::set_field( $opt_name, 'rainbow_audio_sound_effect', array(
    'id' => 'rainbow_enable_audio_sound',
    'type' => 'button_set',
    'title' => esc_html__('Enable audio sound', 'inbio'),
    'subtitle' => esc_html__('Enable or disable the audio sound from your whole website.', 'inbio'),
    'options' => array(
        'yes' => 'Enable',
        'no' => 'Disable'
    ),
    'default' => 'no'
) );

Redux::set_field( $opt_name, 'rainbow_audio_sound_effect', array(
    'id'       => 'intro_video_close_sound',
    'type'           => 'media',
    'library_filter' => array('mp4','wav'),
    'mode' => false,
    'preview' => false,
    'url' => true,
    'readonly' => false,
    'title' => esc_html__('Intro video close Sound', 'inbio'),
    'subtitle' => esc_html__('The recommended audio', 'inbio'),
    'placeholder' => esc_html__('Upload a .mp4 audio format.', 'inbio'),
    'default' => array(
        'url' => RAINBOW_AUDIO_URL . 'popup-cloase.wav'
    ),
    'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_audio_sound_effect', array(
    'id'       => 'menu_hover_audio_sound',
    'type'           => 'media',
    'default' => array(
        'url' => RAINBOW_AUDIO_URL . 'link-hover-and-click.wav'
    ),
    'library_filter' => array('mp4','wav'),
    'mode' => false,
    'preview' => false,
    'url' => true,
    'readonly' => false,
    'title' => esc_html__('Menu audio sound', 'inbio'),
    'subtitle' => esc_html__('The recommended audio', 'inbio'),
    'placeholder' => esc_html__('Upload a .mp4 audio format.', 'inbio'),
    'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_audio_sound_effect', array(
    'id'       => 'button_click_audio_sound',
    'type'           => 'media',
    'default' => array(
        'url' => RAINBOW_AUDIO_URL . 'link-hover.wav'
    ),
    'library_filter' => array('mp4','wav'),
    'mode' => false,
    'preview' => false,
    'url' => true,
    'readonly' => false,
    'title' => esc_html__('Button click audio', 'inbio'),
    'subtitle' => esc_html__('The recommended audio', 'inbio'),
    'placeholder' => esc_html__('Upload a .mp4 audio format.', 'inbio'),
    'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_audio_sound_effect', array(
    'id'       => 'tab_button_click_audio_sound',
    'type'           => 'media',
    'default' => array(
        'url' => RAINBOW_AUDIO_URL . 'link-hover.wav'
    ),
    'library_filter' => array('mp4','wav'),
    'mode' => false,
    'preview' => false,
    'url' => true,
    'readonly' => false,
    'title' => esc_html__('Tab Button audio sound', 'inbio'),
    'subtitle' => esc_html__('The recommended audio', 'inbio'),
    'placeholder' => esc_html__('Upload a .mp4 audio format.', 'inbio'),
    'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_audio_sound_effect', array(
    'id'       => 'backtotop_click_audio_sound',
    'type'           => 'media',
    'default' => array(
        'url' => RAINBOW_AUDIO_URL . 'back-to-top.mp3'
    ),
    'library_filter' => array('mp4','wav'),
    'mode' => false,
    'preview' => false,
    'url' => true,
    'readonly' => false,
    'title' => esc_html__('Back to top audio sound', 'inbio'),
    'subtitle' => esc_html__('The recommended audio', 'inbio'),
    'placeholder' => esc_html__('Upload a .mp4 audio format.', 'inbio'),
    'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_audio_sound_effect', array(
    'id'       => 'rainbow_sound_volume_position',
    'type'     => 'select',
    'title'    => esc_html__('Select audio Sound volume Position', 'inbio'),
    'subtitle'    => esc_html__('You can set your audio sound button position left or right.', 'inbio'),
    'options'  => array(
        'left' => esc_html__('Left', 'inbio'),
        'right' => esc_html__('Right', 'inbio'),
    ),
    'default'  => 'left',
    'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_audio_sound_effect', array(
    'id' => 'inbio_sound_left_position_set',
    'title' => esc_html__('left Distance', 'inbio'),
    'type' => 'text',
    'default'  => '30px',
    'required' => array('rainbow_sound_volume_position', 'equals', 'left'),
) );

Redux::set_field( $opt_name, 'rainbow_audio_sound_effect', array(
    'id' => 'inbio_sound_right_position_set',
    'title' => esc_html__('Right Distance', 'inbio'),
    'type' => 'text',
    'default'  => '30px',
    'required' => array('rainbow_sound_volume_position', 'equals', 'right'),
) );

Redux::set_field( $opt_name, 'rainbow_audio_sound_effect', array(
    'id' => 'inbio_sound_bottom_position_set',
    'title' => esc_html__('Bottom Distance', 'inbio'),
    'type' => 'text',
    'default'  => '110px',
   'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
) );

Redux::setSection($opt_name, array(
    'title' => esc_html__('Audio Sound Box Color', 'inbio'),
    'id' => 'rainbow_audio_sound_color',
    'icon' => 'el el-video',
    'subsection' => true,
));
Redux::set_field( 
    $opt_name, 
    'rainbow_audio_sound_color', 
    array(
        'id'       => 'inbio_audio_sound_box_bg_color',
        'type'     => 'color_gradient',
        'title'    => esc_html__('Audio Sound Icon Box Gradient BGColor', 'inbio'),
        'subtitle' => esc_html__('Only color validation can be done on this field type', 'inbio'),
        'desc'     => esc_html__('This is the description field, again good for additional info.', 'inbio'),
        'validate' => 'color',
        'output'         => 'body.white-version .inbio-audio-label',
        'gradient-type'  => true,
        'gradient-reach' => true,
        'gradient-angle' => true,
        'default'        => array(
            'from'           => '#e2e8ec',
            'to'             => '#ffffff',
           
        ),
        'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
    ) 
);

Redux::set_field( 
    $opt_name, 
    'rainbow_audio_sound_color', 
    array(
        'id'       => 'inbio_audio_sound_bg_box_bg_color',
        'type'     => 'color_gradient',
        'title'    => esc_html__('Audio Sound Icon Box Dark Gradient BGColor', 'inbio'),
        'subtitle' => esc_html__('Only color validation can be done on this field type', 'inbio'),
        'desc'     => esc_html__('This is the description field, again good for additional info.', 'inbio'),
        'validate' => 'color',
        'output'         => '.inbio-audio-label',
        'gradient-type'  => true,
        'gradient-reach' => true,
        'gradient-angle' => true,
        'default'        => array(
            'from'           => '#1e2024',
            'to'             => '#23272b',
           
        ),
        'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
    ) 
);


Redux::set_field( $opt_name, 'rainbow_audio_sound_color', array(
    'id'       => 'inbio_audio_icon_color',
    'type'     => 'color',
    'title'    => esc_html__('Inbio audio volume Icon Color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #ff014f).', 'inbio'),
    'default'  => '#ff014f',
    'validate' => 'color',
    'output' => array(
        'color' => 'body.white-version .inbio-audio-label i'
    ),
    'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
) );

Redux::set_field( $opt_name, 'rainbow_audio_sound_color', array(
    'id'       => 'inbio_audio_icon_dark_color',
    'type'     => 'color',
    'title'    => esc_html__('Inbio audio volume Dark Icon Color', 'inbio'), 
    'subtitle' => esc_html__('Pick a  color for the theme (default: #ff014f).', 'inbio'),
    'default'  => '#ff014f',
    'validate' => 'color',
    'output' => array(
        'color' => '#inbio-audio-label i'
    ),
    'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
) );

Redux::set_field( 
    $opt_name, 'rainbow_audio_sound_color', 
    array(
        'id'       => 'inbio_box_shadow_white_version',
        'type'     => 'box_shadow',
        'drop-shadow' => false,
        'output'   => array( 'body.white-version .inbio-audio-label' ),
        'title'       => esc_html__( 'Audio Volume Icon box shadow', 'inbio' ),
        'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
    ) 
);

Redux::set_field( 
    $opt_name, 'rainbow_audio_sound_color', 
    array(
        'id'       => 'inbio_box_shadow_dark_version',
        'type'     => 'box_shadow',
        'output'   => array( '.inbio-audio-label' ),
        'drop-shadow' => false,
        'title'       => esc_html__( 'Audio Volume Icon box Dark shadow', 'inbio' ),
        'required' => array('rainbow_enable_audio_sound', 'equals', 'yes'),
    ) 
);