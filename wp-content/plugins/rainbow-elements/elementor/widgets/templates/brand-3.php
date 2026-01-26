<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
use Elementor\Group_Control_Image_Size; 
?>

<!-- skill area Start -->
<div id="skill" class="rn-skill-area"> 
    <ul class="skill-style-1 mt-0">
        <?php foreach ( $settings['list_brand'] as $client ): 
              $title = $client['brand_title']; 
              $url = $client['url']['url'];
              $target = $client['url']['is_external'] ? ' target="_blank"' : '';
              $rel = $client['url']['nofollow'] ? ' rel="nofollow"' : '';
            ?>
            <li data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" title="ReactJs">
                <?php if (!empty($url)){ ?> <a href="<?php echo esc_url($url); ?>" <?php echo esc_attr($target); ?><?php echo esc_attr($rel); ?>> <?php } ?>
            <?php if(!empty(wp_get_attachment_image( $client['brand_image']['id']))){ ?>
                <?php echo wp_get_attachment_image( $client['brand_image']['id'], 'full' ); ?>
                <?php } else { ?>
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($client, 'full', 'brand_image') ?>
                <?php } ?>
            <?php if (!empty($url)){ ?> </a> <?php } ?>  
            </li>  
        <?php  endforeach;?> 
        
    </ul>               
</div>
<!-- skill area End -->
