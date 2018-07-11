<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_workzone-global',
		'title' => 'Arbeitgeber-Seite',
		'fields' => array (
			array (
				'key' => 'field_54185d087f9b0',
				'label' => 'Arbeitgeber-Seite',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5419338474944',
				'label' => 'Call-to-Action',
				'name' => 'job-cta',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_54185d237f9b1',
				'label' => 'Ansprechpartner',
				'name' => 'job-cta-contact',
				'type' => 'relationship',
				'required' => 1,
				'return_format' => 'object',
				'post_type' => array (
					0 => 'mitarbeiter',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54193bba9ef5b',
				'label' => 'Bewerbungsformular',
				'name' => 'job-cta-form',
				'type' => 'acf_cf7',
				'allow_null' => 0,
				'multiple' => 0,
				'disable' => array (
					0 => 0,
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
