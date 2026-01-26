<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package inbio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$unique_id = esc_attr(rainbow_unique_id('search-'));
?>
<div class="inner">
    <form id="<?php echo esc_attr($unique_id); ?>" action="<?php echo esc_url(home_url('/')); ?>" method="GET"
          class="blog-search">
        <div class="inbio-search form-group">
            <button type="submit" class="search-button"><i class="rbt feather-search"></i></button>
            <input type="text" name="s" placeholder="<?php echo esc_attr_x('Search ...', 'placeholder', 'inbio'); ?>"
                   value="<?php echo esc_html(get_search_query(false)); ?>"/>
        </div>
    </form>
</div>