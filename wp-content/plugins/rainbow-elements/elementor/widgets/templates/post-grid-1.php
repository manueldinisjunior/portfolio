<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 */
namespace rainbow\Rainbow_Elements;
?>

<div class="rn-blog-area rt-departments">
    <?php
    $i = 1;
    $thumb_size = $settings['image_size_size'];
    $popup_thumb_size = $settings['popup_image_size_size'];
    $posttype = 'post';
    $taxonomy = 'category';

    $uniqueid = time() . rand( 1, 99 );

    if (get_query_var('paged')) {
        $paged = get_query_var('paged');
    } else if (get_query_var('page')) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }

    $category_list = '';
    if (!empty($settings['category'])) {
        $category_list = implode(", ", $settings['category']);
    }
    $category_list_value = explode(" ", $category_list);


    $exclude_category_list = '';
    if (!empty($settings['exclude_category'])) {
        $exclude_category_list = implode(", ", $settings['exclude_category']);
    }
    $exclude_category_list_value = explode(" ", $exclude_category_list);


    $posts_per_page = (!empty($settings['posts_per_page'])) ? $settings['posts_per_page'] : '-1';
    $orderby = (!empty($settings['orderby'])) ? $settings['orderby'] : 'post_date';
    $order = (!empty($settings['order'])) ? $settings['order'] : 'desc';
    $offset_value = (!empty($settings['offset'])) ? $settings['offset'] : '0';


    // number
    $off = (!empty($offset_value)) ? $offset_value : 0;
    $offset = $off + (($paged - 1) * $posts_per_page);
    $p_ids = array();


    // Post in
    $post_in = $settings['post__in'];
    if ($post_in >= 1 && !empty($post_in)) {
        $post_in_ids = implode(', ', $post_in);
    } else {
        $post_in_ids = '';
    }
    $in_posts = explode(',', $post_in_ids);

    $args = array(
        'cat' => $settings['category'],
        'post_type' => $posttype,
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'orderby' => $orderby,
        'order' => $order,
        'offset' => $offset,
        'paged' => $paged,
        'category__not_in' => $exclude_category_list_value,
    );

    // ignore_sticky_posts and manually Exclude
    $sticky = get_option('sticky_posts');
    if (!empty($settings['ignore_sticky_posts']) && $settings['ignore_sticky_posts'] == 'yes') {
        $args['ignore_sticky_posts'] = 1;

        if (!empty($settings['post__not_in'])) {
            $post__not_in = $settings['post__not_in'];
            $posts_not_in = array_merge($post__not_in, $sticky);
            $args['post__not_in'] = $posts_not_in;
        } else {
            $args['post__not_in'] = $sticky;
        }

    } else {
        if (!empty($settings['post__not_in'])) {
            $post__not_in = $settings['post__not_in'];
            $args['post__not_in'] = $post__not_in;
        }
    }

    // show_sticky_posts and manually Exclude

    if (!empty($settings['show_only_sticky_posts']) && $settings['show_only_sticky_posts'] == 'yes') {
        $args['ignore_sticky_posts'] = 1;
        // post__in
        if ("0" != $in_posts && !empty($settings['post__in'])) {
            $posts_in = array_merge($in_posts, $sticky);
            $args['post__in'] = $posts_in;
        } else {
            $args['post__in'] = $sticky;
        }
    } else {
        // post__in
        if ("0" != $in_posts && !empty($settings['post__in'])) {
            $args['post__in'] = $in_posts;
        }
    }

    $title_limit = $settings['post_title_length'];
    $content_limit = $settings['post_content_length'];

    $query = new \WP_Query($args);
    $temp = \rainbow_helper::wp_set_temp_query($query);

    if ($query->have_posts()) { ?>
    <div class="row <?php echo esc_attr($settings['row_gap']); ?>">
        <?php
        while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $excerpt = wp_trim_words(get_the_excerpt(), $content_limit, '');
        $ptitle = wp_trim_words(get_the_title(), $title_limit, '');
        ?>

        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="400" data-aos-once="true"
             class="rtin-item aos-init aos-animate col-lg-<?php echo esc_attr($settings['rainbow_post_columns_for_desktop']); ?> col-md-<?php echo esc_attr($settings['rainbow_post_columns_for_laptop']); ?> col-sm-<?php echo esc_attr($settings['rainbow_post_columns_for_tablet']); ?> col-<?php echo esc_attr($settings['rainbow_post_columns_for_mobile']); ?>">
            <?php if ($settings['blog_modal_popup_display']) { ?>
            <div class="rn-blog post-card-only-popup">
                <?php }else{ ?>
                <div class="rn-blog">
                    <?php } ?>
                    <div class="inner">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="thumbnail">
                                <?php if ($settings['blog_modal_popup_display']) { ?>
                                    <a class="thumb-only-popup" href="<?php the_permalink(); ?>"  data-toggle="modal" data-target="#exampleModalCenters-<?php echo esc_attr($uniqueid . $i); ?>">
                                        <?php the_post_thumbnail($thumb_size); ?>
                                    </a>
                                <?php } else { ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail($thumb_size); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <div class="content">
                            <?php if ($settings['cat_display'] == 'yes' && $settings['meta_display'] == 'yes') { ?>
                                <div class="category-info">
                                    <?php if ($settings['cat_display'] == 'yes') { ?>
                                        <?php if ($settings['blog_modal_popup_display']) { ?> 
                                            <div class="category-list">
                                                <?php echo rainbow_Elements_Helper::get_blogs_cat(get_the_ID()); ?>
                                            </div>
                                        <?php }else{ ?>
                                            <div class="category-list">
                                                <?php echo rainbow_Elements_Helper::get_blogs_cat(get_the_ID()); ?>
                                            </div>
                                        <?php } ?>  
                                    <?php } ?>
                                    <?php if ($settings['meta_display'] == 'yes') { ?>
                                        <div class="meta">
                                            <span><i class="feather-clock"></i> <?php echo rainbow_content_estimated_reading_time(get_the_content()); ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <h4 class="title">
                                <?php if ($settings['blog_modal_popup_display']) { ?>
                                    <a class="title-only-popup" href="<?php the_permalink(); ?>"  data-toggle="modal" data-target="#exampleModalCenters-<?php echo esc_attr($uniqueid . $i); ?>"><?php the_title(); ?> <i class="feather-arrow-up-right"></i></a>
                                <?php } else { ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?> <i class="feather-arrow-up-right"></i></a>
                                <?php } ?>
                            </h4>
                            <?php if ($settings['content_display'] == 'yes') { ?>
                                <p class="post-excerpts blog-content"><?php echo wp_kses_post($excerpt); ?></p>
                            <?php } ?>

                        </div>

                    </div>
                </div>
            </div>




            <!-- Modal Blog Body area Start -->
            <div class="modal fade" id="exampleModalCenters-<?php echo esc_attr($uniqueid . $i); ?>" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-news" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> <i class="feather-x"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="post-thumbnail img-fluid modal-feat-im mb--30">
                                    <?php the_post_thumbnail($popup_thumb_size, ['class' => 'img-fluid modal-feat-im in-radius']) ?>
                                </div>
                            <?php } ?>
                            <div class="news-details">
                                <?php if ($settings['meta_display'] == 'yes') { ?>
                                    <span class="date"><?php echo the_modified_time(get_option('date_format')); ?></span>
                                <?php } ?>

                                <h2 class="title"><?php the_title(); ?> </h2>
                                <?php the_content(); ?>
                            </div>

                        </div>
                        <!-- End of .modal-body -->
                    </div>
                </div>
            </div>

            <?php $i++;
            } ?>
        </div>

        <?php \rainbow_helper::wp_reset_temp_query($temp);
        } ?>

    </div>