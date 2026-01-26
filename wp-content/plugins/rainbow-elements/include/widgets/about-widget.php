<?php
/**
 * @package rainbow
 */

if( !class_exists('rainbow_Info_Widget') ){
    class rainbow_Info_Widget extends WP_Widget{
    	/**
         * Register widget with WordPress.
         */
        function __construct(){

            $widget_options = array(
                'description'                   => esc_html__('Inbio: Contact Info', 'rainbow-elements'),
                'customize_selective_refresh'   => true,
            );

            parent:: __construct('rainbow_Info_Widget', esc_html__( 'Inbio: Info', 'rainbow-elements'), $widget_options );

        }
        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ){
        	echo wp_kses_post( $args['before_widget'] );
        	if ( ! empty( $instance['title'] ) ) {
        		echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
        	}       	        	

        	$address = isset( $instance['address'] ) ? $instance['address'] : '';
            $address_label = isset( $instance['address_label'] ) ? $instance['address_label'] : '';

        	$email_label = isset( $instance['email_label'] ) ? $instance['email_label'] : '';
            $email = isset( $instance['email'] ) ? $instance['email'] : '';

        	$phone = isset( $instance['phone'] ) ? $instance['phone'] : '';
            $phone_label = isset( $instance['phone_label'] ) ? $instance['phone_label'] : '';


        	?>
            <div class="footer-contact">
                <?php if (!empty($phone)):
                    $number = trim( preg_replace( '/[^\d|\+]/', '', $phone ) ); 
                    ?>
                <div class="contact-list">
                    <div class="icon"><i class="fas fa-phone"></i></div>
                    <div class="content">
                        <span class="text font-b3"><?php echo esc_html($phone_label); ?></span>
                        <span class="number font-b1"><a href="tel:<?php echo esc_attr($number); ?>"><?php echo esc_html($phone); ?></a></span>
                    </div>
                </div>
                <?php endif ?>
                <?php if (!empty($email)): ?>
                <div class="contact-list">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <div class="content">
                        <span class="text font-b3"><?php echo esc_html($email_label); ?></span>
                        <span class="number font-b1"><a href="mailto:<?php echo esc_html($email); ?>"><?php echo esc_html($email); ?></a></span>
                    </div>
                </div>
                <?php endif ?>
                <?php if (!empty($address)): ?>
                <div class="contact-list">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="content">
                        <span class="text font-b3"><?php echo esc_html($address_label); ?></span>
                        <span class="number font-b1"><?php echo esc_html($address); ?></span>
                    </div>
                </div>
                <?php endif ?>
            </div>
        	<?php
        	echo wp_kses_post( $args['after_widget'] );
        }
        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ){
        	$instance              = array();

        	$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        	
        	$instance['address']   = ( ! empty( $new_instance['address'] ) ) ? strip_tags ( $new_instance['address'] ) : '';
            $instance['address_label']   = ( ! empty( $new_instance['address_label'] ) ) ? strip_tags ( $new_instance['address_label'] ) : '';
        	
            $instance['email']   = ( ! empty( $new_instance['email'] ) ) ? strip_tags ( $new_instance['email'] ) : '';
            $instance['email_label']   = ( ! empty( $new_instance['email_label'] ) ) ? strip_tags ( $new_instance['email_label'] ) : '';
        	
            $instance['phone']   = ( ! empty( $new_instance['phone'] ) ) ? strip_tags ( $new_instance['phone'] ) : '';
            $instance['phone_label']   = ( ! empty( $new_instance['phone_label'] ) ) ? strip_tags ( $new_instance['phone_label'] ) : '';
        	
        	return $instance;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance){ 
        	
        	$title = !empty( $instance['title'] ) ? $instance['title'] : '';
        	
        	$address = !empty( $instance['address'] ) ? $instance['address'] : ''; 
            $address_label = !empty( $instance['address_label'] ) ? $instance['address_label'] : ''; 

        	$email = !empty( $instance['email'] ) ? $instance['email'] : ''; 
            $email_label = !empty( $instance['email_label'] ) ? $instance['email_label'] : ''; 

        	$phone = !empty( $instance['phone'] ) ? $instance['phone'] : ''; 
            $phone_label = !empty( $instance['phone_label'] ) ? $instance['phone_label'] : ''; 
        	?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:' ,'rainbow-elements') ?></label>
                <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $title ); ?>">
            </p>
			<p>
                <label for="<?php echo esc_attr($this->get_field_id('phone_label')); ?>"><?php echo esc_html__('Phone Label:' ,'rainbow-elements') ?></label>
                <input id="<?php echo esc_attr($this->get_field_id('phone_label')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_label')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $phone_label ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php echo esc_html__('Phone:' ,'rainbow-elements') ?></label>
                <input id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $phone ); ?>">
            </p>
			

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('email_label')); ?>"><?php echo esc_html__('Email Label:' ,'rainbow-elements') ?></label>
				<input id="<?php echo esc_attr($this->get_field_id('email_label')); ?>" name="<?php echo esc_attr($this->get_field_name('email_label')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $email_label ); ?>">
			</p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php echo esc_html__('Email:' ,'rainbow-elements') ?></label>
                <input id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $email ); ?>">
            </p>


			<p>
                <label for="<?php echo esc_attr($this->get_field_id('address_label')); ?>"><?php echo esc_html__('Address Label:' ,'rainbow-elements') ?></label>
                <input id="<?php echo esc_attr($this->get_field_id('address_label')); ?>" name="<?php echo esc_attr($this->get_field_name('address_label')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $address_label ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php echo esc_html__('Address:' ,'rainbow-elements') ?></label>
                <input id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $address ); ?>">
            </p>
        	<?php
        }
	}
}

if(!function_exists('rainbow_Info_Widget')){
    /**
     * Info Widget
     *
     * @return void
     */
    function rainbow_Info_Widget(){
        register_widget('rainbow_Info_Widget');
    }
}
add_action('widgets_init','rainbow_Info_Widget');