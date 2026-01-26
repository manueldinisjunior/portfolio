<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package rainbow-elements
 */

namespace rainbow\Rainbow_Elements;

$thumb_size = $settings['image_size_size'];
$query_args = rainbow_Elements_Helper::rainbow_get_query_args('rainbow_projects', 'rainbow_projects_category', $settings);
$number_of_post = $settings['posts_per_page'];
$query = new \WP_Query($query_args);
$col_class = "col-lg-{$settings['col_lg']} col-md-{$settings['col_md']} col-sm-{$settings['col_sm']}";
$gridspaces = $settings['grid-spaces'];
$i = 1;
$data = $settings;


 while ( $query->have_posts() ) : $query->the_post();

     $top_active = '';
     if ($i == 1) {
         $top_active = 'active ';
     }
     $id = get_the_id();
     $modal_button_url = get_post_meta($id, 'popup_project_button_url', true);
     $like_this_txt = $settings['like_this_txt'];
     $modal_button_txt = $settings['modal_button_txt'];
     $vpbtn = '<a  href="' . $modal_button_url . '"  class="rn-btn"> <span>' . $settings['modal_button_txt'] . '</span>  <i class="feather-arrow-right-circle"></i></a>';

     ?>

 <div class="<?php echo esc_attr($col_class); ?> rb-items mt--50 mt_md--30 mt_sm--30">
     <?php if ($settings['modal_popup_display']) { ?>
     <div class="rn-portfolio portfolio-card-only-popup">
     <?php }else{ ?>
     <div class="rn-portfolio">
 <?php } ?>

     <div class="inner">
         <?php if (has_post_thumbnail()) { ?>
             <div class="thumbnail">
                 <?php if ($settings['modal_popup_display']) { ?>
                     <a href="<?php the_permalink(); ?>" data-toggle="modal"
                        data-target="#exampleModalCenter-<?php echo esc_attr($i); ?>"><?php the_post_thumbnail($thumb_size); ?></a>
                 <?php } else { ?>
                     <a href="<?php the_permalink(); ?>">
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
                 <?php if ($settings['modal_popup_display']) { ?>
                     <a href="<?php the_permalink(); ?>" data-toggle="modal"
                        data-target="#exampleModalCenter-<?php echo esc_attr($i); ?>"><?php the_title(); ?>
                         <i class="feather-arrow-up-right"></i></a>
                 <?php } else { ?>
                     <a href="<?php the_permalink(); ?>"><?php the_title(); ?> <i
                                 class="feather-arrow-up-right"></i></a>
                 <?php } ?>
             </h4>
         </div>
     </div>
     </div>
     <!-- Modal Portfolio Body area Start -->
     <div class="modal fade" id="exampleModalCenter-<?php echo esc_attr($i); ?>" tabindex="-1" role="dialog"
          aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true"> <i class="feather-x"></i></span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row align-items-center">
                         <div class="col-lg-6">
                             <div class="portfolio-popup-thumbnail">
                                 <?php if (has_post_thumbnail()) { ?>
                                     <div class="image">
                                         <?php the_post_thumbnail('rainbow-thumbnail-lg'); ?>
                                     </div>
                                 <?php } ?>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="text-content">
                                 <h3>
                                     <?php the_title(); ?>
                                 </h3>

                                 <?php the_excerpt(); ?>

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
                                     if (!empty($modal_button_url)) {
                                         echo wp_kses_post($vpbtn);
                                     }
                                     ?>

                                 </div>
                             </div>
                             <!-- End of .text-content -->
                         </div>
                     </div>
                     <!-- End of .row Body-->
                 </div>
             </div>
         </div>
     </div>
     <!-- End Modal Portfolio area -->
     </div>



 <?php endwhile;
