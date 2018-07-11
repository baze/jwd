<?php

add_action('init', 'cptui_register_my_taxes_themen');
function cptui_register_my_taxes_themen() {
register_taxonomy( 'themen',array (
  0 => 'post',
  1 => 'page',
  2 => 'produkt',
),
array( 'hierarchical' => true,
  'label' => 'Themen',
  'show_ui' => true,
  'query_var' => true,
  'show_admin_column' => false,
  'labels' => array (
  'search_items' => 'Thema',
  'popular_items' => 'Beliebte Themen',
  'all_items' => 'Alle Themen',
  'parent_item' => 'Übergeordnetes Thema',
  'parent_item_colon' => 'Übergeordnetes Thema: ',
  'edit_item' => 'Thema bearbeiten',
  'update_item' => 'Thema aktualisieren',
  'add_new_item' => 'Neues Thema hinzufügen',
  'new_item_name' => 'Neuer Themen-Name',
  'separate_items_with_commas' => '',
  'add_or_remove_items' => 'Themen hinzufügen oder löschen',
  'choose_from_most_used' => 'Aus den am häufigsten verwendeten Themen auswählen',
)
) ); 
}