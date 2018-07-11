<?php
ini_set('max_execution_time', 300);

//Activate compression
if(extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler"))
add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));

require_once get_template_directory() . '/vendor/autoload.php';

if (!function_exists('euw_setup')) :
    function euw_setup()
    {

        load_theme_textdomain('euw', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');
        add_image_size( 'large', 960, 480, true );
        add_image_size( 'med', 560, 560, true );
        add_image_size( 'med-half', 520, 260, true );
        add_image_size( 'blog', 1200, 300, true );

        // Favicons
        add_image_size( 'icon-16x16', 16, 16, true );
        add_image_size( 'icon-32x32', 32, 32, true );
        add_image_size( 'icon-57x57', 57, 57, true );
        add_image_size( 'icon-60x60', 60, 60, true );
        add_image_size( 'icon-72x72', 72, 72, true );
        add_image_size( 'icon-76x76', 76, 76, true );
        add_image_size( 'icon-96x96', 96, 96, true );
        add_image_size( 'icon-114x114', 114, 114, true );
        add_image_size( 'icon-120x120', 120, 120, true );
        add_image_size( 'icon-144x144', 144, 144, true );
        add_image_size( 'icon-152x152', 152, 152, true );
        add_image_size( 'icon-180x180', 180, 180, true );
        add_image_size( 'icon-192x192', 192, 192, true );

        //allow JSON file upload
        function custom_myme_types($mime_types){
          $mime_types['json'] = 'application/json';
          return $mime_types;
        }
        add_filter('upload_mimes', 'custom_myme_types', 1, 1);

        register_nav_menus(array(
            'primary'   => __('Hauptmenü', 'euw'),
            'secondary' => __('Footermenü', 'euw'),
            'custom'  => __('Nutzermenü', 'euw'),
        ));

        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' 
        ));

        if (!is_admin()) {
            wp_deregister_script('jquery');
            wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"), true, '2.1.1');
            wp_enqueue_script('jquery');
        }

        if (!is_admin()) {
            wp_register_script('modernizr', ("//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"), true, '2.8.3');
            wp_enqueue_script('modernizr');
        }

        /*if (!is_admin()) {
            wp_register_script('fontawesome', ("//use.fontawesome.com/releases/v5.0.9/js/all.js"), true, '5.0.9');
            wp_enqueue_script('fontawesome');
        }*/


        function add_defer_attribute($tag, $handle) {
        // add script handles to the array below
           $scripts_to_defer = array('modernizr', 'fontawesome');
           
           foreach($scripts_to_defer as $defer_script) {
              if ($defer_script === $handle) {
                 return str_replace(' src', ' defer="defer" src', $tag);
              }
           }
           return $tag;
        }

        add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

        function add_async_attribute($tag, $handle) {
           // add script handles to the array below
           $scripts_to_async = array('modernizr', 'fontawesome');
           
           foreach($scripts_to_async as $async_script) {
              if ($async_script === $handle) {
                 return str_replace(' src', ' async="async" src', $tag);
              }
           }
           return $tag;
        }

        add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

        if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php")
        wp_redirect('admin.php?page=theme-general-settings');


        if( function_exists('acf_add_options_page') ) {
    
            acf_add_options_page(array(
                'page_title'    => 'Brainbox: Grundlagen',
                'menu_title'    => 'BrainBox',
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ));

            acf_add_options_sub_page(array(
                'page_title'    => 'Brainbox: Theme Design',
                'menu_title'    => 'Design',
                'parent_slug'   => 'theme-general-settings',
            ));
            
            acf_add_options_sub_page(array(
                'page_title'    => 'Brainbox: Theme Header',
                'menu_title'    => 'Header',
                'parent_slug'   => 'theme-general-settings',
            ));
            
            acf_add_options_sub_page(array(
                'page_title'    => 'Brainbox: Theme Footer',
                'menu_title'    => 'Footer',
                'parent_slug'   => 'theme-general-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title'    => 'Brainbox: Web-App',
                'menu_title'    => 'Web-App',
                'parent_slug'   => 'theme-general-settings',
            ));
    
        }

    }
endif; // euw_setup
add_action('after_setup_theme', 'euw_setup');

function bidirectional_acf_update_value( $value, $post_id, $field  ) {
  
  // vars
  $field_name = $field['name'];
  $field_key = $field['key'];
  $global_name = 'is_updating_' . $field_name;
  
  
  // bail early if this filter was triggered from the update_field() function called within the loop below
  // - this prevents an inifinte loop
  if( !empty($GLOBALS[ $global_name ]) ) return $value;
  
  
  // set global variable to avoid inifite loop
  // - could also remove_filter() then add_filter() again, but this is simpler
  $GLOBALS[ $global_name ] = 1;
  
  
  // loop over selected posts and add this $post_id
  if( is_array($value) ) {
  
    foreach( $value as $post_id2 ) {
      
      // load existing related posts
      $value2 = get_field($field_name, $post_id2, false);
      
      
      // allow for selected posts to not contain a value
      if( empty($value2) ) {
        
        $value2 = array();
        
      }
      
      
      // bail early if the current $post_id is already found in selected post's $value2
      if( in_array($post_id, $value2) ) continue;
      
      
      // append the current $post_id to the selected post's 'related_posts' value
      $value2[] = $post_id;
      
      
      // update the selected post's value (use field's key for performance)
      update_field($field_key, $value2, $post_id2);
      
    }
  
  }
  
  
  // find posts which have been removed
  $old_value = get_field($field_name, $post_id, false);
  
  if( is_array($old_value) ) {
    
    foreach( $old_value as $post_id2 ) {
      
      // bail early if this value has not been removed
      if( is_array($value) && in_array($post_id2, $value) ) continue;
      
      
      // load existing related posts
      $value2 = get_field($field_name, $post_id2, false);
      
      
      // bail early if no value
      if( empty($value2) ) continue;
      
      
      // find the position of $post_id within $value2 so we can remove it
      $pos = array_search($post_id, $value2);
      
      
      // remove
      unset( $value2[ $pos] );
      
      
      // update the un-selected post's value (use field's key for performance)
      update_field($field_key, $value2, $post_id2);
      
    }
    
  }
  
  
  // reset global varibale to allow this filter to function as per normal
  $GLOBALS[ $global_name ] = 0;
  
  
  // return
    return $value;
    
}

add_filter('acf/update_value/name=product__upselling', 'bidirectional_acf_update_value', 10, 3);

function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
  global $post;         // load details about this page
  if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
               return true;   // we're at the page or at a sub page
  else 
               return false;  // we're elsewhere
};

function my_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');

function euw_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'euw'),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}

add_action('widgets_init', 'euw_widgets_init');

function has_children() {
  global $post;
  
  $pages = get_pages('child_of=' . $post->ID);
  
  if (count($pages) > 0):
    return true;
  else:
    return false;
  endif;
}

function is_top_level() {
  global $post, $wpdb;
  
  $current_page = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = " . $post->ID);
  
  return $current_page;
}

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

function shortcode_message( $atts ) {
    $a = shortcode_atts( array (
        'head' => 'Überschrift',
        'txt' => 'Beschreibung',
    ), $atts );

   return '<div class="shortcode-message"><h4>' . $a[html_entity_decode('head')] . '</h4>' . '<p>' . $a[html_entity_decode('txt')] . '</p></div>';
}

  function shortcode_message_cta( $atts ) {
      $a = shortcode_atts( array (
          'head' => 'Überschrift',
          'txt' => 'Beschreibung',
          'link' => 'Link',
          'btn' => 'Mehr erfahren',
          'dir' => 'left',
      ), $atts );

     return '<div class="shortcode-message" style="text-align:'. $a["dir"] .';"><h4>' . $a[html_entity_decode('head')] . '</h4>' . '<p>' . $a[html_entity_decode('txt')] . '</p><a class="btn btn--negative" href="' . $a["link"] . '">' . $a[html_entity_decode('btn')] . '</a></div>';
  }

  function dynamic_text_replacement ($parameter, $fallback) { 
      
      $get = $_GET[$parameter];
      if (!isset ($get) ) { $get = $fallback; }
      
      return $get;
  }

  function dynamic_text_replacement_shortcode ($atts) { 
    
    extract(shortcode_atts( array('parameter' => '', 'fallback' => ''), $atts));
    
    $get = $_GET[$parameter];
    if (!isset ($get) ) { $get = $fallback; }
    
    return $get;
  }

  // allows use of shortcodes in titles
  add_filter( 'the_title', 'do_shortcode' );

  // allows use of shortcodes in ACF Textarea and text fields.
  if( class_exists('acf') ) {
    add_filter('acf/format_value/type=textarea', 'do_shortcode', 10, 3);
    add_filter('acf/format_value/type=text', 'do_shortcode', 10, 3);
  }

  function register_shortcodes(){
    add_shortcode('hinweis', 'shortcode_message');
    add_shortcode('cta', 'shortcode_message_cta');
    add_shortcode('replace', 'dynamic_text_replacement_shortcode');
  }

  add_action( 'init', 'register_shortcodes');

function dd($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}


// admin functions
// require get_template_directory() . '/inc/block-users.php';
require get_template_directory() . '/inc/version-removal.php';
require get_template_directory() . '/inc/clean-head.php';
require get_template_directory() . '/inc/template-tags.php';

// navigation helpers
require get_template_directory() . '/inc/submenu-classes.php';
require get_template_directory() . '/inc/breadcrumbs.php';

// custom taxonomy classes
require get_template_directory() . '/inc/custom_taxonomy_in_body_class.php';
require get_template_directory() . '/inc/custom_taxonomy_in_post_class.php';

// image formats
require get_template_directory() . '/inc/mime-types.php';
require get_template_directory() . '/inc/responsive-images.php';

//helper functions for common tasks
require get_template_directory() . '/inc/function-mobile-detect.php';
require get_template_directory() . '/inc/function_location_map.php';
require get_template_directory() . '/inc/function-get-post-views.php';
require get_template_directory() . '/inc/function-first-cat-name.php';
require get_template_directory() . '/inc/function-post-thumbnail-caption.php';
require get_template_directory() . '/inc/function-post-thumbnail-url.php';
require get_template_directory() . '/inc/function-taglist-plaintext.php';
require get_template_directory() . '/inc/function-author_helpers.php';
require get_template_directory() . '/inc/function-custom-taxonomy-post-class.php';

require get_template_directory() . '/inc/update-checker/plugin-update-checker.php';

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://jwdsign.de/downloads/themes/brainbox/details.json',
  __FILE__, //Full path to the main plugin file or functions.php.
  'brainbox'
);

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );