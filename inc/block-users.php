<?php

function really_block_users() {
      $isAjax = (defined('DOING_AJAX') && true === DOING_AJAX) ? true : false;

    if(!$isAjax) {
       
        if ( is_admin() && ! current_user_can( 'administrator' ) ) {
            wp_redirect( home_url() );
            exit;
        }
       
    }
}

add_action( 'init', 'really_block_users' ); 