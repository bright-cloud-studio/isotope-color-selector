<?php

/**
 * Bright Cloud Studio's Isotope Color Selector
 *
 * Copyright (C) 2022 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-color-selector
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
**/

 /* Extend the tl_user palettes */
foreach ($GLOBALS['TL_DCA']['tl_iso_attribute_option']['palettes'] as $k => $v) {
    $GLOBALS['TL_DCA']['tl_iso_attribute_option']['palettes'][$k] = str_replace('label;', 'label;{color_legend},color_css,color_image;', $v);
}

/* Add fields to tl_user */
$GLOBALS['TL_DCA']['tl_iso_attribute_option']['fields']['color_image'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['color_image'],
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

$GLOBALS['TL_DCA']['tl_iso_attribute_option']['fields']['color_css'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_user']['color_css'],
	'inputType'		=> 'textarea',
	'eval'                	=> [
		'rte'=>'tinyMCE',
		'tl_class'=>'long'
	],
	'sql'                   => "mediumtext NOT NULL default ''"
);
