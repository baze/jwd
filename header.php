<!DOCTYPE html>
<?php 
  if ( !get_field('volle_breite', 'option') ) {
    $boxed = 'boxed';
    $body__maxwidth = get_field('body__maxwidth', 'option');
  }

  $html__background = get_field('html__background', 'option');
  $body__background = get_field('body__background', 'option');

?>
<html class="no-js <?php echo $boxed; ?> " style="background-color: <?php echo $html__background; ?>;" <?php language_attributes(); ?>>

<head>
  <?php get_template_part('_modules/_tag-manager-head');  ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  
  <?php get_template_part('_modules/_pwa'); ?>
  
  <?php
    echo '<style type="text/css">'; 
      get_template_part('dest/critical');
    echo '</style>'; 
  ?>
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?> style="background-color: <?php echo $body__background; ?>; max-width: <?php echo $body__maxwidth; ?>px;" itemscope itemtype="http://schema.org/WebPage">
  <?php

    get_template_part('_modules/_tag-manager-body'); 
    
    if ( !is_page_template('_templates/vorschaltseite.php') ) {
      include(locate_template('_modules/_shop-bar.php'));
      include(locate_template('_modules/_header_flexible.php'));
      get_template_part('_modules/_sub-navi'); 
    }    
    
    

    if ( !is_singular( 'post' ) && !is_singular( 'download' ) && !is_singular( 'product' ) && !is_singular( 'produkte' ) && !is_singular( 'veranstaltung' ) && !is_archive() && !is_search() && !is_category() && !is_page_template('_templates/vorschaltseite.php') ) {

      if ( get_field('show__slider') ) {
        get_template_part('_modules/_slider');
      } else {
        get_template_part('_modules/_hero');
      }

      if (is_front_page()) {
        echo '<div class="container trust-container--front">';
          get_template_part( '_modules/_trust' );
        echo '</div>';
      }

    }
  ?>
  
  
  <?php
    $main_classes = get_field('main-options');
  ?>

  <?php if ( $shop_description ) { ?>
      <div class="wrapper <?php echo $main_classes; ?>">  
  <?php } else { ?>
      <div class="wrapper no-description <?php echo $main_classes; ?>">
  <?php } ?>

    <main class="main <?php echo $main_classes; ?>" role="main" id="main">