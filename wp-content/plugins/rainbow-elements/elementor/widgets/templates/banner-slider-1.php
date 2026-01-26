<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */

namespace rainbow\Rainbow_Elements;
?>
<div class="has-rainbow-slider-area">
    <div class="rainbow-slider-area slider-activation slider-slick-activation rainbow-slick-dots dot-light">
        <?php
        foreach ($settings['list'] as $plist):
            if (!empty($plist['list_url'])) {
                $attr = 'href="' . $plist['list_url']['url'] . '"';
                $attr .= !empty($plist['is_external']) ? ' target="_blank"' : '';
                $attr .= !empty($plist['nofollow']) ? ' rel="nofollow"' : '';
            }
            $btn = "";
            if ($plist['list_url']) {

                $btn = '<a class="rainbow-btn btn-solid-white" ' . $attr . '>' . $plist['list_btntext'] . '</a>';
            }
            $simage = !empty($plist['image']['url']) ? $plist['image']['url'] : false;
            ?>
            <div class="slider-parallax d-flex align-items-center justify-content-center slide slide-style-2"
                 style="background-image:url(<?php echo esc_html($simage); ?>);">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner text-center text-white">
                            <h1 class="title"><?php echo wp_kses_post($plist['list_title']); ?></h1>
                            <p class="sub-title titlehighlighter"><?php echo wp_kses_post($plist['list_content']); ?></p>

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