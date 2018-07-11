<?php

// breadcrumb
function nav_breadcrumb() {
 
 //globals
  $delimiter = '&raquo;';
  $home = 'Start'; 
  $before = '<span class="current" itemprop="title">'; 
  $after = '</span>'; 
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
 	//home link
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '" itemprop="url"><span itemprop="title">' . $home . '</span></a> ' . $delimiter . ' ';
 	
 	//for categories
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . single_cat_title('', false) . $after;
 	//daily archive
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '" itemprop="url"><span itemprop="title">' . get_the_time('Y') . '</span></a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '" itemprop="url"><span itemprop="title">' . get_the_time('F') . '</span></a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 	//monthly archive
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '" itemprop="url"><span itemprop="title">' . get_the_time('Y') . '</span></a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 	// yearly archive
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 	//single post
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/" itemprop="url"><span itemprop="title">' . $post_type->labels->singular_name . '</span></a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 	
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '" itemprop="url"><span itemprop="title">' . $parent->post_title . '</span></a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '" itemprop="url"><span itemprop="title">' . get_the_title($page->ID) . '</span></a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Beiträge veröffentlicht von ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Fehler 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo ': ' . __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} 