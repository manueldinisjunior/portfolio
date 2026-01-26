<?php
/**
 * Create a class for generic theme options
 * 
 * @since 1.0.0
 */
class Generic_Theme_Options {
    public static $_instance = null;
    /**
     * Create own class instance
     * 
     * @since 1.0.0
     * 
     * @return static $_instance
     */
    public static function instance() {
        if( is_null( self::$_instance ) ) {
            $_instance = new Self();
        }
        return self::$_instance;
    }
    /**
     * Create own class constructor
     * 
     * @since 1.0.0
     * @return void
     */
    public function __construct() {
        add_action('admin_menu', array( $this, 'rbt_theme_options' ));
    }
    /**
     * Create theme options page for rainbow theme
     * 
     * @since 1.0.0
     */
    public function rbt_theme_options() {
        add_submenu_page(
            'inbio',
            __( 'Plugins', 'inbio' ),
            __( 'Plugins', 'inbio' ),
            'manage_options',
            admin_url('plugins.php'),
        );
    }
    /**
     * Callback for status check
     * 
     * @since 1.0.0
     */
    public function rbt_status_callback() {
        $current_theme = wp_get_theme();
        $theme_name = $current_theme->get( 'Name' );
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
        ob_start();?>
        
        <div class="rbt-status-panel">
            <div class="rbt-box rbt-status rbt-theme-style">
                <div class="rbt-box-header">
                    <h3><?php echo esc_html__( 'Status', 'inbio' ); ?></h3>
                    <a href="" class="button button-large" style="margin-top: 15px;"><?php echo esc_html__( 'How Update Server Condiguration', 'inbio' ); ?></a>
                </div>

                <div class="rbt-box-content">
                    <h4><?php echo esc_html__( 'WordPress', 'inbio' ); ?></h4>
                    <div class="rbt-table rbt-odd">
                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'Theme Name:', 'inbio' ); ?></div>
                            <div><?php echo esc_html( $theme_name ); ?></div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'Theme Version:', 'inbio' ); ?></div>
                            <div><?php echo esc_html( $theme_version ); ?></div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'WP Version:', 'inbio' ); ?></div>
                            <div><?php echo esc_html($wp_version); ?></div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'WP Multisite:', 'inbio' ); ?></div>
                            <div><?php echo is_multisite() ? __( 'Yes', 'inbio' ): __( 'No', 'inbio' ); ?></div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'WP Debug Mode:', 'inbio' ); ?></div>
                            <div><?php echo defined( 'WP_DEBUG' ) && WP_DEBUG ? __( 'Enabled', 'inbio' ): __( 'Disabled', 'inbio' ); ?></div>
                        </div>
                    </div>

                    <h4><?php echo esc_html__( 'Server', 'inbio' ); ?></h4>
                    <div class="rbt-table rbt-odd">
                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'PHP Version:', 'inbio' ); ?></div>
                            <div><?php echo esc_html( $php_version ); ?></div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'PHP Post Max Size:', 'inbio' ); ?></div>
                            <div><?php echo esc_html( $post_max_size ); ?></div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'PHP Time Limit:', 'inbio' ); ?></div>
                            <div><?php echo esc_attr( $time_limit ); ?></div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'PHP Max Input Vars:', 'inbio' ); ?></div>
                            <div>
                                <span><?php echo esc_html($max_input_vars); ?></span>
                            </div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'PHP Memory Limit:', 'inbio' ); ?></div>
                            <div><?php echo esc_html( $memory_limit ); ?></div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'PHP Upload Max Size:', 'inbio' ); ?></div>
                            <div><?php echo esc_html( $upload_max_size ); ?></div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'PHP Function "file_get_content":', 'inbio' ); ?></div>
                            <div><?php echo function_exists('file_get_contents') ? __( 'On', 'inbio' ): __( 'Off', 'inbio' ); ?></div>
                        </div>

                        <div class="rbt-table-row">
                            <div><?php echo esc_html__( 'Active Plugins:', 'inbio' ); ?></div>
                            <div><?php echo esc_attr( $active_plugins_count ); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php echo ob_get_clean();}
}
Generic_Theme_Options::instance();