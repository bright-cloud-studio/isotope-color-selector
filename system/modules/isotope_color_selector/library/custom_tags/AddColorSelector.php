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

namespace CustomTags;
use Contao\Database;
use Contao\DataContainer;
use Contao\ContentElement;

class AddColorSelector extends \System
{
	public function onReplaceTag (string $insertTag)
	{
		// if this tag doesnt contain :: it doesn't have an id, so we can stop right here
		if (stristr($insertTag, "::") === FALSE) {
			return 'Your tag has no ID. Please add a Product ID or remove this tag from the page.';
		}

		// break our tag into an array
		$arrTag = explode("::", $insertTag);

		// lets make decisions based on the beginning of the tag
		switch($arrTag[0]) {
			case 'color_selector':

                $dbObj = \Database::getInstance()->prepare("SELECT * FROM tl_iso_product WHERE pid = '" . $arrTag[1] . "' AND published = 1")->execute(); 
                
                $count = 0;
                if ($dbObj->numRows > 0)
				{
                    $count = 0;
				    while($dbObj->next()) {
                        $buffer .= '<div class="">'.$dbObj->color.'</div>';
                        $count++;
                    }
                }
                
                return $buffer;
                
			break;
		}

        // YOU MUST return false to signafy you are not going to be modifying this, send it along to any other packages.
        return false;
        
	}
	
}
