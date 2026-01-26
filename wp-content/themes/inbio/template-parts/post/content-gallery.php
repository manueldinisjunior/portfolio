<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */

$rainbow_options = Rainbow_Helper::rainbow_get_options();
$thumb_size = ($rainbow_options['rainbow_blog_sidebar'] === 'no') ? 'rainbow-thumbnail-single' : 'rainbow-thumbnail-archive';
$post_share_icon = (isset($rainbow_options['rainbow_show_post_share_icon'])) ? $rainbow_options['rainbow_show_post_share_icon'] : 'yes';
$images = rainbow_get_acf_data('rainbow_gallery_image');

$rainbow_blog_thumb = (is_active_sidebar('sidebar-1') && $rainbow_options['rainbow_blog_sidebar'] != 'no') ? 'rainbow-blog-thumb' : 'rainbow-blog-thumb-full';

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('content-blog  mb--40'); ?>>
    <div class="rn-blog">
        <div class="inner">

            <?php if ($images) { ?>
                <div class="thumbnail mb--60 inbio-slick-active inbio-carousel-gallery slick-dot-bottom slick-arrow-left-to-right">
                    <?php foreach ($images as $image): ?>
                        <div class="thumb-inner">
                            <img class="w-100" src="<?php echo esc_url($image['sizes'][$thumb_size]); ?>"
                                 alt="<?php echo esc_attr($image['alt']); ?>"/>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php } else {
                if (has_post_thumbnail()) { ?>
                    <div class="thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail($thumb_size) ?>
                        </a>
                    </div>
                <?php }
            } ?>

            <div class="content">

                <h4 class="title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?> <i class="feather-arrow-up-right"></i></a>
                </h4>

                <?php Rainbow_Helper::rainbow_postmeta(); ?>

                <?php the_excerpt(); ?>

                <?php Rainbow_Helper::rainbow_read_more(); ?>

            </div>
        </div>
    </div>
</div>