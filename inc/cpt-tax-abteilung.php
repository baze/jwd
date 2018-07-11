<?php 

add_action('init', 'cptui_register_my_taxes_abteilung');
function cptui_register_my_taxes_abteilung() {
register_taxonomy( 'abteilung',array (
  0 => 'mitarbeiter',
  1 => 'jobs',
),
array( 'hierarchical' => true,
	'label' => 'Abteilung',
	'show_ui' => true,
	'query_var' => true,
	'show_admin_column' => false,
	'labels' => array (
  'search_items' => 'Abteilung',
  'popular_items' => '',
  'all_items' => '',
  'parent_item' => '',
  'parent_item_colon' => '',
  'edit_item' => '',
  'update_item' => '',
  'add_new_item' => '',
  'new_item_name' => '',
  'separate_items_with_commas' => '',
  'add_or_remove_items' => '',
  'choose_from_most_used' => '',
)
) ); 
}