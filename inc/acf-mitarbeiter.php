<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_mitarbeiter',
		'title' => 'Mitarbeiter',
		'fields' => array (
			array (
				'key' => 'field_533acd24c0986',
				'label' => 'Jobtitel',
				'name' => 'jobtitle',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'mitarbeiter',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'discussion',
				1 => 'comments',
				2 => 'format',
				3 => 'tags',
				4 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
