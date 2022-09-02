<?php

/**
 * Bright Cloud Studio's Add User Fields
 *
 * Copyright (C) 2021 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/add-user-fields
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
**/

 /* Extend the tl_user palettes */
foreach ($GLOBALS['TL_DCA']['tl_user']['palettes'] as $k => $v) {
    $GLOBALS['TL_DCA']['tl_user']['palettes'][$k] = str_replace('email;', 'email;{add_user_fields_legend},user_image,user_image_size,user_image_meta,user_bio;', $v);
}

/* Add fields to tl_user */
$GLOBALS['TL_DCA']['tl_user']['fields']['user_image'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['user_image'],
	'inputType'               => 'fileTree',
	'default'		  => '',
	'search'                  => true,
	'eval' => [
		'tl_class' => 'long',
		'fieldType' => 'radio', 
		'filesOnly' => true
	],
	'sql'                    => ['type' => 'binary', 'length' => 16, 'notnull' => false, 'fixed' => true]
);
