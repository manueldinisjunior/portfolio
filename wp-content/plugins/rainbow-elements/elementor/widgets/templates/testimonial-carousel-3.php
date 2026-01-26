<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
?>
<div class="sticky-home-wrapper">    
<div data-aos="fade-left" data-aos-duration="500" data-aos-delay="200" data-aos-once="true" class="mb-0 rn-testimonial-area testimonial-style-2 section-height">    
	<div class="inner">
        <?php if(!empty($settings['title'])){ ?>
            <h5 class="title">
                <?php echo esc_html( $settings['title']); ?>
            </h5>
        <?php } ?>

    <div class="rn-testimonial-carousel testimonial-item-one rn-slick-dot-style dot-position-left slick-arrow-style-one arrow-top-align">		

		 <?php foreach ( $settings['list_testimonial2'] as $testimonial ):
				$has_designation  = $testimonial['designation2'] == 'yes' ? true : false;	
				$allowed_tags = wp_kses_allowed_html( 'post' );		
				$designation  	  = $testimonial['designation2'];
				$title  			= $testimonial['title2'];
				$content  			= $testimonial['content2'];	
				$size 				= 'rainbow-thumbnail-md';
				$img 				= wp_get_attachment_image( $testimonial['testimonial_image2']['id'], $size );	
				?>	       
	       
	        <!-- Start Single Testimonial  -->
	        <div class="testimonial-inner">
	            <div class="testimonial-header">
					<?php if ($img) { ?>
						<div class="thumbnail">								
							<?php echo wp_kses_post($img);?>
						</div>
					<?php } ?>	
	                <h5 class="ts-header">
	                    <span class="text-color-primary"><?php echo esc_html($title);?></span>  <?php echo esc_html($designation);?>
	                </h5>
	            </div>
	            <div class="testimonial-body">
	                <p class="description"><?php echo wp_kses( $content, $allowed_tags ); ?></p>
	            </div>
	        </div>
	        <!-- End Single Testimonial  -->
	 <?php endforeach; ?>
    	</div>
    <!-- carousel area End -->
	</div>
</div>
</div>
