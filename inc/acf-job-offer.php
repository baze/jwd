<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_job-offer',
		'title' => 'Job-Offer',
		'fields' => array (
			array (
				'key' => 'field_54183ab252d2f',
				'label' => 'Arbeitszeiten',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54183ad652d30',
				'label' => 'Job-Art',
				'name' => 'job-hours-type',
				'type' => 'select',
				'choices' => array (
					'Vollzeit' => 'Vollzeit',
					'Teilzeit' => 'Teilzeit',
					'Nach Absprache' => 'Nach Absprache',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_54183b2652d31',
				'label' => 'Stundenzahl',
				'name' => 'job-hours-amount',
				'type' => 'text',
				'default_value' => '40 Stunden',
				'placeholder' => '40 Stunden',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54183b4e52d32',
				'label' => 'Gehalt',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54183b6252d33',
				'label' => 'Währung',
				'name' => 'job-salary-currency',
				'type' => 'text',
				'default_value' => 'EUR',
				'placeholder' => 'EUR',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54183b8b52d34',
				'label' => 'Höhe',
				'name' => 'job-salary-amount',
				'type' => 'text',
				'default_value' => 'Nach Absprache',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54183bc652d35',
				'label' => 'Bewerberprofil',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54183c6952d36',
				'label' => 'Anforderungsprofil',
				'name' => 'job-requirements',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_54183c8552d37',
						'label' => 'Anforderungskategorie',
						'name' => 'requirement-category-title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_54183cb552d38',
						'label' => 'Inhalte Anforderungen',
						'name' => 'requirement-category-list',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_54183cef52d39',
								'label' => 'Anforderung',
								'name' => 'requirement-category-list-entry',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Row',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Job-Anforderungen hinzufügen',
			),
			array (
				'key' => 'field_54183d1652d3a',
				'label' => 'Das bieten wir',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54183d2f52d3b',
				'label' => 'Auflistung "Das bieten wir"',
				'name' => 'job-benefits',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_54183d2f52d3c',
						'label' => 'Vorteile-Titel',
						'name' => 'benefit-category-title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_54183d2f52d3d',
						'label' => 'Inhalte Vorteile',
						'name' => 'benefit-category-list',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_54183d2f52d3e',
								'label' => 'Vorteil',
								'name' => 'benefit-category-list-entry',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Vorteile hinzufügen',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Vorteile des Arbeitgebers hinzufügen',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'jobs',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'excerpt',
				1 => 'custom_fields',
				2 => 'discussion',
				3 => 'comments',
				4 => 'format',
				5 => 'featured_image',
				6 => 'tags',
				7 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
