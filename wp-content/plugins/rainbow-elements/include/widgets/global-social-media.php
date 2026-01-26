<?php
if( !class_exists('rainbow_global_social_widget') ){
    class rainbow_global_social_widget extends WP_Widget {

        public $default_fields;
        /**
         * Sets up the widgets name etc
         */
        public function __construct() {
            $widget_ops = array(
                'classname' => 'rainbow_global_social_widget',
                'description' => esc_html__('Global Social Media Widget. loaded the icons from theme options.', 'rainbow-elements'),
            );
            $this->default_fields = array(
                'title' => '',
            );

            parent::__construct( 'rainbow_global_social_widget', esc_html__('Inbio: Global Social Media Widget', 'rainbow-elements'), $widget_ops );
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {


            $rainbow_socials = \Rainbow_Helper::rainbow_socials();

            if ( ! isset( $args['widget_id'] ) ) {

                $args['widget_id'] = $this->id;

            }

            $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $has_title = (!empty($title)) ? "mt--35" : "";
            echo $args['before_widget'];
            if( $title ):
                echo $args['before_title'];
                echo esc_html( $title );
                echo $args['after_title'];
            endif;
            ?>

            <?php if ($rainbow_socials): ?>
                <div class="social-icone-wrapper <?php echo esc_attr($has_title); ?>">
                    <ul class="social-share d-flex liststyle">
                        <?php foreach ($rainbow_socials as $rbsocial): ?>
                            <li><a target="_blank" href="<?php echo esc_url($rbsocial['url']); ?>" title="<?php echo esc_attr($rbsocial['title']); ?>"><i
                                        class="<?php echo esc_attr($rbsocial['icon']); ?>"></i></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php
            echo $args['after_widget'];
        }

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            // outputs the options form on admin

            $instance = wp_parse_args( $instance, $this->default_fields );

            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'rainbow-elements' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
            </p>
            <?php
        }

        /**
         * Processing widget options on save
         *
         * @param array $new_instance The new options
         * @param array $old_instance The previous options
         */
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
            $instance = array();
            foreach($this->default_fields as $key => $def){
                $instance[$key] = $new_instance[$key];
            }

            return $instance;
        }
    }
}

if (!function_exists('register_rainbow_global_social_widget')){
    /**
     * Social Network Widget
     * @return void
     */
    function register_rainbow_global_social_widget(){
        register_widget('rainbow_global_social_widget');
    }
}

add_action('widgets_init', 'register_rainbow_global_social_widget');
