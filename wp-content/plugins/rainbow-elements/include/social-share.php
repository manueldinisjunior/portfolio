<?php
/*
***************************************************************
*  Social sharing icons
***************************************************************
*/

if ( ! function_exists('rainbow_sharing_icon_links') ) {
 function rainbow_sharing_icon_links( ) {

  global $post;
   

  $html = '<ul class="social-share-transparent d-flex justify-content-start liststyle">';

   // facebook
   $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='. get_the_permalink();
   $html .= '<li><a href="'. esc_url( $facebook_url ) .'" target="_blank" class="rainbow-facebook"><i class="feather-facebook"></i></a></li>';

   // twitter
   $twitter_url = 'https://twitter.com/share?'. esc_url(get_permalink()) .'&amp;text='. get_the_title();
   $html .= '<li><a href="'. esc_url( $twitter_url ) .'" target="_blank" class="rainbow-twitter"><i class="feather-twitter"></i></a></li>';

   // linkedin
   $linkedin_url = 'http://www.linkedin.com/shareArticle?url='. esc_url(get_permalink()) .'&amp;title='. get_the_title();
   $html .= '<li><a href="'. esc_url( $linkedin_url ) .'" target="_blank" class="rainbow-linkdin"><i class="feather-linkedin"></i></a></li>';

   $html .= '<li><button class="tvcopyLink" title="'. esc_html('Copy Link', 'rainbow-elements') .'" data-link="'. esc_url(get_permalink()) .'"><i class="feather-external-link"></i></button></li>';

  $html .= '</ul>';

  echo wp_kses_post($html);

 }
}


if ( ! function_exists('rainbow_sharing_icon_links_bottom') ) {
    function rainbow_sharing_icon_links_bottom( ) {

        global $post; 

       $html = '<div class="d-flex flex-wrap align-content-start h-100">
        <div class="position-sticky sticky-top">
        <div class="post-details__social-share">
        <span class="share-on-text">'. esc_html('Share on:', 'rainbow-elements') .'</span>
        <div class="social-share">';


        // facebook
        $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='. get_the_permalink();
        $html .= '<a href="'. esc_url( $facebook_url ) .'" target="_blank" class="rainbow-facebook"><i class="feather-facebook"></i></a>';

        // twitter
        $twitter_url = 'https://twitter.com/share?'. esc_url(get_permalink()) .'&amp;text='. get_the_title();
        $html .= '<a href="'. esc_url( $twitter_url ) .'" target="_blank" class="rainbow-twitter"><i class="feather-twitter"></i></a>';

        // linkedin
        $linkedin_url = 'http://www.linkedin.com/shareArticle?url='. esc_url(get_permalink()) .'&amp;title='. get_the_title();
        $html .= '<a href="'. esc_url( $linkedin_url ) .'" target="_blank" class="rainbow-linkdin"><i class="feather-linkedin"></i></a>';


      
        $html .= '</div>';       
        $html .= '</div></div></div>';       


        echo wp_kses_post($html);

    }
}