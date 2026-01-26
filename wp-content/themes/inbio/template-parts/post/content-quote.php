<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */

$rainbow_options = Rainbow_Helper::rainbow_get_options();

$rainbow_quote_author_name = rainbow_get_acf_data('rainbow_quote_author_name');
$rainbow_quote_author = !empty($rainbow_quote_author_name) ? $rainbow_quote_author_name : get_the_author();
$rainbow_quote_author_name_designation = rainbow_get_acf_data('rainbow_quote_author_name_designation');
?>

<div  id="post-<?php the_ID(); ?>" <?php post_class('content-blog  mb--40'); ?>>

    <div class="rn-blog">
        <div class="inner">
            <blockquote>
                <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </blockquote>
        </div>
    </div>

</div>