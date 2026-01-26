<?php
/**
 * Template part for displaying project content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */

$rainbow_options = Rainbow_Helper::rainbow_get_options();

$thumb_size = ($rainbow_options['rainbow_single_project_pos'] === 'full') ? 'rainbow-thumbnail-single' : 'rainbow-thumbnail-single';
$preview_type = rainbow_get_acf_data('preview_type');
$preview_icon = 'feather-none';

$video_url = rainbow_get_acf_data('video_url');
$gallery = rainbow_get_acf_data('gallery');
$link = rainbow_get_acf_data('link_url');
$view_project_button_url = rainbow_get_acf_data('popup_project_button_url');

$i = 1;
if ( $preview_type == 'image' ) {
    $preview_icon = 'feather-image';
    $data_url = "";
} elseif ( $preview_type == 'video' ) {
    $preview_icon = 'feather-video';
    $data_url = rainbow_getEmbedUrl($video_url);
} elseif ( $preview_type == 'gallery' ) {
    $preview_icon = 'feather-grid';
    $data_url = "";
} elseif ( $preview_type == 'link' ) {
    $preview_icon = 'feather-link';
    $data_url = "";
} else {  }
?>
<!-- Start Blog Area  -->
<div class="rainbow-blog-area">
    <div class="rainbow-single-post">
        <div class="content-block">
            <div class="inner">
                <?php
                if ( $preview_type == 'image' ) { ?>
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="post-thumbnail mb--60">
                            <?php the_post_thumbnail($thumb_size, ['class' => ' ']) ?>
                        </div>
                    <?php } ?>
                <?php } elseif ( $preview_type == 'video' ) {
                    $row_video_src = '';
                    if (function_exists('rainbow_getEmbedUrl')) {
                        $row_video_src = rainbow_getEmbedUrl($video_url);
                    }
                    if (!empty($row_video_src)) { ?>
                        <div class="portfolio-popup-thumbnail thumbnail mb--60 position-relative">
                            <div class="embed-responsive embed-responsive-16by9">

                                <iframe class="embed-responsive-item" 
                                                        src="<?php echo esc_url($row_video_src . '?autoplay=0'); ?>" 
                                                        allow="autoplay; fullscreen; picture-in-picture" 
                                                        allowfullscreen="">
                                                </iframe>


                            </div>
                        </div>
                    <?php }
                } elseif ( $preview_type == 'gallery' ) {

                    if ($gallery) { ?>
                        <div class="thumbnail mb--60 inbio-slick-active inbio-carousel-gallery slick-dot-bottom slick-arrow-style-one">
                            <?php foreach ($gallery as $image): ?>
                                <div class="thumb-inner">
                                    <img class="w-100" src="<?php echo esc_url($image['sizes'][$thumb_size]); ?>"
                                         alt="<?php echo esc_attr($image['alt']); ?>"/>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php } else {
                        if (has_post_thumbnail()) { ?>
                            <div class="post-thumbnail mb--60">
                                <?php the_post_thumbnail($thumb_size, ['class' => ' ']) ?>
                            </div>
                        <?php }
                    }

                } elseif ( $preview_type == 'link' ) { ?>
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="post-thumbnail mb--60">
                            <?php the_post_thumbnail($thumb_size, ['class' => ' ']) ?>
                            <a href="<?php echo esc_url($link); ?>" target="_blank" class="preview-link">
                            <i class="feather-link"></i></a>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="post-thumbnail mb--60">
                            <?php the_post_thumbnail($thumb_size, ['class' => ' ']) ?>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="row mb--30 row--30">
                    <div class="col-lg-8 col-md-12">
                        <h1 class="title text-left"><?php the_title(); ?></h1>
                        <?php
                        if ( has_excerpt() ) {
                            the_excerpt();
                        }
                        ?>
                        <?php
                        $info_list = rainbow_get_acf_data('information');
                        if ( $info_list ) { ?>
                            <div class="info-list">
                                <ul>
                                    <?php
                                    foreach ($info_list as $info) { ?>
                                        <li><strong><?php echo esc_html($info['label']) ?></strong> <span><?php echo esc_html($info['value']) ?></span></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-12">
                            <div class="single-project-meta mt--20  mt_md--40 mt_sm--40">

                                <?php
                                $id            = get_the_id();
                                $modal_button_url 	= get_post_meta( $id, 'popup_project_button_url', true );
                                $vpbtn = '<a target="_blank" href="'. $modal_button_url .'"  class="rn-btn w-100 text-center"> <span>' . $rainbow_options['view_txt'] . '</span>  <i class="feather-arrow-right-circle"></i></a>';
                                ?>

                                <?php
                                GLOBAL $post;
                                $nonce2 = wp_create_nonce( 'rainbow_pt_like_it_nonce' );
                                $link2 = admin_url('admin-ajax.php?action=rainbow_pt_like_it&post_id='.$post->ID.'&nonce='.$nonce2);
                                $likes2 = get_post_meta( get_the_ID(), '_pt_likes', true );
                                $likes2 = ( empty( $likes2 ) ) ? 0 : $likes2;
                                $likes_text = ( $likes2 <= 1 ) ? $rainbow_options['like_txt'] : $rainbow_options['like_txt'];
                                ?>

                                <?php if($rainbow_options['rainbow_show_single_project_like'] != 'no'){ ?>
                                    <div class="post-like pt-like-it w-100 mb--30">
                               <span> <a class="like-button rn-btn thumbs-icon rn-btn thumbs-icon w-100 text-center" href="<?php echo esc_url($link2); ?>"  data-id="<?php echo esc_attr(get_the_ID()); ?>" data-nonce="<?php echo esc_attr($nonce2); ?>">
                                       <span><?php echo esc_html($likes_text); ?> </span>
                                       <i class="feather-thumbs-up mr--10"></i>
                                       <mark id="like-count-<?php echo get_the_ID() ?>" class="like-count badge">
                                            <?php $likes2 = ($likes2 == "0") ? "" : $likes2; ?>
                                            <?php echo esc_html($likes2); ?>
                                        </mark>
                                </a></span>
                                    </div>
                                <?php } ?>

                                <?php
                                if ( !empty($modal_button_url) ) {
                                    echo wp_kses_post( $vpbtn );
                                }
                                ?>

                            </div>
                        </div>
                </div>

                <div class="rb-separator pb--30">
                    <div class="divider-separator w-100"></div>
                </div>

                <div class="rainbow-post-wrapper">
                    <?php 
                     $post_content = $post->post_content;

                     // Apply 'the_content' filter to the post content
                    $filtered_content = apply_filters('the_content', $post_content);
                    echo wp_kses_post( $filtered_content );
                    wp_link_pages(array(
                        'before' => '<div class="rainbow-page-links"><span class="page-link-holder">' . esc_html__('Pages:', 'inbio') . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                    )); 
                    ?> 
                </div>
            </div>
        </div>
        <!-- End .content-blog --> 
    </div>
</div>

