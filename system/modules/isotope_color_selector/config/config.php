<?php

/**
 * Bright Cloud Studio - Isotope Color Selector
 *
 * Copyright (C) 2022 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-color-selector
 * @link       http://brightcloudstudio.com
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */

/* Hooks */
if (\Config::getInstance()->isComplete()) {
    $GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('CustomTags\AddColorSelector', 'onReplaceTag');
}
