<?php 

add_action('init', 'cptui_register_my_taxes_standort_kategorien');
function cptui_register_my_taxes_standort_kategorien() {
register_taxonomy( 'standort-kategorien',array (
  0 => 'standorte',
),
array( 'hierarchical' => true,
	'label' => 'Standort-Kategorie',
	'show_ui' => true,
	'query_var' => true,
	'show_admin_column' => false,
	'labels' => array (
  'search_items' => 'Standort-Kategorie',
  'popular_items' => 'Beliebte Standort-Kategorien',
  'all_items' => 'Alle Standort-Kategorien',
  'parent_item' => 'Übergeordnete Standort-Kategorie',
  'parent_item_colon' => 'Übergeordnete Standort-Kategorie:',
  'edit_item' => 'Standort-Kategorien bearbeiten',
  'update_item' => 'Standort-Kategorie aktualisieren',
  'add_new_item' => 'Neue Standort-Kategorie hinzufügen',
  'new_item_name' => 'Neuer Standort-Kategorien-Name',
  'separate_items_with_commas' => '',
  'add_or_remove_items' => 'Standort-Kategorien hinzufügen oder löschen',
  'choose_from_most_used' => 'Aus den am häufigsten verwendeten Standort-Kategorien auswählen',
)
) ); 
}