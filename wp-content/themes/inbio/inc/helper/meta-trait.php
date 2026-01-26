<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */


trait rainbowPostMeta
{

    public static function rainbow_postmeta()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();
        ?>
        <ul class="meta">

            <?php
            if ($rainbow_options['rainbow_show_post_author_meta'] != 'no') { ?>
                <li class="single-post-meta-author"><i class="feather-user"></i><?php the_author(); ?></li>
            <?php } ?>
            <?php if ($rainbow_options['rainbow_show_post_publish_date_meta'] !== 'no') { ?>
                <li class="single-post-meta-date"><i
                            class="feather-clock"></i><?php echo get_the_time(get_option('date_format')); ?></li>
            <?php } ?>
            <?php if ($rainbow_options['rainbow_show_post_updated_date_meta'] !== 'no') { ?>
                <li class="single-post-meta-updated-date"><i
                            class="feather-edit"></i><?php echo the_modified_time(get_option('date_format')); ?></li>
            <?php } ?>
            <?php if ($rainbow_options['rainbow_show_post_reading_time_meta'] !== 'no') { ?>
                <li class="single-post-meta-reading-time"><i
                            class="feather-watch"></i><?php echo rainbow_content_estimated_reading_time(get_the_content()); ?>
                </li>
            <?php } ?>
            <?php if ($rainbow_options['rainbow_show_post_view'] != 'no') { ?>
                <li class="single-post-meta-post-views"><i
                            class="feather-eye"></i> <?php echo Rainbow_Post_Views_number('Views'); ?></li>
            <?php } ?>
            <?php if ($rainbow_options['rainbow_show_post_comments_meta'] !== 'no') { ?>
                <li class="single-post-meta-comment"><i
                            class="feather-message-circle"></i><?php comments_popup_link(esc_html__('No Comments', 'inbio'), esc_html__('1 Comment', 'inbio'), esc_html__('% Comments', 'inbio'), 'post-comment', esc_html__('Comments off', 'inbio')); ?>
                </li>
            <?php } ?>
            <?php if (($rainbow_options['rainbow_show_post_categories_meta'] !== 'no') && has_category()) { ?>
                <li class="single-post-meta-categories"><i class="feather-folder"></i><?php the_category(' '); ?></li>
            <?php } ?>
            <?php if (($rainbow_options['rainbow_show_post_tags_meta'] !== 'no') && has_tag()) { ?>
                <li class="single-post-meta-tag"><i class="feather-tag"></i><?php the_tags(' ', ' '); ?></li>
            <?php } ?>

        </ul>
        <?php
    }

    // Single post meta
    public static function rainbow_singlepostmeta()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();
        ?>
        <div class="inbio-post-meta">

            <div class="post-meta-content">
                <ul class="post-meta-list">

                    <?php if ($rainbow_options['rainbow_show_blog_details_author_meta'] != 'no') { ?>
                        <li>
                        <span class="post-author-avatar">
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID', get_the_author_meta('ID')))) ?>"><?php echo get_avatar(get_the_author_meta('ID'), 50); ?></a>
                            <span class="author-title post-author-name"><?php printf('<a href="%1$s">%2$s</a>', esc_url(get_author_posts_url(get_the_author_meta('ID', get_the_author_meta('ID')))), get_the_author_meta('display_name', get_the_author_meta('ID'))); ?></span>
                        </span>
                        </li>
                    <?php } ?>
                    
                    <?php if ($rainbow_options['rainbow_show_blog_details_publish_date_meta'] !== 'no') { ?>
                        <li><i class="feather-clock"></i><?php echo get_the_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($rainbow_options['rainbow_show_blog_details_updated_date_meta'] !== 'no') { ?>
                        <li><i class="feather-edit"></i><?php echo the_modified_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($rainbow_options['rainbow_show_blog_details_reading_time_meta'] !== 'no') { ?>
                        <li><i class="feather-watch"></i><?php echo rainbow_content_estimated_reading_time(get_the_content()); ?></li>
                    <?php } ?>
                    <?php if ($rainbow_options['rainbow_show_blog_details_post_view'] != 'no') { ?>
                        <li class="single-post-meta-post-views"><i class="feather-eye"></i><?php echo Rainbow_Post_Views_number('Views'); ?></li>
                    <?php } ?>
                    <?php if ($rainbow_options['rainbow_show_blog_details_comments_meta'] !== 'no') { ?>
                        <li class="single-post-meta-comment"><i class="feather-message-circle"></i><?php comments_popup_link(esc_html__('No Comments', 'inbio'), esc_html__('1 Comment', 'inbio'), esc_html__('% Comments', 'inbio'), 'post-comment', esc_html__('Comments off', 'inbio')); ?></li>
                    <?php } ?>
                    <?php if (($rainbow_options['rainbow_show_blog_details_categories_meta'] !== 'no') && has_category()) { ?>
                        <li class="single-post-meta-categories"><i class="feather-folder"></i><?php the_category(','); ?></li>
                    <?php } ?>
                    <?php if (($rainbow_options['rainbow_show_blog_details_tags_meta'] !== 'no') && has_tag()) { ?>
                        <li class="single-post-meta-tag"><i class="feather-tag"></i><?php the_tags('', ','); ?></li>
                    <?php } ?>

                </ul>
            </div>
        </div>

    <?php }


    /**
     * rainbow_post_category_meta
     */
    public static function rainbow_post_category_meta($show = true)
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();
        if ($show && $rainbow_options['rainbow_show_post_category'] !== 'no' && has_category()) {
            $categories = get_the_category();
            ?>
            <div class="category-list">

                <?php
                if (!empty($categories)) {
                    foreach ($categories as $category) { ?>
                        <a class="flip-item" href="<?php echo esc_url(get_category_link($category->term_id)) ?>">
                            <?php echo esc_html($category->name) ?>
                        </a> <?php
                    }
                }
                ?>
            </div>
            <?php
        }
    }

    public static function rainbow_read_more()
    {
        $rainbow_options = Rainbow_Helper::rainbow_get_options();
        if ($rainbow_options['rainbow_enable_readmore_btn'] !== 'no') { ?>
            <a class="rn-btn mt--25" href="<?php the_permalink(); ?>"><span
                        class="button-text"><?php echo esc_html($rainbow_options['rainbow_readmore_text'], 'inbio') ?></span><i class="feather-arrow-right"></i></a>
        <?php }
    }
}



