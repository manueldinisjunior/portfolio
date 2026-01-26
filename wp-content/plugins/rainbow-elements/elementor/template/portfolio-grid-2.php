<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package rainbow-elements
 */
namespace rainbow\Rainbow_Elements;


$thumb_size = 'rainbow-thumbnail-lg';
$query_args = rainbow_Elements_Helper::rainbow_get_query_args( 'rainbow_projects', 'rainbow_projects_category', $settings);
// The Query
$query      = new \WP_Query($query_args);

$col_class = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}";
 $i == 1;   

?>
    <div class="rn-portfolio-area portfolio-style-three">
    <?php if ($query->have_posts()) { ?>
	<div class="portfolio-wrapper portfolio-slick-activation slick-arrow-style-one rn-slick-dot-style">
           <?php
            while ($query->have_posts()) {
                $query->the_post();

                $top_active =   '';
                $i++;
                if( $i==1 ){
                    
                    $top_active =   'active ';
                }
                ?>  
                <div class="rn-portfolio-slick">
			     <div class="rn-portfolio" data-toggle="modal" data-target="#exampleModalCenter-<?php echo esc_attr( $i );?>">
			         <div class="inner">
			             <?php   if ( has_post_thumbnail() ){ ?>
			                <div class="thumbnail">
			                    <a href="javascript:void(0)">                                       
			                        <?php the_post_thumbnail( $thumb_size ); ?>                                       
			                    </a>
			                </div>
			             <?php } ?>  
			             <div class="content">
			                 <div class="category-info">
			                     <div class="category-list">
			                        <?php echo rainbow_Elements_Helper::get_projects_cat( get_the_id() ); ?>
			                     </div>
			                     <div class="meta">
			                         <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
									 <?php echo esc_html__( '600', 'inbio' ) ?></span>
			                     </div>
			                 </div>
			                 <h4 class="title">
			                 	<a href="javascript:void(0)"><?php the_title();?> <i class="feather-arrow-up-right"></i></a></h4>
			             </div>
			         </div>
			     </div> 

			    
			 </div> 	    
 			<?php } ?>
        <?php wp_reset_postdata(); ?>    
	</div>
<?php } ?>
<?php 
	$j=1;
	while ($query->have_posts()) {
	    $query->the_post();
	    $top_active =   '';
	   
		    if( $j==1 ){		        
		        $top_active =   'active ';		  
		      }

	    ?>  
	    <!-- Modal Portfolio Body area Start -->
	    <div class="modal fade" id="exampleModalCenter-<?php echo esc_attr( $j );?>" tabindex="-1" role="dialog" aria-hidden="true">
	        <div class="modal-dialog modal-dialog-centered" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true"><i data-feather="x"></i></span>
	                    </button>
	                </div>
	                <div class="modal-body">
	                    <div class="row align-items-center">

	                        <div class="col-lg-6">
	                            <div class="portfolio-popup-thumbnail">

	                                <?php   if ( has_post_thumbnail() ){ ?>
	                                    <div class="image">                                      
	                                        <?php the_post_thumbnail( 'rainbow-thumbnail-lg' ); ?>
	                                    </div>
	                                <?php } ?>  

	                            </div>
	                        </div>

	                        <div class="col-lg-6">
	                            <div class="text-content">
	                                <h3>
	                                    <?php the_title();?>
	                                </h3>
	                                <?php the_excerpt() ;?> 
	                                <div class="button-group mt--20">
                                        <a href="#" class="rn-btn thumbs-icon">
                                            <span><?php echo esc_html__( 'LIKE THIS', 'inbio' ) ?></span>
                                            <i class="feather-thumbs-up"></i>
                                        </a>
                                        <a href="<?php the_permalink(); ?>" class="rn-btn">
                                            <span><?php echo esc_html__( 'VIEW PROJECT', 'inbio' ) ?></span>
                                            <i class="feather-chevron-right"></i>
                                        </a>
                                      </div>
	                            </div>
	                            <!-- End of .text-content -->
	                        </div>
	                    </div>
	                    <!-- End of .row Body-->
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- End Modal Portfolio area -->

	<?php  $j++;
	 } ?>
<?php wp_reset_postdata(); ?>   



</div>

