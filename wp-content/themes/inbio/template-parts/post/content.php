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
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('content-blog  mb--40'); ?>>
    <div class="rn-blog">
        <div class="inner">
            <?php if (has_post_thumbnail()) { ?>
                <div class="thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail($thumb_size) ?>
                    </a>
                </div>
            <?php } ?>
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
