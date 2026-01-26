<?php
if( !class_exists('rainbow_social_widget') ){
    class rainbow_social_widget extends WP_Widget {

        public $default_fields;
        /**
         * Sets up the widgets name etc
         */
        public function __construct() {
            $widget_ops = array(
                'classname' => 'rainbow_social_widget',
                'description' => esc_html__('Inbio: Social Media Widget', 'rainbow-elements'),
            );
            $this->default_fields = array(
                'title' => '',
                'fb' => '#',
                'tw' => '#',
                'ins' => '#',
                'pin' => '#',
                'led' => '#',
                'youtube' => '#',
            );

            parent::__construct( 'rainbow_social_widget', esc_html__('Inbio: Social Media Widget', 'rainbow-elements'), $widget_ops );
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {

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

            <div class="social-icone-wrapper <?php echo esc_attr($has_title); ?>">
                    <ul class="social-share d-flex liststyle">
                    <?php if($instance['fb']){?>
                    <li>
                            <a href="<?php echo esc_url($instance['fb'])?>">
                                <i class="feather-facebook"></i>
                            </a>
                    </li>
                    <?php }?>
                    <?php if($instance['tw']){?>
                        <li>
                    
                            <a href="<?php echo esc_url($instance['tw'])?>">
                                <i class="feather-twitter"></i>
                            </a>
                    </li>
                    <?php }?>
                    <?php if($instance['ins']){?>
                        <li>
                    
                            <a href="<?php echo esc_url($instance['ins'])?>">
                                <i class="feather-instagram"></i>
                            </a>
                        </li>
                    <?php }?>
                    
                    <?php if($instance['led']){?>
                        <li>
                    
                            <a href="<?php echo esc_url($instance['led'])?>">
                                <i class="feather-linkedin"></i>
                            </a>
                        </li>
                    <?php }?>
                    <?php if(isset($instance['youtube']) && $instance['youtube']){?>
                        <li>
                    
                            <a href="<?php echo esc_url($instance['youtube'])?>">
                                <i class="feather-youtube"></i>
                            </a>
                        </li>
                    <?php }?>
                </ul>
                </div>
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
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'fb' ) ); ?>"><?php esc_attr_e( 'Facebook Link:', 'rainbow-elements' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fb' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fb' ) ); ?>" type="text" value="<?php print $instance['fb']; ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'tw' ) ); ?>"><?php esc_attr_e( 'Twitter Link:', 'rainbow-elements' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tw' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tw' ) ); ?>" type="text" value="<?php print $instance['tw']; ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'ins' ) ); ?>"><?php esc_attr_e( 'Instagram Link:', 'rainbow-elements' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ins' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ins' ) ); ?>" type="text" value="<?php print $instance['ins']; ?>">
            </p>
        
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'led' ) ); ?>"><?php esc_attr_e( 'Linkedin Link:', 'rainbow-elements' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'led' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'led' ) ); ?>" type="text" value="<?php print $instance['led']; ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_attr_e( 'Youtube Link:', 'rainbow-elements' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php print $instance['youtube']; ?>">
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

if (!function_exists('register_rainbow_social_widget')){
    /**
     * Social Network Widget
     * @return void
     */
    function register_rainbow_social_widget(){
        register_widget('rainbow_social_widget');
    }
}

add_action('widgets_init', 'register_rainbow_social_widget');
