<?php 
if ( woocommerce_active() ) {
      $shop_description = true;

      echo '<style>.shop-bar{ max-width: ' . $body__maxwidth . 'px; }</style>';

      echo '<nav class="shop-bar empty"></nav>';

      if ( is_shop() ) {
        $shopID = get_option( 'woocommerce_shop_page_id' );
        $shop_description = get_field('show_shop_description', $shopID);
      } else{
        $shop_description = get_field('show_shop_description');
      }

    }
?>