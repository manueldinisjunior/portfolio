<?php
class InbioEducationThemes
{
    public $plugin_file = __FILE__;
    public $response_obj;
    public $license_message;
    public $show_message = false;
    public $slug = 'inbio-dashboard';
    public static $licence_activated = false;
    public $plugin_version = '';
    public $text_domain = '';
    function __construct()
    {
        add_action('admin_print_styles', [$this, 'set_admin_style']);
        $this->set_plugin_data();
        $main_lic_key = "InBioPersonalPortfolioWordPressTheme_lic_Key";
        $lic_key_name = Inbio_Portfolio_Themes_Base::get_lic_key_param($main_lic_key);
        $license_key = get_option($lic_key_name, '');
        if (empty($license_key)) {
            $license_key = get_option($main_lic_key, '');
            if (!empty($license_key)) {
                update_option($lic_key_name, $license_key) || add_option($lic_key_name, $license_key);
                update_option($main_lic_key, '');
            }
        }
        $lice_email = get_option("Inbio_Portfolio_Themes_lic_email", '');
        $template_dir = get_stylesheet_directory(); //or dirname(__FILE__);
        if (Inbio_Portfolio_Themes_Base::check_wp_plugin($license_key, $lice_email, $this->license_message, $this->response_obj, $template_dir . "/style.css")) {
            add_action('admin_menu', [$this, 'active_admin_menu'], 99999);
            add_action('admin_post_Inbio_Portfolio_Themes_el_deactivate_license', [$this, 'action_deactivate_license']);
            self::$licence_activated = true;
            update_option('inbio_license_deactive', '');
        } else {
            if (!empty($license_key) && !empty($this->license_message)) {
                $this->show_message = true;
            }
            $main_lic_key = "InBioPersonalPortfolioWordPressTheme_lic_Key";
            $lic_key_name = Inbio_Portfolio_Themes_Base::get_lic_key_param($main_lic_key);
            update_option($lic_key_name, '') || add_option($lic_key_name, '');
            add_action('admin_post_inbioPortfolioThemes_el_activate_license', [$this, 'action_activate_license']);
            add_action('admin_menu', [$this, 'inactive_menu']);
        }
    }
    public function set_plugin_data()
    {
        if (! function_exists('get_plugin_data')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        if (function_exists('get_plugin_data')) {
            $data = get_plugin_data($this->plugin_file);
            if (isset($data['Version'])) {
                $this->plugin_version = $data['Version'];
            }
            if (isset($data['TextDomain'])) {
                $this->text_domain = $data['TextDomain'];
            }
        }
    }
    public function set_admin_style() {}
    public function active_admin_menu()
    {
        add_menu_page(
            "Inbio",
            "Inbio",
            "activate_plugins",
            $this->slug,
            [$this, "rainbow_plugin_menu_welcome"],
            get_template_directory_uri() . '/assets/images/dashboard/dashboard-icon.png',
            29
        );
        add_submenu_page($this->slug, "License Info", "License Info", "activate_plugins",  $this->slug . "_license", [$this, "activated"]);
    }
    public function rainbow_plugin_menu_welcome()
    {
        $current_theme = wp_get_theme();
        $theme_name = $current_theme->get('Name');
        $theme_version = $current_theme->get('Version');
        $wp_version = get_bloginfo('version');
        $php_version = phpversion();
        $time_limit = ini_get('max_execution_time');
        $upload_max_size = ini_get('upload_max_filesize');
        $memory_limit = ini_get('memory_limit');
        $post_max_size = ini_get('post_max_size');
        $max_input_vars = ini_get('max_input_vars');
        $active_plugins = get_option('active_plugins');
        $active_plugins_count = count($active_plugins);

        /**
         * Requirements
         */
        $max_memory_limit = 1024;
        $max_post_max_size = 500;
        $max_upload_max_filesize = 1024;
        $max_execution_time = 3000;
        $max_input_var_count = 10000;
        /**
         * Labels
         */
        // memory limit
        $memory_limit_num = preg_match('/\d+/', $memory_limit, $matches);
        $memory_limit_num = $matches[0];
        $memory_limit_label = $memory_limit_num < $max_memory_limit ? esc_html($memory_limit) . sprintf("<span class='rbt-danger'> (Required at last %dM) </span>", $max_memory_limit) : $memory_limit;
        // post max size
        $post_max_size_num = preg_match('/\d+/', $post_max_size, $matches);
        $post_max_size_num = $matches[0];
        $post_max_size_label = $post_max_size_num < $max_post_max_size ? esc_html($post_max_size) . sprintf("<span class='rbt-danger'> (Required at last %dM) </span>", $post_max_size_num) : $post_max_size;
        // upload max size
        $upload_max_size_num = preg_match('/\d+/', $upload_max_size, $matches);
        $upload_max_size_num = $matches[0];
        $upload_max_size_label = $upload_max_size_num < $max_upload_max_filesize ? esc_html($upload_max_size) . sprintf("<span class='rbt-danger'> (Required at last %dM) </span>", $max_upload_max_filesize) : $upload_max_size;
        // max execution time
        $max_execution_time_label = (int)$time_limit < $max_execution_time ? esc_html($time_limit) . sprintf("<span class='rbt-danger'> (Required at last %dM) </span>", $max_execution_time) : $time_limit;
        // max input vars
        $max_input_var_label = (int)$max_input_vars < $max_input_var_count ? esc_html($max_input_vars) . sprintf("<span class='rbt-danger'> (Required at last %dM) </span>", $max_input_var_count) : $max_input_vars;
        $current_user = wp_get_current_user();
        $username = $current_user->user_login;
        ob_start(); ?>
        <div class="rbt-dashboard-top-wrapper-main">
            <div class="rainbow-dashboard-box">
                <div class="rbt-success-alert">
                    <p><?php echo esc_html__('Congratulations! Your license has been activated.', 'inbio'); ?></p>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/dashboard/cross.svg'; ?>" alt="<?php echo esc_attr__('Image', 'inbio'); ?>">
                </div>
                <div class="rainbow-dashboard-box-single bg-default" data-background="<?php echo get_template_directory_uri() . '/assets/images/dashboard/welcome-screen.jpg' ?>">
                    <div class="rbt-content-inner">
                        <div class="row">
                            <div class="col-12 col-md-12 col-xs-12">
                                <div class="rbt-content-left">
                                    <span class="rainbow-subtitle"><?php echo esc_html__('Hi ', 'inbio'); ?><?php echo esc_html($username); ?> <img src="<?php echo get_template_directory_uri() . '/assets/images/dashboard/hand.svg' ?>" alt=""></span>
                                    <h5 class="rainbow-title"><?php echo esc_html__('Welcome to inbio', 'inbio'); ?></h5>
                                    <p class="rainbow-content"><?php echo wp_kses_post('We’re excited to have you. Explore courses, connect with peers, and enhance your skills.<br/> Reach out for assistance anytime. Happy learning and welcome aboard!', 'inbio'); ?></p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="rbt-content-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rbt-dashboard-tab-area">
                <div class="rainbow-dashboard-box-wrapper">
                    <div class="rbt-tab-buttons">
                        <div class="rbt-tab-content-left">
                            <button class="active" data-target="rbt-tab-dashboard-content-1"><?php echo esc_html__('Dashboard', 'inbio'); ?></button>
                            <a href="<?php echo esc_url(admin_url("admin.php?page=inbio-dashboard_license")); ?>"><?php echo esc_html__('License', 'inbio'); ?></a>
                            <?php if (class_exists('OCDI\OneClickDemoImport')) : ?>
                                <button data-target="rbt-tab-dashboard-content-3"><?php echo esc_html__('Demo Importer', 'inbio'); ?></button>
                            <?php endif; ?>
                            <button data-target="rbt-tab-dashboard-content-5"><?php echo esc_html__('Status', 'inbio'); ?></button>
                            <a href="https://rainbowit.net/docs/inbio-wp/" target="_blank"><?php echo esc_html__('Documentation', 'inbio'); ?></a>
                            <?php if (InbioEducationThemes::$licence_activated && class_exists('Redux_Framework_Plugin')) : ?>
                                <a href="<?php echo esc_url(admin_url('themes.php?page=inbio_options')); ?>"><?php echo esc_html__('Theme Option', 'inbio'); ?></a>
                            <?php else: ?>
                                <?php if (!InbioEducationThemes::$licence_activated) : ?>
                                    <a href="<?php echo esc_url(admin_url('admin.php?page=inactive-theme-options')); ?>"><?php echo esc_html__('Theme Option', 'inbio'); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a href="<?php echo esc_url(admin_url('customize.php')); ?>" target="_blank"><?php echo esc_html__('Customizer', 'inbio'); ?></a>
                        </div>
                        <div class="rbt-tab-content-right">
                            <a href="https://support.rainbowit.net/support/" class="rbt-tab-content-link" target="_blank" style="background: rgba(52, 88, 240, 0.1);">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dashboard/contact-svg.svg" alt="">
                                <span class="rbt-text"><?php echo esc_html__('Need Help?', 'inbio'); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="rbt-tab-content-wrapper">
                        <div id="rbt-tab-dashboard-content-1" class="rbt-tab-content">
                            <div class="rainbow-dashboard-box rbt-m-0-i rbt-mt-30-i">
                                <div class="row">
                                    <div class="col-xxl-8 col-xl-8 mb-4 mb-xl-0">
                                        <div class="row">
                                            <div class="col-xxl-4 mb-4 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="rbt-dashboard-single-card bg-default padding-box" data-background="<?php echo get_template_directory_uri() . '/assets/images/dashboard/doc.jpg' ?>">
                                                    <div class="rbt-content-inner">
                                                        <div class="content">
                                                            <h5 class="rainbow-title"><?php echo wp_kses_post('Friendly <br/>Documentation', 'inbio'); ?></h5>
                                                            <a href="https://rainbowthemes.net/docs/inbio-wp" class="rainbow-dashboard-btn" target="_blank"><?php echo esc_html__('View Documentation', 'inbio'); ?></a>
                                                        </div>
                                                        <div class="image">
                                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/dashboard/doc-man.png' ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 mb-4 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="rbt-dashboard-single-card bg-default padding-box" data-background="<?php echo get_template_directory_uri() . '/assets/images/dashboard/video.jpg' ?>">
                                                    <div class="rbt-content-inner">
                                                        <div class="content">
                                                            <h5 class="rainbow-title"><?php echo esc_html__('You can solve your problem by watching the video', 'inbio'); ?></h5>
                                                            <a href="https://www.youtube.com/watch?v=bfaFrc20sJg&t=2s" class="rainbow-dashboard-btn" target="_blank"><?php echo esc_html__('Video Tutorials', 'inbio'); ?></a>
                                                        </div>
                                                        <div class="image">
                                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/dashboard/video-tutorial-people.png' ?>" alt="<?php echo esc_attr__('image', 'inbio'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 mb-4 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="rbt-dashboard-single-card rbt-box-no-space" data-background="<?php echo get_template_directory_uri() . '/assets/images/dashboard/fast-support.jpg' ?>">
                                                    <div class="rbt-content-inner">
                                                        <div class="content rbt-text-left">
                                                            <h5 class="rainbow-title"><?php echo esc_html__('Fast & Friendly Support 24/5', 'inbio'); ?></h5>
                                                            <a href="https://support.rainbowit.net/support/" class="rainbow-dashboard-btn" target="_blank"><?php echo esc_html__('Get Support', 'inbio'); ?></a>
                                                        </div>
                                                        <div class="image">
                                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/dashboard/browsing-pc.png' ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 mb-4 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="rbt-dashboard-single-card rbt-box-no-space inbio-customizations-left-sideimg" data-background="http://histudy-new.local/wp-content/themes/histudy/assets/images/dashboard/wp-customization.jpg" style="background-image: url(&quot;http://histudy-new.local/wp-content/themes/histudy/assets/images/dashboard/wp-customization-bg.jpg&quot;);">
                                                    <div class="rbt-content-inner">
                                                        <div class="content rbt-text-left">
                                                            <h5 class="rainbow-title">Get a WordPress Customization</h5>
                                                            <a href="https://support.rainbowit.net/support/" class="rainbow-dashboard-btn" target="_blank">Discover More</a>
                                                        </div>
                                                        <div class="image">
                                                            <img src="http://histudy-new.local/wp-content/themes/histudy/assets/images/dashboard/wp-customization.png" alt="Hello World">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-8 col-xl-12 mb-4">
                                                <div class="rbt-support-banner">
                                                    <a href="https://themeforest.net/downloads" target="_blank">
                                                        <div class="rbt-support-author">
                                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/dashboard/support4.png' ?>" alt="">
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-4 col-xl-4">
                                        <div class="rbt-modal-wrapper">
                                            <h4 class="rbt-modal-title">
                                                <?php echo esc_html__('Update Change Log', 'inbio'); ?>
                                            </h4>
                                            <div class="rbt-changelog-body">

                                                <div class="rbt-product-changelog">
                                                    <h5 class="rbt-modal-title inner-title"><?php echo esc_html__('Version 3.0.5 – (Released on 17 July 2024)', 'inbio'); ?></h5>
                                                   
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('WooCommerce outdated template update.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('admin_body_class` filter e fatal error fix.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="rbt-product-changelog">
                                                    <h5 class="rbt-modal-title inner-title"><?php echo esc_html__('Version 3.0.0 – (Released on 17 July 2024)', 'inbio'); ?></h5>

                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Audio feature add.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Footer notifications bar.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Like count reset.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('password protected portfolio.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('portfolio slider js.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- version single 2.3.0 -->
                                                <div class="rbt-product-changelog">
                                                    <h5 class="rbt-modal-title inner-title"><?php echo esc_html__('Version 2.2.0 – (Released on 28 September 2022)', 'inbio'); ?></h5>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Intro pitch video adding options.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Back to Top button position (Left or Right).', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-3"><?php echo esc_html__('Updated', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('"Project single-page editing with Elementor', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-3"><?php echo esc_html__('Updated', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Project popup content editing with Elementor', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-3"><?php echo esc_html__('Updated', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Online Documentation.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Popup button target _blank issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('White version color issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('RTL JS issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- version single 2.2.0 -->
                                                <div class="rbt-product-changelog">
                                                    <h5 class="rbt-modal-title inner-title"><?php echo esc_html__('Version 2.0.1 – (Released on 19 September 2022)', 'inbio'); ?></h5>

                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-3"><?php echo esc_html__('Updated', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Required Plugin Versioning Issues', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- version single 2.1.0 -->
                                                <div class="rbt-product-changelog">
                                                    <h5 class="rbt-modal-title inner-title"><?php echo esc_html__('Version 2.0.0 – (Released on 19 September 2022)', 'inbio'); ?></h5>

                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Cart Icon for Header', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__(' More 20+ Social Media Options', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Project Archive Page Column Changing Options', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Project Archive Page Item Preview Type Popup or Single Page', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Thumbnail Size Changing Options', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__(' Project Popup Customization Options', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__(' Project Preview Type (Video, Gallery, Custom Link, Image)', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Project Information List Repeater.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Project Individual Select Popup Layout (Left media, Center Media & Right Media).', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Clap Animation for Like Button.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Project Type Indicator Icons.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Simple Product.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Grouped Product.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Affiliate Product.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Downloadable Product.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Variable Product.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('My Account Page.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Checkout Page.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Cart Page.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Theme Options Panel for WooCommarce.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Scroll behavior issue fixed.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Some minor CSS issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="rbt-modal-title inner-title"><?php echo esc_html__('Version 1.1.1 – (Released on 07 September 2022)', 'inbio'); ?></h5>

                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Add custom striping function.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Allowed custom HTML function.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('<br /> tag Issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Testimonial Carousel Title Issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Social Icon Title Issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Some minor CSS issues for mobile devices.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- version single 1.1.1 -->
                                                <div class="rbt-product-changelog">
                                                    <h5 class="rbt-modal-title inner-title">Version 1.1.0 – (Released on 30 April 2024)</h5>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('WooCommerce.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('RTL.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Clap Animation for Like Button.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('New', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Like Count Badge for Like Button.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Color Issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Social Link Target _blank Issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Theme Options Layout Broken Issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge badge-bg-2"><?php echo esc_html__('Fixed', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Text Animation Loading Twice Issues.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('Improved', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Header Sticky.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('Improved', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Portfolio Single Page Layout.', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('Improved', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Theme Options', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('Improved', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Demo Importer Speed Up', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- version single 1.1.0 -->
                                                <div class="rbt-product-changelog">
                                                    <h5 class="rbt-modal-title inner-title"><?php echo esc_html__('Version 1.0.0 -  (Released on 26 August 2022)', 'inbio'); ?></h5>
                                                    <div class="changelog-info">
                                                        <div class="row">
                                                            <div class="col-3 col-xl-4 col-xxl-3">
                                                                <span class="rbt-badge"><?php echo esc_html__('Release', 'inbio'); ?></span>
                                                            </div>
                                                            <div class="col-9 col-xl-8 col-xxl-9">
                                                                <span class="info-text"><?php echo esc_html__('Initial Release', 'inbio'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- version single 1.0 -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="rbt-tab-dashboard-content-3" class="rbt-tab-content d-none">
                            <?php if (class_exists('OCDI\OneClickDemoImport')) : ?>
                                <?php OCDI\OneClickDemoImport::get_instance()->display_plugin_page(); ?>
                            <?php endif; ?>
                        </div>
                        <div id="rbt-tab-dashboard-content-5" class="rbt-tab-content d-none">
                            <div class="rainbow-dashboard-box">
                                <div class="rbt-box-content rbt-m-0-i">
                                    <h4 class="rbt-mt-0-i"><?php echo esc_html__('WordPress', 'inbio'); ?></h4>
                                    <div class="rbt-table rbt-odd">
                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('Theme Name:', 'inbio'); ?></div>
                                            <div><?php echo esc_html($theme_name); ?></div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('Theme Version:', 'inbio'); ?></div>
                                            <div><?php echo esc_html($theme_version); ?></div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('WP Version:', 'inbio'); ?></div>
                                            <div><?php echo esc_html($wp_version); ?></div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('WP Multisite:', 'inbio'); ?></div>
                                            <div><?php echo is_multisite() ? __('Yes', 'inbio') : __('No', 'inbio'); ?></div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('WP Debug Mode:', 'inbio'); ?></div>
                                            <div><?php echo defined('WP_DEBUG') && WP_DEBUG ? __('Enabled', 'inbio') : __('Disabled', 'inbio'); ?></div>
                                        </div>
                                    </div>

                                    <h4><?php echo esc_html__('Server', 'inbio'); ?></h4>
                                    <div class="rbt-table rbt-odd">
                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('PHP Version:', 'inbio'); ?></div>
                                            <div><?php echo esc_html($php_version); ?></div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('PHP Post Max Size:', 'inbio'); ?></div>
                                            <div><?php echo wp_kses_post($post_max_size_label); ?></div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('PHP Time Limit:', 'inbio'); ?></div>
                                            <div><?php echo wp_kses_post($max_execution_time_label); ?></div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('PHP Max Input Vars:', 'inbio'); ?></div>
                                            <div>
                                                <span><?php echo wp_kses_post($max_input_var_label); ?></span>
                                            </div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('PHP Memory Limit:', 'inbio'); ?></div>
                                            <div><?php echo wp_kses_post($memory_limit_label); ?></div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('PHP Upload Max Size:', 'inbio'); ?></div>
                                            <div><?php echo wp_kses_post($upload_max_size_label); ?></div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('PHP Function "file_get_content":', 'inbio'); ?></div>
                                            <div><?php echo function_exists('file_get_contents') ? __('On', 'inbio') : __('Off', 'inbio'); ?></div>
                                        </div>

                                        <div class="rbt-table-row">
                                            <div><?php echo esc_html__('Active Plugins:', 'inbio'); ?></div>
                                            <div><?php echo esc_attr($active_plugins_count); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php echo ob_get_clean();
    }
    function get_plugin_deactivation_url($slug)
    {
        // Ensure that the required functions are available
        $all_plugins = get_plugins();
        foreach ($all_plugins as $plugin_path => $plugin_info) {
            if (strpos($plugin_path, $slug . '/') !== false || $plugin_path === $slug) {
                $deactivation_url = wp_nonce_url(
                    admin_url('plugins.php?action=deactivate&plugin=' . urlencode($plugin_path)),
                    'deactivate-plugin_' . $plugin_path
                );
                return $deactivation_url;
            }
        }
        return false; // Return false if the plugin was not found
    }
    function get_plugin_activate_url($slug)
    {
        $plugin_file = "{$slug}/{$slug}.php";
        $active_plugins = get_option('active_plugins');
        if (! file_exists(WP_PLUGIN_DIR . '/' . $plugin_file)) {
            return false;
        }

        if (in_array($plugin_file, $active_plugins)) {
            return false;
        }
        $activate_url = add_query_arg(
            array(
                'action'        => 'activate',
                'plugin'        => urlencode($plugin_file),
                '_wpnonce'      => wp_create_nonce('activate-plugin_' . $plugin_file),
            ),
            network_admin_url('plugins.php')
        );
        return $activate_url;
    }
    function get_all_installed_plugins()
    {
        // Ensure that the get_plugins function is available
        if (! function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        $all_plugins = get_plugins();
        $installed_plugins = array();
        $active_plugins = get_option('active_plugins');
        foreach ($all_plugins as $plugin_path => $plugin_info) {
            $plugin_slug = dirname($plugin_path);
            $installed_plugins[$plugin_slug] = array(
                'name' => $plugin_info['Name'],
                'slug' => $plugin_slug,
                'file_path' => $plugin_path,
                'version' => $plugin_info['Version'],
                'is_active' => in_array($plugin_path, $active_plugins)
            );
        }
        return $installed_plugins;
    }
    function get_all_installed_plugin_slug()
    {
        if (! function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        $all_plugins = get_plugins();
        $installed_slugs = array();
        foreach ($all_plugins as $plugin_path => $plugin_info) {
            $plugin_slug = dirname($plugin_path);
            $installed_slugs[] = $plugin_slug;
        }
        return $installed_slugs;
    }
    function check_missing_plugins($tgmpa_plugins, $installed_slugs)
    {
        $missing_plugins = array();
        foreach ($tgmpa_plugins as $index => $tgmpa_plugin) {
            if (!in_array($tgmpa_plugin['slug'], $installed_slugs)) {
                $missing_plugins[$index]['slug'] = $tgmpa_plugin['slug'];
                $missing_plugins[$index]['name'] = $tgmpa_plugin['name'];
                $missing_plugins[$index]['version'] = $tgmpa_plugin['version'];
            }
        }
        return $missing_plugins;
    }
    function get_plugin_install_url($slug)
    {
        if (! class_exists('TGM_Plugin_Activation')) {
            return false;
        }

        $tgmpa_instance = TGM_Plugin_Activation::get_instance();
        $plugins = $tgmpa_instance->plugins;
        if (! isset($plugins[$slug])) {
            return false;
        }
        $plugin = $plugins[$slug];
        $install_url = add_query_arg(
            array(
                'page'          => urlencode($tgmpa_instance->menu),
                'plugin'        => urlencode($slug),
                'plugin_name'   => urlencode($plugin['name']),
                'tgmpa-install' => 'install-plugin',
                'tgmpa-nonce'   => wp_create_nonce('tgmpa-install'),
            ),
            network_admin_url('themes.php')
        );
        return $install_url;
    }
    public function inactive_menu()
    {
        add_menu_page("Inbio", "Inbio", 'manage_options', $this->slug,  [$this, "license_form"], get_template_directory_uri() . '/assets/images/logo-menu.png', -1);
    }
    public function action_activate_license()
    {
        check_admin_referer('el-license');
        $license_key = !empty($_POST['el_license_key']) ? sanitize_text_field(wp_unslash($_POST['el_license_key'])) : '';
        $licenseEmail = !empty($_POST['el_license_email']) ? sanitize_email(wp_unslash($_POST['el_license_email'])) : '';
        update_option("InBioPersonalPortfolioWordPressTheme_lic_Key", $license_key) || add_option("InBioPersonalPortfolioWordPressTheme_lic_Key", $license_key);
        update_option("Inbio_Portfolio_Themes_lic_email", $licenseEmail) || add_option("Inbio_Portfolio_Themes_lic_email", $licenseEmail);
        update_option('_site_transient_update_themes', '');
        wp_safe_redirect(admin_url('admin.php?page=' . $this->slug));
        update_option('inbio_license_deactive', '');
    }
    public function action_deactivate_license()
    {
        check_admin_referer('el-license');
        $message = '';
        if (Inbio_Portfolio_Themes_Base::remove_license_key(__FILE__, $message)) {
            $main_lic_key = "InBioPersonalPortfolioWordPressTheme_lic_Key";
            $lic_key_name = Inbio_Portfolio_Themes_Base::get_lic_key_param($main_lic_key);
            update_option($lic_key_name, '') || add_option($lic_key_name, '');
            update_option('_site_transient_update_themes', '');
            update_option('inbio_license_deactive', 'invalid');
        }
        wp_safe_redirect(admin_url('admin.php?page=' . $this->slug));
    }
    public function activated()
    {
    ?>
        <div class="rbt-dashboard-top-wrapper-main">

            <div class="rbt-inactive--page rbt-license-wrapper">
                <div class="row justify-content-between">
                    <div class="col-xxl-6 col-xl-6">
                        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                            <input type="hidden" name="action" value="Inbio_Portfolio_Themes_el_deactivate_license" />
                            <div class="el-license-container">
                                <h3 class="el-license-title rbt-has-license-activated-title"><?php esc_attr_e("Congratulations! License Activated.", 'inbio'); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dashboard/badge-verified.png" alt=""> </h3>
                                <hr>
                                <div class="rbt-el-license-info">
                                    <ul class="el-license-info ">
                                        <li>
                                            <div>
                                                <span class="el-license-info-title"><?php esc_html_e("Status", 'inbio'); ?></span>

                                                <?php if ($this->response_obj->is_valid) : ?>
                                                    <span class="el-license-valid"><?php esc_html_e("Activated", 'inbio'); ?></span>
                                                <?php else : ?>
                                                    <span class="el-license-valid"><?php esc_html_e("Inactive", 'inbio'); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </li>

                                        <li>
                                            <div>
                                                <span class="el-license-info-title"><?php esc_html_e("License Type", 'inbio'); ?></span>
                                                <?php echo esc_html($this->response_obj->license_title, 'inbio'); ?>
                                            </div>
                                        </li>

                                        <li>
                                            <div>
                                                <span class="el-license-info-title"><?php esc_html_e("License Expired on", 'inbio'); ?></span>
                                                <?php echo esc_html($this->response_obj->expire_date, 'inbio');
                                                if (!empty($this->response_obj->expire_renew_link)) {
                                                ?>
                                                    <a target="_blank" class="el-blue-btn" href="<?php echo esc_url($this->response_obj->expire_renew_link); ?>">Renew</a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <span class="el-license-info-title"><?php esc_attr_e("Support Expired on", 'inbio'); ?></span>
                                                <?php
                                                echo esc_html($this->response_obj->support_end, 'inbio');
                                                if (!empty($this->response_obj->support_renew_link)) {
                                                ?>
                                                    <a target="_blank" class="el-blue-btn" href="<?php echo esc_url($this->response_obj->support_renew_link); ?>"><?php esc_attr_e("Renew", 'inbio') ?></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <span class="el-license-info-title"><?php esc_html_e("Your License Key", 'inbio'); ?></span>
                                                <span class="el-license-key"><?php echo esc_attr(substr($this->response_obj->license_key, 0, 9) . "XXXXXXXX-XXXXXXXX" . substr($this->response_obj->license_key, -9)); ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="el-license-active-btn rbt-license-deactivate">
                                    <?php wp_nonce_field('el-license'); ?>
                                    <?php submit_button('Deactivate License'); ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xxl-6 col-xl-6">
                        <div class="rbt-video-splash-area">
                            <h4 class="rbt-video-splash-title"><?php echo esc_html__('How to Import Demo Data: A Step-by-Step Video Guide', 'inbio'); ?></h4>
                            <p><?php echo esc_html__('Here is a video tutorial to assist you.', 'inbio'); ?></p>
                            <div class="rbt-content-right">
                                <div class="pt-4 rbt--video-container text-xl-end rbt-has-license-activated-play-btn">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dashboard/video-play.webp" alt="<?php echo esc_attr__('Image', 'inbio'); ?>">
                                    <a href="https://www.youtube.com/watch?v=o-YYzKGz4E0" class="popup-video rbt-video-play-btn"><?php echo esc_html__('Play', 'inbio'); ?></a>
                                </div>
                            </div>
                            <a href="https://support.rainbowit.net/support/" target="_blank" class="rbt-help-center-btn"><?php echo esc_attr__('Go to help center', 'inbio'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

    public function license_form()
    {
    ?>
        <div class="rbt-dashboard-top-wrapper-main">
            <div class="rbt-inactive--page rbt-license-wrapper">
                <div class="row justify-content-between">
                    <div class="col-xxl-6">
                        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                            <input type="hidden" name="action" value="inbioPortfolioThemes_el_activate_license" />
                            <div class="el-license-container">
                                <h3 class="el-license-title text-heading"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/dashboard/favicon.png" alt=""> <?php esc_html_e("Welcome to Licenses Manager", "inbio"); ?><span class="rbt-badge badge-bg-5 ms-2"><?php echo esc_html__('Not Active', 'inbio'); ?></span></h3>
                                <hr>
                                <div class="pt-3">
                                    <?php
                                    if (!empty($this->show_message) && !empty($this->license_message)) {
                                    ?>
                                        <div class="notice notice-error is-dismissible">
                                            <p><?php echo esc_html($this->license_message, 'inbio-education-themes'); ?></p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <p>
                                    <?php echo esc_html__('Please input the purchase code you received with the theme in order to activate your copy of the theme.', 'inbio') ?>
                                    <?php echo esc_html__('Please refer to', 'inbio') ?> <a target="_blank" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code"><?php echo esc_html__('the article', 'inbio') ?></a> <?php echo esc_html__('in order to locate your purchase code.', 'inbio') ?>
                                    <?php echo esc_html__('Link:', 'inbio') ?> <a target="_blank" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code"><?php echo esc_html__('How to get purchase code', 'inbio') ?></a>
                                </p>
                                <div class="rbt-license-form-wrapper pt-3">
                                    <div class="el-license-field">
                                        <label for="el_license_key"><?php esc_html_e("License code", 'inbio'); ?></label>
                                        <input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
                                    </div>
                                    <div class="el-license-field">
                                        <label for="el_license_key"><?php esc_html_e("Email Address", 'inbio'); ?></label>
                                        <?php
                                        $purchaseEmail   = get_option("Inbio_Portfolio_Themes_lic_email", get_bloginfo('admin_email'));
                                        ?>
                                        <input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo esc_html($purchaseEmail); ?>" required="required">
                                        <div><small><?php esc_html_e("We will send update news of this product by this email address, don't worry, we hate spam", 'inbio'); ?></small></div>
                                    </div>
                                    <div class="el-license-active-btn">
                                        <?php wp_nonce_field('el-license'); ?>
                                        <?php submit_button('Activate License'); ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xxl-6">
                        <div class="rbt--video-container text-xxl-end">
                            <div class="rbt-video-splash-area">
                                <h4 class="rbt-video-splash-title"><?php echo esc_html__('How Can I Activate My Theme', 'inbio'); ?></h4>
                                <p><?php echo esc_html__('Here is a video tutorial to assist you.', 'inbio'); ?></p>
                                <div class="rbt-video-splash-play-box" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/dashboard/dashboard-video-bg.webp' ?>)">
                                    <h2 class="rbt-video-splash-play-box-title"><?php echo wp_kses_post('Theme <br/> Activation', 'inbio'); ?></h2>
                                    <div class="rbt-video-splash-play-btn-box">
                                        <a href="https://www.youtube.com/watch?v=MZrpCgzt70s" class="popup-video">
                                            <div class="rbt-splash-text"> <?php echo esc_html__('PLAY', 'inbio'); ?> </div><img src="<?php echo get_template_directory_uri() . '/assets/images/dashboard/play-btn.png' ?>" alt="<?php echo esc_attr__('Play', 'inbio'); ?>">
                                        </a>
                                    </div>
                                </div>
                                <a href="https://support.rainbowit.net/support/" target="_blank" class="rbt-help-center-btn"><?php echo esc_attr__('Go to help center', 'inbio'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}

new InbioEducationThemes();
