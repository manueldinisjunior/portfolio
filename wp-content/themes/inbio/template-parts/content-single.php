<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */

// Get Value

$rainbow_options = Rainbow_Helper::rainbow_get_options();
$sidebar = Rainbow_Helper::rainbow_sidebar_options();
$rainbow_single_blog_sidebar_class = ($sidebar === 'full') || !is_active_sidebar('sidebar-1') ? ' col-lg-12' : ' col-lg-7';
$alignwide = ($sidebar === 'full') || !is_active_sidebar('sidebar-1') ? 'wp-block-image alignwide' : '';
$images = rainbow_get_acf_data('rainbow_gallery_image');
$audio_url = rainbow_get_acf_data('rainbow_upload_audio');
$custom_link = rainbow_get_acf_data('rainbow_custom_link');
$link = !empty($custom_link) ? $custom_link : get_the_permalink();
$rainbow_quote_author_name = rainbow_get_acf_data("rainbow_quote_author_name");
$rainbow_quote_author = !empty($rainbow_quote_author_name) ? $rainbow_quote_author_name : get_the_author();
$rainbow_quote_author_name_designation = rainbow_get_acf_data("rainbow_quote_author_name_designation");
$video_url = rainbow_get_acf_data("rainbow_video_link");
$thumb_size = 'rainbow-thumbnail-single';
$header_layout = Rainbow_Helper::rainbow_post_banner_style();
// Review
$review_area = rainbow_get_acf_data('rainbow_post_review_box');
$review_box_position = rainbow_get_acf_data('rainbow_post_review_box_position');
?>
<!-- Start Blog Area  -->
<div class="rainbow-blog-area">
    <div class="rainbow-single-post">
        <div class="content-block">
            <div class="inner">

                <?php
                if (has_post_format('gallery')) {

                    if ($images) { ?>
                        <div class="thumbnail mb--60 inbio-slick-active inbio-carousel-gallery slick-dot-bottom slick-arrow-style-one">
                            <?php foreach ($images as $image): ?>
                                <div class="thumb-inner">
                                    <img class="w-100" src="<?php echo esc_url($image['sizes'][$thumb_size]); ?>"
                                         alt="<?php echo esc_attr($image['alt']); ?>"/>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php } else {
                        if (has_post_thumbnail()) { ?>
                            
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail($thumb_size, ['class' => ' ']) ?>
                                </div>
                            
                        <?php }
                    }

                } else if (has_post_format('audio')) {
                    if ($audio_url) { ?>
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail($thumb_size, ['class' => ' ']) ?>
                            </div>
                        <?php } ?>
                        <div class="mb--60 audio-player-wrapper">
                            <audio controls>
                                <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/ogg">
                                <source src="<?php echo esc_url($audio_url['url']); ?>" type="audio/mpeg">
                                <?php esc_html_e('Your browser does not support the audio tag.', 'inbio'); ?>
                            </audio>
                        </div>
                    <?php }
                } else if (has_post_format('link')) {
                    if (!empty($custom_link)) { ?>
                        <div class="mb--60">
                            <div id="post-<?php the_ID(); ?>" <?php post_class('mb--20 inbio-blog-list sticky-blog mt_md--30 mt_sm--30 mt_lg--50'); ?>>
                                <div class="blog-top">
                                    <div class="sticky">
                                        <i class="fas fa-link"></i>
                                    </div>
                                    <?php if (!empty($custom_link)) { ?>
                                        <h3 class="title"><a
                                                    href="<?php echo esc_url($custom_link); ?>"><?php the_title(); ?></a>
                                        </h3>
                                    <?php } else { ?>
                                        <h3 class="title"><?php the_title(); ?></h3>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else if (has_post_format('quote')) {
                    // Null
                } else if (has_post_format('video')) {
                    $convar_emb_link = '';
                    if (function_exists('rainbow_getEmbedUrl')) {
                        $convar_emb_link = rainbow_getEmbedUrl($video_url);
                    }
                    if (!empty($convar_emb_link)) { ?>
                        <div class="thumbnail mb--60 position-relative">
                            <div class="embed-responsive embed-responsive-16by9">
                                

                                        <iframe class="embed-responsive-item" 
                                                        src="<?php echo esc_url($convar_emb_link . '?autoplay=0'); ?>" 
                                                        allow="autoplay; fullscreen; picture-in-picture" 
                                                        allowfullscreen="">
                                                </iframe>
                            </div>
                        </div>
                    <?php }
                } else {
                    ?>
                    <!-- End .content -->
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail($thumb_size, ['class' => ' ']) ?>
                        </div>
                    <?php } ?>
                    <!-- End .thumbnail -->
                    <?php
                }
                ?>

                <h1 class="title"><?php the_title(); ?></h1>

                <div class="post-meta">
                    <?php Rainbow_Helper::rainbow_singlepostmeta(); ?>
                </div>

                <div class="rainbow-post-content-wrapper">
                    <?php

                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="rainbow-page-links"><span class="page-link-holder">' . esc_html__('Pages:', 'inbio') . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                    ));
                    ?>
                </div>
                <?php   
                    /**
                     *  Output comments wrapper if it's a post, or if comments are open,
                     * or if there's a comment number – and check for password.
                     * */
                    if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
                        ?>
                        <div class="rainbow-comment-area">

                            <?php comments_template(); ?>

                        </div><!-- .comments-wrapper -->

                        <?php
                    }
                ?> 
            </div>
        </div>
        <!-- End .content-blog -->


    </div>
</div>

