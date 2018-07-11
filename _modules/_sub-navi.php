<?php

$parent = $post->post_parent;
$subnavi = get_field('show_sub_pages', $parent);

if ( $subnavi ) {

  if ( is_top_level() ) {
  echo '<nav class="sub-pages">';
  echo '<ul class="sub-navi">';
    $base_args = array(
      'hierarchical' => 0
    );
    if (has_children()):
      $args = array(
        'child_of' => $post->ID,
        'parent' => $post->ID,
      );
    else:
      if (is_top_level()):
        $args = array(
          'parent' => $post->post_parent
        );
      else:
        $args = array(
          'parent' => 0
        );
      endif;
    endif;
    
  	$args = array_merge($base_args, $args);
    
  	$pages = get_pages($args);
    
    	global $post;
  	$current_page = $post->ID;


  	foreach ($pages as $page):
  		if ( $page->ID == $current_page ) {
  			echo '<li class="sub-navi__item current__item" ><a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a></li>';
  		} else{
  			echo '<li class="sub-navi__item" ><a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a></li>';	
  		}
      	
    	endforeach;

  echo '</ul>';
  echo '</nav>';
  }

}

?>