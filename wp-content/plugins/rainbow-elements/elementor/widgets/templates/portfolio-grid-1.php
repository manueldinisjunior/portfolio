<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */

namespace rainbow\Rainbow_Elements;

use Elementor\Group_Control_Image_Size;

$thumb_size = $settings['image_size_size'];
$query_args = rainbow_Elements_Helper::rainbow_get_query_args('rainbow_projects', 'rainbow_projects_category', $settings);
$number_of_post = $settings['posts_per_page'];
$query = new \WP_Query($query_args);
$col_class = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']} col-{$settings['col']}";
$gridspaces = $settings['grid-spaces'];
$i = 1;
$data = $settings;


?>
<div class="rn-portfolio-area rb-projects portfolio-style-three" data-settings='<?php echo json_encode($data); ?>'
     data-paged='1'>
    <?php if ($query->have_posts()) { ?>
    <div class="row menu-list row--<?php echo esc_attr($gridspaces); ?>">
        <?php
        while ($query->have_posts()) {
        $query->the_post();


        $top_active = '';

        if ($i == 1) {
            $top_active = 'active ';
        }
        $id = get_the_id();
        $modal_button_url = get_post_meta($id, 'popup_project_button_url', true);
        $like_this_txt = $settings['like_this_txt'];
        $modal_button_txt = $settings['modal_button_txt'];



        $preview_type = rainbow_get_acf_data('preview_type');
        $preview_icon = 'feather-none';

        $video_url = rainbow_get_acf_data('video_url');
        $gallery = rainbow_get_acf_data('gallery');
        $custom_link = rainbow_get_acf_data('link_url');
        $view_project_button_url = rainbow_get_acf_data('popup_project_button_url');


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
            $preview_icon = 'feather-external-link';
            $data_url = "";
        } else {  }


        // A Custom Link
        if ( $preview_type == 'link' ) {
            $card_link = $custom_link;
            $target =  true;
        } else {
            $card_link = get_the_permalink();
            $target =  false;
        }


        $rainbow_options = \Rainbow_Helper::rainbow_get_options();
        $popup_style = \Rainbow_Helper::rainbow_portfolio_popup_style();

        $popup_layout = $popup_style['project_popup_style'];

        if ( $popup_layout == 'left' ){
            $popup_col_class = "col-lg-6";
            $content_col_class = "col-md-12";
            $button_col_class = "col-md-12";
            $popup_image_size = "" !== $rainbow_options['rainbow_project_popup_image_size'] ? $rainbow_options['rainbow_project_popup_image_size'] : 'rainbow-thumbnail-lg';
        } elseif ($popup_layout == 'center') {
            $popup_col_class = "col-lg-12";
            $content_col_class = "col-md-9";
            $button_col_class = "col-md-3";
            $popup_image_size = "" !== $rainbow_options['rainbow_project_popup_image_size'] ? $rainbow_options['rainbow_project_popup_image_size'] : 'rainbow-thumbnail-single';;
        } elseif ($popup_layout == 'right') {
            $popup_col_class = "col-lg-6";
            $content_col_class = "col-md-12";
            $button_col_class = "col-md-12";
            $popup_image_size = "" !== $rainbow_options['rainbow_project_popup_image_size'] ? $rainbow_options['rainbow_project_popup_image_size'] : 'rainbow-thumbnail-lg';
        } else {
            $popup_col_class = 'col-lg-6';
            $content_col_class = "col-md-12";
            $button_col_class = "col-md-12";
            $popup_image_size = "" !== $rainbow_options['rainbow_project_popup_image_size'] ? $rainbow_options['rainbow_project_popup_image_size'] : 'rainbow-thumbnail-lg';
        }
        //  Add class
        $preview_type_class = ($preview_type) ? "preview-type-$preview_type" : false;

        ?>
            <div class="<?php echo esc_attr($col_class); ?> rb-items mt--50 mt_md--30 mt_sm--30 <?php echo esc_attr($preview_type_class); ?>">

                <?php if ( $settings['modal_popup_display'] == 'yes' && $preview_type != 'link' ) { ?>
                    <div class="rn-portfolio portfolio-card-only-popup">
                <?php } else { ?>
                    <div class="rn-portfolio">
                <?php } ?>

                    <div class="inner">
                        <span class="preview-type"><i class="<?php echo esc_attr($preview_icon); ?>"></i></span>

                        <?php if (has_post_thumbnail()) { ?>
                            <div class="thumbnail">
                                <?php if ($settings['modal_popup_display'] == 'yes' && $preview_type != 'link') { ?>
                                    <a href="<?php echo esc_url($card_link); ?>" data-url="<?php echo esc_url($data_url); ?>" data-toggle="modal"
                                       data-target="#exampleModalCenter-<?php echo esc_attr($id); ?>"><?php the_post_thumbnail($thumb_size); ?></a>
                                <?php } else { ?>
                                    <a href="<?php echo esc_url($card_link); ?>" <?php if ( $target ) : ?> target="_blank"<?php endif; ?>>
                                        <?php the_post_thumbnail($thumb_size); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="content">
                            <div class="category-info">

                                <?php if ($settings['projects_cat_display']) { ?>
                                    <?php if ($settings['modal_popup_display']) { ?>
                                        <div class="category-list">
                                            <?php echo rainbow_Elements_Helper::get_projects_cat(get_the_id()); ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="category-list">
                                            <?php echo rainbow_Elements_Helper::get_projects_cat(get_the_id()); ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>

                                <?php if ($settings['projects_meta_display']) { ?>
                                    <?php
                                    global $post;
                                    $nonce2 = wp_create_nonce('rainbow_pt_like_it_nonce');
                                    $link2 = admin_url('admin-ajax.php?action=rainbow_pt_like_it&post_id=' . $post->ID . '&nonce=' . $nonce2);
                                    $likes2 = get_post_meta(get_the_ID(), '_pt_likes', true);
                                    $likes2 = (empty($likes2)) ? 0 : $likes2;
                                    ?>
                                    <div class="post-like pt-like-it meta">
                                       <span> <a class="like-button" href="<?php echo esc_url($link2); ?>"
                                                 data-id="<?php echo esc_attr(get_the_ID()); ?>"
                                                 data-nonce="<?php echo esc_attr($nonce2); ?>">
                                            <i class="feather-heart"></i><span
                                                       id="like-count-<?php echo get_the_ID() ?>" class="like-count">
                                            <?php $likes2 = ($likes2 == "0") ? "" : $likes2; ?>
                                            <?php echo esc_html($likes2); ?>
                                        </span>
                                        </a></span>
                                    </div>

                                <?php } ?>
                            </div>
                            <h4 class="title">
                                <?php if ($settings['modal_popup_display'] == 'yes' && $preview_type != 'link') { ?>
                                    <a href="<?php echo esc_url($card_link); ?>" data-url="<?php echo esc_url($data_url); ?>" data-toggle="modal"
                                       data-target="#exampleModalCenter-<?php echo esc_attr($id); ?>"><?php the_title(); ?>
                                        <i class="feather-arrow-up-right"></i></a>
                                <?php } else { ?>
                                    <a href="<?php echo esc_url($card_link); ?>" <?php if ( $target ) : ?> target="_blank"<?php endif; ?>><?php the_title(); ?> <i
                                                class="feather-arrow-up-right"></i></a>
                                <?php } ?>
                            </h4>
                        </div>
                    </div>
                </div>

                <!-- Modal Portfolio Body area Start -->
                <div class="modal fade newportfolio-modal modal-layout-<?php echo esc_attr($popup_layout) ?>" id="exampleModalCenter-<?php echo esc_attr($id); ?>" tabindex="-1" role="dialog"
                     aria-hidden="true" data-modalwrapper="portfolio-modal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="feather-x"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row align-items-center">
                                    <div class="<?php echo esc_attr( $popup_col_class ); ?>">
                                        <?php
                                        if ( $preview_type == 'image' ) { ?>
                                            <div class="portfolio-popup-thumbnail">
                                                <?php if (has_post_thumbnail()) { ?>
                                                    <div class="image">
                                                        <?php the_post_thumbnail($popup_image_size); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } elseif ( $preview_type == 'video' ) {
                                            $row_video_src = '';
                                            if (function_exists('rainbow_getEmbedUrl')) {
                                                $row_video_src = rainbow_getEmbedUrl($video_url);
                                            }
                                            $video_ratio =  ($popup_layout == 'center') ? '16by9' : '4by3';
                                            if (!empty($row_video_src)) { ?>
                                                <div class="portfolio-popup-thumbnail">
                                                    <div class="embed-responsive embed-responsive-<?php echo esc_attr($video_ratio); ?>">
                                                        <iframe class="embed-responsive-item" src="<?php echo esc_url($row_video_src); ?>"
                                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen=""
                                                        ></iframe>
                                                    </div>
                                                </div>
                                            <?php }
                                        } elseif ( $preview_type == 'gallery' ) {
                                            if ($gallery) { ?>
                                                <div id="portfolio-modal-thumbnail-slider-<?php echo esc_attr($id); ?>" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php
                                                        $r = 1;
                                                        foreach ($gallery as $image):
                                                            $inner_active = $r == 1 ? 'inner active' : null;
                                                            $r++;
                                                            ?>
                                                            <div class="carousel-item <?php echo esc_attr($inner_active); ?>">
                                                                <img class="w-100" src="<?php echo esc_url($image['sizes'][$popup_image_size]); ?>"
                                                                     alt="<?php echo esc_attr($image['alt']); ?>"/>
                                                            </div>
                                                        <?php endforeach; ?>

                                                    </div>
                                                    <a class="carousel-control-prev" href="#portfolio-modal-thumbnail-slider-<?php echo esc_attr($id); ?>" role="button" data-slide="prev">
                                                        <span class="" aria-hidden="true"> <i class="feather-arrow-left"></i> </span>
                                                        <span class="sr-only"><?php esc_html__('Previous', 'rainbow-elements'); ?></span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#portfolio-modal-thumbnail-slider-<?php echo esc_attr($id); ?>" role="button" data-slide="next">
                                                        <span class="" aria-hidden="true"> <i class="feather-arrow-right"></i> </span>
                                                        <span class="sr-only"><?php esc_html__('Next', 'rainbow-elements'); ?></span>
                                                    </a>
                                                </div>
                                            <?php } else {
                                                if (has_post_thumbnail()) { ?>
                                                    <div class="portfolio-popup-thumbnail">
                                                        <?php if (has_post_thumbnail()) { ?>
                                                            <div class="image">
                                                                <?php the_post_thumbnail($popup_image_size); ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php }
                                            }
                                        } else { ?>
                                            <div class="portfolio-popup-thumbnail">
                                                <?php if (has_post_thumbnail()) { ?>
                                                    <div class="image">
                                                        <?php the_post_thumbnail($popup_image_size); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="<?php echo esc_attr( $popup_col_class ); ?>">
                                        <div class="text-content">

                                            <div class="row">
                                                <div class="<?php echo esc_attr( $content_col_class ); ?>">
                                                    <h3> <?php the_title(); ?> </h3>

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
                                                <div class="<?php echo esc_attr( $button_col_class ); ?>">
                                                    <?php if( $popup_layout == 'center'){ ?>
                                                        <div class="d-flex flex-wrap mt--20">
                                                            <?php if ($settings['projects_meta_display']) { ?>
                                                                <?php
                                                                global $post;
                                                                $nonce = wp_create_nonce('rainbow_pt_like_it_nonce');
                                                                $link = admin_url('admin-ajax.php?action=rainbow_pt_like_it&post_id=' . $post->ID . '&nonce=' . $nonce);
                                                                $likes = get_post_meta(get_the_ID(), '_pt_likes', true);
                                                                $likes = (empty($likes)) ? 0 : $likes;
                                                                $likes_text = ($likes <= 1) ? $settings['like_this_txt'] : $settings['like_this_txt'];
                                                                ?>
                                                                <div class="post-like pt-like-it w-100 mb--30">
                                                                    <a class="like-button rn-btn thumbs-icon rn-btn thumbs-icon w-100 text-center"
                                                                       href="<?php echo esc_url($link); ?>"
                                                                       data-id="<?php echo esc_attr(get_the_ID()); ?>"
                                                                       data-nonce="<?php echo esc_attr($nonce); ?>">
                                                                        <span> <?php echo esc_html($likes_text); ?> </span>
                                                                        <i class="feather-thumbs-up mr--10"></i>
                                                                        <mark id="like-count2-<?php echo get_the_ID() ?>"
                                                                              class="like-count badge">
                                                                            <?php echo esc_html($likes); ?>
                                                                        </mark>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                            <?php
                                                            $vpbtn = '<a  href="' . $modal_button_url . '"  class="rn-btn w-100 text-center" target="_blank"> <span>' . $settings['modal_button_txt'] . '</span>  <i class="feather-arrow-right-circle"></i></a>';
                                                            if (!empty($modal_button_url)) {
                                                                echo wp_kses_post($vpbtn);
                                                            }
                                                            ?>

                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="button-group d-flex flex-wrap mt--20">
                                                            <?php if ($settings['projects_meta_display']) { ?>
                                                                <?php
                                                                global $post;
                                                                $nonce = wp_create_nonce('rainbow_pt_like_it_nonce');
                                                                $link = admin_url('admin-ajax.php?action=rainbow_pt_like_it&post_id=' . $post->ID . '&nonce=' . $nonce);
                                                                $likes = get_post_meta(get_the_ID(), '_pt_likes', true);
                                                                $likes = (empty($likes)) ? 0 : $likes;
                                                                $likes_text = ($likes <= 1) ? $settings['like_this_txt'] : $settings['like_this_txt'];
                                                                ?>

                                                                <div class="post-like pt-like-it">
                                                                    <a class="like-button rn-btn thumbs-icon rn-btn thumbs-icon"
                                                                       href="<?php echo esc_url($link); ?>"
                                                                       data-id="<?php echo esc_attr(get_the_ID()); ?>"
                                                                       data-nonce="<?php echo esc_attr($nonce); ?>">
                                                                        <span> <?php echo esc_html($likes_text); ?> </span>
                                                                        <i class="feather-thumbs-up mr--10"></i>
                                                                        <mark id="like-count2-<?php echo get_the_ID() ?>"
                                                                              class="like-count badge">
                                                                            <?php echo esc_html($likes); ?>
                                                                        </mark>
                                                                    </a>
                                                                </div>

                                                            <?php } ?>

                                                            <?php
                                                            $vpbtn = '<a  href="' . $modal_button_url . '"  class="rn-btn " target="_blank"> <span>' . $settings['modal_button_txt'] . '</span>  <i class="feather-arrow-right-circle"></i></a>';
                                                            if (!empty($modal_button_url)) {
                                                                echo wp_kses_post($vpbtn);
                                                            }
                                                            ?>

                                                        </div>
                                                   <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End of .text-content -->
                                    </div>

                                </div>
                                <!-- End of .row media-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="rb-separator pb--30 pt--30">
                                            <div class="divider-separator w-100"></div>
                                        </div>
                                        <?php
                                        $modal_template_id = $id;
                                        if ( '' != $modal_template_id) {
                                            if ( class_exists( 'Elementor\Plugin' ) ) {
                                                if ( '' != $modal_template_id ) {
                                                    $elementor = \Elementor\Plugin::instance();
                                                    $modal_content = $elementor->frontend->get_builder_content( $modal_template_id, true );
                                                }
                                            }
                                        }
                                        if ( '' != $modal_content || !empty( $modal_content )){
                                            if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {
                                                if (! \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
                                                    echo rainbow_awescapeing( $modal_content );
                                                }
                                            }
                                        } else {
                                            the_content();
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- End of .row body-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Portfolio area -->

            </div>
            <?php $i++;
            } ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <?php } ?>
        <?php if ($settings['seemore_display'] == 'yes') { ?>
            <div class="mt--40 text-center loadmore loadmore-layout1 margin-t-20"
                 data-count="<?php echo $number_of_post; ?>">
                <a href="#" class="rn-btn item-btn rainbow-loadmore"><?php echo esc_attr($settings['seemore_txt']); ?>
                    <i class="feather-loader"></i></a>
            </div>
        <?php } ?>
    </div>