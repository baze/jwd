<?php
ini_set('max_execution_time', 300);

//Activate compression
if(extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler"))
add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));

require_once get_template_directory() . '/vendor/autoload.php';

if (!function_exists('jwd_setup')) :
    function jwd_setup()
    {

        global $pagenow;
        if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
            wp_redirect(admin_url("admin.php?page=theme-general-settings"));
        } 


        load_theme_textdomain('jwd', get_template_directory() . '/languages');

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
            'primary'   => __('Hauptmenü', 'jwd'),
            'secondary' => __('Footermenü', 'jwd'),
            'custom'  => __('Nutzermenü', 'jwd'),
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


        function add_defer_attribute($tag, $handle) {
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
                'icon_url'      => 'dashicons-layout',
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
endif;
add_action('after_setup_theme', 'jwd_setup');

function bidirectional_acf_update_value( $value, $post_id, $field  ) {
  
  $field_name = $field['name'];
  $field_key = $field['key'];
  $global_name = 'is_updating_' . $field_name;

  if( !empty($GLOBALS[ $global_name ]) ) return $value;

  $GLOBALS[ $global_name ] = 1;

  if( is_array($value) ) {
  
    foreach( $value as $post_id2 ) {
      
      $value2 = get_field($field_name, $post_id2, false);
      
      
      if( empty($value2) ) {
        
        $value2 = array();
        
      }
      
      if( in_array($post_id, $value2) ) continue;

      $value2[] = $post_id;
      
      update_field($field_key, $value2, $post_id2);
      
    }
  
  }

  $old_value = get_field($field_name, $post_id, false);
  
  if( is_array($old_value) ) {
    
    foreach( $old_value as $post_id2 ) {
      
      if( is_array($value) && in_array($post_id2, $value) ) continue;
      
      $value2 = get_field($field_name, $post_id2, false);

      if( empty($value2) ) continue;

      $pos = array_search($post_id, $value2);

      unset( $value2[ $pos] );

      update_field($field_key, $value2, $post_id2);
      
    }
    
  }

  $GLOBALS[ $global_name ] = 0;

  return $value;
    
}

add_filter('acf/update_value/name=product__upselling', 'bidirectional_acf_update_value', 10, 3);

function is_tree($pid) {
  global $post;
  if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
    return true; 
  else 
    return false;
};

function my_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');

function jwd_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'jwd'),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}

add_action('widgets_init', 'jwd_widgets_init');

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

function dd($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}

//shortcodes
require get_template_directory() . '/inc/shortcodes.php';

//woocommerce functions
require get_template_directory() . '/inc/woocommerce-functions.php';

//plugins
//require get_template_directory() . '/inc/plugins.php';

//pages
//require get_template_directory() . '/inc/pages.php';

// custom post types
//require get_template_directory() . '/inc/cpt/cpt.php';
//require get_template_directory() . '/inc/cpt/tax.php';

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
  __FILE__,
  'brainbox'
);

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );