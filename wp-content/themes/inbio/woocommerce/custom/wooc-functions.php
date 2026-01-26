<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package inbio
 */

if (!function_exists('rainbow_shop_support')) {
    /**
     * Theme supports for WooCommerce
     */
    function rainbow_shop_support() {
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-lightbox' );
    }
}

if (!function_exists('rainbow_shop_get_template_parts')) {
    /**
     * Custom functions used directly
     */
    function rainbow_shop_get_template_parts( $template ){
        get_template_part( 'woocommerce/custom/template-parts/content', $template );
    }
}

if (!function_exists('rainbow_shop_hide_page_title')) {
    /**
     * Hide page title
     *
     * @return false
     */
    function rainbow_shop_hide_page_title(){
        return false;
    }
}

if (!function_exists('rainbow_shop_loop_shop_per_page')) {
    /**
     * Product per page
     *
     * @return int|mixed
     */
    function rainbow_shop_loop_shop_per_page(){
        $rainbow_options 	= rainbow_helper::rainbow_get_options();
        if ($rainbow_options['wc_num_product']){
            return $rainbow_options['wc_num_product'];
        } else {
            return 8;
        }

    }
}

if (!function_exists('rainbow_shop_wrapper_start')) {
    /**
     * Shop wrapper start
     *
     * @return void
     */
    function rainbow_shop_wrapper_start() {
        rainbow_shop_get_template_parts( 'shop-header' );
    }
}

if (!function_exists('rainbow_shop_wrapper_end')) {
    /**
     * Shop wrapper end
     *
     * @return void
     */
    function rainbow_shop_wrapper_end() {
        rainbow_shop_get_template_parts( 'shop-footer' );
    }
}

if (!function_exists('rainbow_shop_shop_topbar')) {
    /**
     * Shop top bar
     *
     * @return void
     */
    function rainbow_shop_shop_topbar() {
        rainbow_shop_get_template_parts( 'shop-top' );
    }
}

if (!function_exists('rainbow_shop_loop_shop_columns')) {
    /**
     * Shop Column
     *
     * @return int|mixed
     */
    function rainbow_shop_loop_shop_columns(){
        $rainbow_options 	= rainbow_helper::rainbow_get_options();
        if (!empty($rainbow_options['wc_num_product_per_row'])){
            return $rainbow_options['wc_num_product_per_row'];
        } else {
            return 4;
        }

    }
}

if (!function_exists('rainbow_shop_loop_product_title')) {
    /**
     * Product title
     *
     * @return void
     */
    function rainbow_shop_loop_product_title(){
        echo '<h3><a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">' . get_the_title() . '</a></h3>';
    }
}

if (!function_exists('rainbow_shop_shop_thumb_area')) {
    /**
     * Thumbnail
     *
     * @return void
     */
    function rainbow_shop_shop_thumb_area(){
        rainbow_shop_get_template_parts( 'shop-thumb' );
    }
}

if (!function_exists('rainbow_shop_shop_info_wrap_start')) {
    /**
     * Information Wrapper start
     *
     * @return void
     */
    function rainbow_shop_shop_info_wrap_start(){
        echo '<div class="products-shop">';
    }
}

if (!function_exists('rainbow_shop_shop_add_description')) {
    /**
     * Descriptions
     *
     * @return void
     */
    function rainbow_shop_shop_add_description(){
        if ( is_shop() || is_product_category() || is_product_tag() ) {
            global $post;
            echo '<div class="shop-excerpt grid-hide"><div class="short-description">';
            the_excerpt();
            echo '</div></div>';
        }
    }
}

if (!function_exists('rainbow_shop_shop_info_wrap_end')) {
    /**
     * Information Wrapper end
     * @return void
     */
    function rainbow_shop_shop_info_wrap_end(){
        echo '</div>';
    }
}

if (!function_exists('rainbow_shop_render_sku')) {
    /**
     * Render SKU
     *
     * @return void
     */
    function rainbow_shop_render_sku(){
        rainbow_shop_get_template_parts( 'product-sku' );
    }
}

if (!function_exists('rainbow_shop_render_meta')) {
    /**
     * Render product meta
     *
     * @return void
     */
    function rainbow_shop_render_meta(){
        rainbow_shop_get_template_parts( 'product-meta' );
    }
}

if (!function_exists('rainbow_shop_show_or_hide_related_products')) {
    /**
     * Show or Hide related products
     *
     * @return void
     */
    function rainbow_shop_show_or_hide_related_products(){
        $rainbow_options 	= rainbow_helper::rainbow_get_options();
        // Show or hide related products
        if ( empty( $rainbow_options['wc_related'] ) ) {
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
        }
    }
}

if (!function_exists('rainbow_shop_hide_product_data_tab')) {
    /**
     * Show or Hide product data tab
     *
     * @param $tabs
     * @return mixed
     */
    function rainbow_shop_hide_product_data_tab( $tabs ){

        $rainbow_options 	= rainbow_helper::rainbow_get_options();


        if ( empty( $rainbow_options['wc_description'] ) ) {
            unset( $tabs['description'] );
        }
        if ( empty( $rainbow_options['wc_reviews'] ) ) {
            unset( $tabs['reviews'] );
        }
        if ( empty( $rainbow_options['wc_additional_info'] ) ) {
            unset( $tabs['additional_information'] );
        }
        return $tabs;
    }
}

if (!function_exists('rainbow_shop_product_review_form')) {
    /**
     * Review Form
     *
     * @param $comment_form
     * @return mixed
     */
    function rainbow_shop_product_review_form( $comment_form ){
        $commenter = wp_get_current_commenter();

        $comment_form['fields'] = array(
            'author' => '<div class="row"><div class="col-sm-6"><div class="comment-form-author form-group"><input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Name *', 'inbio' ) . '" required /></div></div>',
            'email'  => '<div class="comment-form-email col-sm-6"><div class="form-group"><input id="email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email *', 'inbio' ) . '" required /></div></div></div>',
        );

        $comment_form['comment_field'] = '';

        if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
            $comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'inbio' ) .'</label>
            <select name="rating" id="rating" required>
                <option value="">' . esc_html__( 'Rate&hellip;', 'inbio' ) . '</option>
                <option value="5">' . esc_html__( 'Perfect', 'inbio' ) . '</option>
                <option value="4">' . esc_html__( 'Good', 'inbio' ) . '</option>
                <option value="3">' . esc_html__( 'Average', 'inbio' ) . '</option>
                <option value="2">' . esc_html__( 'Not that bad', 'inbio' ) . '</option>
                <option value="1">' . esc_html__( 'Very Poor', 'inbio' ) . '</option>
                </select></p>';
        }

        $comment_form['comment_field'] .= '<div class="col-sm-12 p-0"><div class="form-group comment-form-comment"><textarea id="comment" name="comment" class="form-control" placeholder="' . esc_attr__( 'Your Review *', 'inbio' ) . '" cols="45" rows="8" required></textarea></div></div>';

        return $comment_form;
    }
}


if (!function_exists('rainbow_shop_show_or_hide_cross_sells')) {
    /**
     * Show or Hide Cross Sells
     *
     * @return void
     */
    function rainbow_shop_show_or_hide_cross_sells(){
        // Show or hide related cross sells
        $rainbow_options 	= rainbow_helper::rainbow_get_options();
        if ( !empty($rainbow_options['wc_cross_sell'] ) ) {
            add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
        }
    }
}

if (!function_exists('rainbow_change_breadcrumb_delimiter')) {
    /**
     * Change the breadcrumb separator
     *
     * @param $defaults
     * @return mixed
     */
    function rainbow_change_breadcrumb_delimiter( $defaults ) {
        $separator          = '';
        $defaults['delimiter'] = '<li class="separator"> ' . esc_html($separator) . ' </li>';
        $defaults['wrap_before'] = '<ul class="page-list shop-breadcrumb">';
        $defaults['wrap_after'] = '</ul>';
        $defaults['before'] = '<li>';
        $defaults['after'] = '</li>';
        $defaults['home'] = esc_html__('Home', 'inbio');
        return $defaults;
    }
}

add_filter( 'woocommerce_output_related_products_args', 'inbio_change_number_related_products', 9999 );
if (!function_exists('inbio_change_number_related_products')) {
    /**
     * Related products
     *
     * @param $args
     * @return mixed
     */
    function inbio_change_number_related_products( $args ) {
        $args['posts_per_page'] = 3; // # of related products
        $args['columns'] = 3; // # of columns per row
        return $args;
    }
}

add_filter( 'woocommerce_add_to_cart_fragments', 'inbio_woocommerce_header_add_to_cart_fragment' );
if (!function_exists('inbio_woocommerce_header_add_to_cart_fragment')) {
    /**
     * Fragments cart contents count
     *
     * @param $fragments
     * @return mixed
     */
    function inbio_woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;
        ob_start();
        ?>
        <span class="rbt-cart-count"><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span>
        <?php
        $fragments['span.rbt-cart-count'] = ob_get_clean();
        return $fragments;
    }
}






