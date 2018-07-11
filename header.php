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
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
  <?php get_template_part('_modules/_tag-manager-head');  ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!-- <link rel="alternate" hreflang="<?php bloginfo('language'); ?>" href="<?php bloginfo( 'url' ) ?>" /> -->
  
  <?php get_template_part('_modules/_pwa'); ?>
  
  <?php
    echo "<style>"; 
      get_template_part('dest/critical');
    echo "</style>"; 
  ?>
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?> style="background-color: <?php echo $body__background; ?>; max-width: <?php echo $body__maxwidth; ?>px;" itemscope itemtype="http://schema.org/WebPage">
  <?php

    get_template_part('_modules/_tag-manager-body'); 
    include(locate_template('_modules/_shop-bar.php'));
    include(locate_template('_modules/_header.php'));
    get_template_part('_modules/_sub-navi'); 

    if ( !is_singular( 'post' ) && !is_singular( 'download' ) && !is_singular( 'product' ) && !is_singular( 'produkte' ) && !is_archive() && !is_category() ) {

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
      <div class="wrapper">  
  <?php } else { ?>
      <div class="wrapper no-description">
  <?php } ?>

    <main class="main <?php echo $main_classes; ?>" role="main" id="main">

      <form action="" class="form">
  
      <input type="button" placeholder="" value="Button">
      <input type="checkbox">
      <input type="color">
      <input type="date" placeholder="Datum">
      <input type="datetime" placeholder="Datum">
      <input type="datetime-local" placeholder="Datum">
      <input type="email" placeholder="E-Mail Adresse">
      <input type="file">
      <input type="hidden">
      <input type="image">
      <input type="month" placeholder="Monat">
      <input type="number" placeholder="Zahl">
      <input type="password" placeholder="Passwort">
      <input type="radio">
      <input type="range">
      <input type="reset" placeholder="Zurücksetzen">
      <input type="search" placeholder="Suchen ...">
      <input type="submit" value="Absenden">
      <input type="tel" placeholder="Telefonnummer">
      <input type="text" placeholder="Text">
      <input type="time" placeholder="Uhrzeit">
      <input type="url" placeholder="URL">
      <input type="weekt" placeholder="Woche">



      <select name="" id="" multiple>
        <option value="">Option</option>
        <option value="">Option</option>
        <option value="">Option</option>
        <option value="">Option</option>
        <option value="">Option</option>
        <option value="">Option</option>
      </select>


      <input type="button" placeholder="" value="Button" disabled>
      <input type="checkbox" disabled>
      <input type="color" disabled>
      <input type="date" placeholder="Datum" disabled>
      <input type="datetime" placeholder="Datum" disabled>
      <input type="datetime-local" placeholder="Datum" disabled>
      <input type="email" placeholder="E-Mail Adresse" disabled>
      <input type="file" disabled>
      <input type="hidden" disabled>
      <input type="image" disabled>
      <input type="month" placeholder="Monat" disabled>
      <input type="number" placeholder="Zahl" disabled>
      <input type="password" placeholder="Passwort" disabled>
      <input type="radio" disabled>
      <input type="range" disabled>
      <input type="reset" placeholder="Zurücksetzen" disabled>
      <input type="search" placeholder="Suchen ..." disabled>
      <input type="submit" value="Absenden" disabled>
      <input type="tel" placeholder="Telefonnummer" disabled>
      <input type="text" placeholder="Text" disabled>
      <input type="time" placeholder="Uhrzeit" disabled>
      <input type="url" placeholder="URL" disabled>
      <input type="weekt" placeholder="Woche" disabled>



      <select name="" id="" multiple disabled>
        <option value="">Option</option>
        <option value="">Option</option>
        <option value="">Option</option>
        <option value="">Option</option>
        <option value="">Option</option>
        <option value="">Option</option>
      </select>

</fieldset>

</form>