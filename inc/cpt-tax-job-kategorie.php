<?php

add_action('init', 'cptui_register_my_taxes_job_kategorien');
function cptui_register_my_taxes_job_kategorien() {
register_taxonomy( 'job-kategorien',array (
  0 => 'jobs',
),
array( 'hierarchical' => true,
	'label' => 'Job-Kategorien',
	'show_ui' => true,
	'query_var' => true,
	'show_admin_column' => false,
	'labels' => array (
  'search_items' => 'Job-Kategorie',
  'popular_items' => 'Beliebte Job-Kategorien',
  'all_items' => 'Alle Job-Kategorien',
  'parent_item' => 'Übergeordnete Job-Kategorie',
  'parent_item_colon' => 'Übergeordnete Job-Kategorie:',
  'edit_item' => 'Job-Kategorien bearbeiten',
  'update_item' => 'Job-Kategorie aktualisieren',
  'add_new_item' => 'Neue Job-Kategorie hinzufügen',
  'new_item_name' => 'Neuer Job-Kategorien-Name',
  'separate_items_with_commas' => '',
  'add_or_remove_items' => 'Job-Kategorien hinzufügen oder löschen',
  'choose_from_most_used' => 'Aus den am häufigsten verwendeten Job-Kategorien auswählen',
)
) ); 
}