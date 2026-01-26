<?php
/**
 * The template part for displaying the review
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package inbio
 */

$rainbow_options = Rainbow_Helper::rainbow_get_options();
?>
<div class="inbio-post-review">
    <div class="inbio-post-review__inner">
        <div class="inbio-post-review__top">
            <div class="inbio-post-review__product media">
                <?php
                $image = rainbow_get_acf_data('rainbow_post_review_image');
                if (!empty($image)): ?>
                    <div class="media-left media-middle">
                        <div class="inbio-post-review__product-image"><img src="<?php echo esc_url($image['url']); ?>"
                                                                           alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    </div>
                <?php endif; ?> 

                <div class="media-body media-middle">
                    <?php if (!empty(rainbow_get_acf_data('rainbow_post_review_name'))) { ?>
                        <h3 class="inbio-post-review-name"><?php echo rainbow_get_acf_data('rainbow_post_review_name') ?></h3>
                    <?php } ?>
                    <?php if (!empty(rainbow_get_acf_data('rainbow_post_review_description'))) { ?>
                        <span class="inbio-post-review-description"> <?php echo rainbow_get_acf_data('rainbow_post_review_description') ?> </span>
                    <?php } ?>
                </div>
            </div>

            <?php if (!empty(rainbow_get_acf_data('rainbow_post_review_score'))) { ?>
                <!--inbio-post-review__product media-->
                <div class="inbio-post-review__overall-score">
                    <div class="inbio-post-review__count_wrap">
                        <span class="post-score-value"><?php echo rainbow_get_acf_data('rainbow_post_review_score') ?></span>
                    </div>
                </div>
                <!--inbio-post-review__overall-score-->
            <?php } ?>
        </div>
        <?php if (!empty(rainbow_get_acf_data('rainbow_post_review_summary'))) { ?>
            <!--inbio-post-review__top-->
            <div class="inbio-post-review__summary">
                <p><?php echo rainbow_get_acf_data('rainbow_post_review_summary') ?></p>
            </div>
            <!--inbio-post-review__summary-->
        <?php } ?>

        <?php if (rainbow_get_acf_data('rainbow_post_review_pors_and_cons')) { ?>
            <div class="inbio-post-review__pros-and-cons">
                <div class="row row--space-between">
                    <?php
                    $pors = rainbow_get_acf_data('rainbow_post_review_pors');
                    if ($pors) { ?>
                        <div class="col-xs-12 col-sm-6">
                            <div class="inbio-post-review__pros">
                                <h5 class="inbio-post-review__list-title"><?php echo (!empty($rainbow_options['rainbow_post_review_pors_label'])) ? $rainbow_options['rainbow_post_review_pors_label'] : "Pors"; ?></h5>
                                <ul>
                                    <?php foreach ($pors as $por) { ?>
                                        <li>
                                            <i class="fal fa-check-circle"></i><span><?php echo esc_html($por['rainbow_post_review_add_pors']); ?></span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $cons = rainbow_get_acf_data('rainbow_post_review_cons');
                    if ($cons) { ?>
                        <div class="col-xs-12 col-sm-6">
                            <div class="inbio-post-review__cons">
                                <h5 class="inbio-post-review__list-title"><?php echo (!empty($rainbow_options['rainbow_post_review_cons_label'])) ? $rainbow_options['rainbow_post_review_cons_label'] : "Cons"; ?></h5>
                                <ul>
                                    <?php foreach ($cons as $con) { ?>
                                        <li>
                                            <i class="fal fa-times-circle"></i><span><?php echo esc_html($con['rainbow_post_review_add_cons']); ?></span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!--inbio-post-review__pros-and-cons-->
        <?php } ?>
    </div>
    <!--inbio-post-review__inner-->
</div>