<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

?>
<!-- Start Slider Area  -->
<div class="rainbow-slider-area has-rainbow-slider-area">
    <div class="slider-slick-activation rainbow-slick-dots slick-dots-bottom">
        <?php
        foreach ($settings['list'] as $plist):
            if (!empty($plist['list_url'])) {
                $attr = 'href="' . $plist['list_url']['url'] . '"';
                $attr .= !empty($plist['is_external']) ? ' target="_blank"' : '';
                $attr .= !empty($plist['nofollow']) ? ' rel="nofollow"' : '';
            }
            $btn = "";
            if ($plist['list_url']) {

                $btn = '<a class="rainbow-btn" ' . $attr . '>' . $plist['list_btntext'] . '</a>';
            }
            $simage = !empty($plist['image']['url']) ? $plist['image']['url'] : false;
            ?>
            <div class="slide slide-style-3 bg_image d-flex align-items-center"
                 style="background-image:url(<?php echo esc_html($simage); ?>);">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner">
                            <span class="title-highlighter titlehighlighter mb--10"><?php echo wp_kses_post($plist['list_content']); ?></span>
                            <h1 class="h2 title mb--30"><?php echo wp_kses_post($plist['list_title']); ?></h1>

                            <?php if ($plist['list_btntext']) { ?>
                                <?php echo wp_kses_post($btn); ?>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- End Slider Area  -->