<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
?>
 <div class="rn-testimonial-area testimonial-style-2">
	<div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" data-aos-once="true" class="testimonial-activation-item-3 slick-arrow-style-one row">
	 <?php foreach ( $settings['list_testimonial2'] as $testimonial ): 				
				$has_designation  = $testimonial['designation2'] == 'yes' ? true : false;	
				$allowed_tags = wp_kses_allowed_html( 'post' );		
				$designation  	  = $testimonial['designation2'];
				$title  			= $testimonial['title2'];
				$content  			= $testimonial['content2'];	
				$size 				= 'rainbow-thumbnail-md';
				$img 				= wp_get_attachment_image( $testimonial['testimonial_image2']['id'], $size );	
				?>	       
	        <div class="rn-testimonial">
	            <div class="testimonial-inner">
	                <div class="testimonial-header">
	                	<?php if ($img) { ?>
							<div class="thumbnail">								
								<?php echo wp_kses_post($img);?>
							</div>
						<?php } ?>	
	                    <h5 class="ts-header">
	                        <span class="text-color-primary"><?php echo esc_html($title);?></span> <?php echo esc_html($designation);?>
	                    </h5>
	                </div>
	                <div class="testimonial-body">
	                    <p class="description"><?php echo wp_kses( $content, $allowed_tags ); ?>
	                    </p>
	                </div>
	            </div>
	        </div>      
	    <?php  endforeach;?>
	</div>
</div>