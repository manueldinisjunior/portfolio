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
?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('content-blog  mb--40'); ?>>
    <div class="rn-blog">
        <div class="inner">    
            <div class="sticky">
                <i class="rbt feather-link"></i>
            </div> 
            <div class="content">  
                <h4 class="title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?> <i class="feather-arrow-up-right"></i></a>
                </h4> 
            </div>
        </div>
    </div>
</div>