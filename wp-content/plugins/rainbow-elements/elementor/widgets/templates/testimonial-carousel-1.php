<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
?>
 <div class="testimonial-activation-wrapper">    
	 <div class="testimonial-activation testimonial-pb mb--30">   

	 <?php foreach ( $settings['list_testimonial'] as $testimonial ): 
				
				$has_designation  = $testimonial['designation'] == 'yes' ? true : false;			
				$designation  	  = $testimonial['designation'];
				$title  			= $testimonial['title'];
				$titlebefore  		= $testimonial['titlebefore'];
				$content  			= $testimonial['content'];

				$subject_title  	= $testimonial['subject_title'];
				$subject_date  		= $testimonial['subject_date'];

				$size 				= 'rainbow-thumbnail-sm';				
				$img 				= wp_get_attachment_image( $testimonial['testimonial_image']['id'], $size );
				$has_star           = $testimonial['show_rating'] == 'yes' ? true : false;			
				$rating  			= $testimonial['rating'];
				$nonrating 		  	= 5 - (int)$rating ;	
			
				?>
		    <div class="testimonial mt--50 mt_md--40 mt_sm--40">
		        <div class="inner">
		            <div class="card-info">
		            	<?php if ($img) { ?>
							<div class="card-thumbnail">								
								<?php echo wp_kses_post($img);?>
							</div>
						<?php } ?>	

		                <div class="card-content">
		                    <span class="subtitle mt--10"><?php echo esc_html($titlebefore);?></span>
		                    <h3 class="title"><?php echo esc_html($title);?></h3>
		                    <span class="designation"><?php echo esc_html($designation);?></span>
		                </div>

		            </div>
		            <div class="card-description">
		                <div class="title-area">
		                    <div class="title-info">
		                        <h3 class="title"> <?php echo esc_html($subject_title);?></h3>
		                        <span class="date"> <?php echo esc_html($subject_date);?></span>
		                    </div>

		                    <?php if ($has_star): ?>
								<div class="rating">
									<ul>
									<?php foreach (range(1, $rating) as $key): ?>
										<li class="has-rating list-inline-item">
											<i class="star-icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
												</svg>
											</i>
										</li>

									<?php endforeach; ?>
									<?php for ($i=1; $i <= $nonrating; $i++): ?>
										<li class="nonrating list-inline-item">
											<i class="star-icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
												</svg>
											</i>
										</li>
									<?php endfor; ?>
								</ul>
								 </div>
							<?php endif ?>
		                    
		                </div>
		                <div class="seperator"></div>
		                <p class="description">
		                  <?php echo esc_html($content);?>
		                </p>
		            </div>
		        </div>
		    </div> 
	    <?php  endforeach;?>
	</div>
</div>

