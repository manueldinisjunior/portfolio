<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */
?>
<div class="section-title-wrapper mb--50">
    <div class="row justify-content-lg-<?php echo wp_kses_post( $settings['title_align'] );?>">
        <div class="col-lg-5">
        	<?php  if($settings['sub_title']){ ?>
            	<span class="title-highlighter sub-title mb--10"><?php echo wp_kses_post( $settings['sub_title'] );?></span>
            <?php  } ?>	
            <?php  if($settings['title']){ ?>
            	<<?php echo esc_html( $settings['sec_title_tag'] );?> class="mb--0 sec-title"><?php echo wp_kses_post( $settings['title'] );?></<?php echo esc_html( $settings['sec_title_tag'] );?>>	
            <?php  } ?>	
        </div>
    </div>
</div>
