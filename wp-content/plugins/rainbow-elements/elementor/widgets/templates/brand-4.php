<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
use Elementor\Group_Control_Image_Size; 
?>
<div class="rn-client-area rn-client-style-2">   
    <div class="skill-style-1">
        <div class="client-card mt-0">
            <?php foreach ( $settings['list_brand'] as $client ): 
                 $title = $client['brand_title']; 
                 $url = $client['url']['url'];
                 $target = $client['url']['is_external'] ? ' target="_blank"' : '';
                 $rel = $client['url']['nofollow'] ? ' rel="nofollow"' : '';
                ?>
            <!-- Start Single Brand  -->
            <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="main-content">
                <div class="inner text-center"> 
                    <div class="thumbnail">                             
                        <?php if (!empty($url)){ ?> <a href="<?php echo esc_url($url); ?>" <?php echo esc_attr($target); ?><?php echo esc_attr($rel); ?>> <?php } ?>
                        <?php if(!empty(wp_get_attachment_image( $client['brand_image']['id']))){ ?>
                            <?php echo wp_get_attachment_image( $client['brand_image']['id'], 'full' ); ?>
                            <?php } else { ?>
                                <?php echo Group_Control_Image_Size::get_attachment_image_html($client, 'full', 'brand_image') ?>
                            <?php } ?>
                        <?php if (!empty($url)){ ?> </a> <?php } ?>  
                    </div> 
                    <div class="seperator"></div>
                    <div class="client-name"><span><a href="<?php echo esc_url($url);?>"><?php echo esc_html($title);?></a></span>
                    </div>
                </div>
            </div>
            <!-- End Single Brand  -->
        <?php  endforeach;?>
        </div>
    </div>
</div>
