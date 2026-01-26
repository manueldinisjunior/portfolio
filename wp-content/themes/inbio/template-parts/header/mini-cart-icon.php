<?php
/**
 * Created by PhpStorm.
 * User: Rainbow-Themes
 * Date: 08/09/2022
 * Time: 2:00 PM
 */


// Get Value
$rainbow_options = Rainbow_Helper::rainbow_get_options();

global $woocommerce;
$minicart_icon = isset($rainbow_options['rainbow_minicart_icon']) ? $rainbow_options['rainbow_minicart_icon'] : false;
?>
<?php if (class_exists('woocommerce') && $minicart_icon): ?>
    <div class="rbt-mini-cart-wrap">
        <a href="<?php echo wc_get_cart_url(); ?>"><span class="mini-cart"><i class="feather-shopping-cart"></i><span
                    class="rbt-cart-count"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span></span></a>
    </div>
<?php endif; ?>