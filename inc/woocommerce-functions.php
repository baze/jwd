<?php 

function woocommerce_active(){
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
      return true;
  } else {
      return false;
  }
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

if ( woocommerce_active() ) {
  
  add_filter( 'woocommerce_new_customer_data', function( $data ) {
    $data['user_login'] = $data['user_email'];
    return $data;
  } );

  add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {

    global $woocommerce;

    $cart_count = $woocommerce->cart->cart_contents_count;
    $cart_total = $woocommerce->cart->get_cart_total();
    $cart_url = $woocommerce->cart->get_cart_url();
    $checkout_url = $woocommerce->cart->get_checkout_url();
    $account_page_id = get_option( 'woocommerce_myaccount_page_id' );
    $account_page_url = get_permalink( $account_page_id );

    $cart_element = '<li class="menu-item cart"><a href="' . $cart_url . ' "><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="cart-count"> <span class="cart-count-number">' . $cart_count . '</span > Artikel</span> – <span class="cart-total">' . $cart_total . '</span></li>';

    $checkout_element = '<li class="menu-item checkout"><a href="' . $checkout_url . '"><i class="fa fa-credit-card"></i> Kasse</a></li>';

    $account_element = '<li class="menu-item account"><a href="' . $account_page_url . '"><i class="fa fa-user" aria-hidden="true"></i>
Mein Konto</a></li>';
    
    if ( $cart_count >= 0 ) {
        $fragments['nav.shop-bar'] = '<nav class="shop-bar active"><ul class="shop-bar-menu menu">' . $cart_element . $checkout_element . $account_element . '</ul></nav>';
        return $fragments;
    } else {
      die();  
    }   
}

function woocommerce_after_shop_loop_item_title_short_description() {
    global $product;
    if ( ! $product->post->post_excerpt ) return;
    ?>
    <div itemprop="description">
        <?php echo apply_filters( 'woocommerce_short_description', $product->post->post_excerpt ) ?>
    </div>
    <?php
}
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_after_shop_loop_item_title_short_description', 5);

add_filter('woocommerce_short_description', 'limit_woocommerce_short_description', 10, 1);
    function limit_woocommerce_short_description($post_excerpt){
        if (!is_product()) {
            $pieces = explode(" ", $post_excerpt);
            $post_excerpt = implode(" ", array_splice($pieces, 0, 20));

        }
        return $post_excerpt;
    }


}