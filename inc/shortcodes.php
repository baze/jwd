<?php 

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

  function global_cta ($slug){

    $cta = get_page_by_path( $slug, $output, 'cta' );
    
    if ( isset( $cta ) ) {
    
          $cta__id = $cta->ID;
          $global__cta__headline = get_field('global__cta__headline', $cta__id);
          $global__cta__txt = get_field('global__cta__txt', $cta__id);
          $global__cta__link = get_field('global__cta__link', $cta__id);
          $global__cta__btn = get_field('global__cta__btn', $cta__id);
          $global__cta__img = get_field('global__cta__img', $cta__id);

          if ( $global__cta__img ) { 
            $img = '<img src="' . $global__cta__img["url"] . '" alt="'. $global__cta__img["alt"] . '">'; 
          }

          $opening_tag = '<div class="shortcode-message" style="text-align:center;">';
          $headline = '<h4>' . $global__cta__headline . '</h4>';
          $text =  '<p>' . $global__cta__txt . '</p>';
          $btn = '<a class="btn btn--negative" target="_blank" href="' . $global__cta__link . '">' . $global__cta__btn . '</a>';
          $closing_tag = '</div>';

          $html = $opening_tag . $img . $headline . $text . $btn . $closing_tag;
          
          return $html;
    }


  }

  function global_cta_shortcode ($atts) {

    $global_cta = global_cta( $atts["slug"] );
    return $global_cta;

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
    add_shortcode('global_cta', 'global_cta_shortcode');
  }

  add_action( 'init', 'register_shortcodes');