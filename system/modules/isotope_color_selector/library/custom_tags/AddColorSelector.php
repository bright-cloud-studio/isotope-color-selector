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
			    
			    /*
                $buffer = '';
                $buffer .= '<div class="widget widget-radio mandatory"><fieldset id="ctrl_color_fmd6_product_1" class="radio_container mandatory"><legend><span class="invisible">Mandatory field </span>Color<span class="mandatory">*</span></legend>';
                
				//echo "COLOR SELECTOR FOR PRODUCT: " . $arrTag[1];
                
                // get all sub products
                $dbObj = \Database::getInstance()->prepare("SELECT * FROM tl_iso_product WHERE pid = '" . $arrTag[1] . "' AND published = 1")->execute(); 
                
                $count = 0;
                if ($dbObj->numRows > 0)
				{
                    $count = 0;
				    while($dbObj->next()) {
                        $buffer .= '<div class="">'.$dbObj->color.'</div>';
                        $buffer .= '<span><input type="radio" name="color" id="opt_color_fmd6_product_1_'.$count.'" class="radio" value="'.$dbObj->color.'" checked="" required=""><label id="lbl_color_fmd6_product_1_'.$count.'" for="opt_color_fmd6_product_1_'.$count.'">'.$dbObj->color.'</label></span>';
                        $count++;
                    }
                }
                
                $buffer .= '</fieldset>\n</div>\n';
                */
                
                
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

		// something has gone horribly wrong, let the user know and hope for brighter lights ahead
		//return 'something_went_wrong';
	}
	
}
