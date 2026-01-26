<?php
/**
 * Template part for displaying page banner style one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inbio
 */

// Get Value
$rainbow_options = Rainbow_Helper::rainbow_get_options();

$page_breadcrumb = Rainbow_Helper::rainbow_page_breadcrumb(); 
$page_breadcrumb_enable = $page_breadcrumb['breadcrumbs'];

$page_breadcrumb_single = Rainbow_Helper::rainbow_page_breadcrumb_single(); 
$page_breadcrumb_single_enable = $page_breadcrumb_single['breadcrumbs'];

$allowed_tags = wp_kses_allowed_html('post');
$banner_layout = Rainbow_Helper::rainbow_banner_layout();
$banner_area = $banner_layout['banner_area'];

  if (!is_single()) {


if ("no" !== $banner_area && "0" !== $banner_area || "no" !== $page_breadcrumb_enable && "0" !== $page_breadcrumb_enable) {
    ?>
    <div class="breadcrumb-area rn-section-gap breadcrumb-style-one">
        <div class="plr--45">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">

                        <?php
                        // Title
                        if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {

                            if (!is_single()) { ?>
                                <?php if ("no" !== $banner_area && "0" !== $banner_area) { ?>
                                    <h1 class="title"><?php echo woocommerce_page_title( false ); ?></h1>
                                <?php }
                             }
                        } else {
                            if (!is_single()) {
                                ?>
                                <?php if ("no" !== $banner_area && "0" !== $banner_area) { ?>
                                    <h1 class="title"><?php echo Rainbow_Helper::rainbow_get_page_title(); ?></h1>
                                <?php } ?>
                            <?php

                            }
                        }

                        // Breadcrumb
                        if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                             if ("no" !== $page_breadcrumb_enable && "0" !== $page_breadcrumb_enable) {
                                    woocommerce_breadcrumb();
                                }
                        } else {
                            if (!is_home()) {
                                if ("no" !== $page_breadcrumb_enable && "0" !== $page_breadcrumb_enable) {
                                    rainbow_breadcrumbs();
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } 

}else{

    if ( "no" !== $page_breadcrumb_single_enable  ) { ?>
    <div class="breadcrumb-area rn-section-gap breadcrumb-style-one">
            <div class="plr--45">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-inner">

                            <?php
                    

                            // Breadcrumb
                            if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                                 
                                        woocommerce_breadcrumb();
                                   
                            } else {
                                if (!is_home()) {
                                    
                                        rainbow_breadcrumbs();
                                  
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>