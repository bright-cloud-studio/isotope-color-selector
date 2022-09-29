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
use Contao\FrontendTemplate;

class AddVariantsTags extends \System
{
	public function onReplaceTag (string $insertTag)
	{
		// if this tag doesnt contain :: it doesn't have an id, so we can stop right here
		if (stristr($insertTag, "::") === FALSE) {
			return 'Your tag has no ID. Please add a User ID or remove this tag from the page.';
		}

		// break our tag into an array
		$arrTag = explode("::", $insertTag);

		// lets make decisions based on the beginning of the tag
		switch($arrTag[0]) {
			// if the tag is what we want, {{simple_inventory::id}}, then lets go
			case 'variants_dimentions':
				$dbObj = \Database::getInstance()->prepare("SELECT * FROM tl_iso_product WHERE pid = '" . $arrTag[1] . "' AND published = 1 ORDER BY cast(wp_size as decimal(7,2)) ASC")->execute();  
				
				$buffer = '';
				if ($dbObj->numRows > 0)
				{
					$arrLocation = array(
						'id'		=> 111,
						'pid'		=> 222
					);
				    while($dbObj->next()) {
    				    
    					$arrLocation['id'] 		= $dbObj->id;
    					$arrLocation['pid']		= $dbObj->pid;
    					$arrLocation['sku']		= $dbObj->sku;
    					$arrLocation['wp_size']		= $dbObj->wp_size;
    					
    					$arrLocation['baseprice']	= 999;
    					
    					
    					// Lets get our correct prices
    					
    					// First, search tl_iso_product_price using this products ID and that fields PID
    					$step1 = \Database::getInstance()->prepare("SELECT * FROM tl_iso_product_price WHERE pid = '" . $dbObj->id . "'")->execute();  
    					while($step1->next()) {
    					    // Then, search tl_iso_product_pricetier using the PID from the last query to get the 'price'
    					    $step2 = \Database::getInstance()->prepare("SELECT * FROM tl_iso_product_pricetier WHERE pid = '" . $step1->id . "'")->execute();  
					        while($step2->next()) {
					            // Finally, assign that price to our templates array
					            $arrLocation['baseprice'] = $step2->price;
					        }
    					}
    					
    					$template = new FrontendTemplate('item_variant_dimentions');
    					$template->variant = $arrLocation;
    					$buffer .= $template->parse();
				    }
					return $buffer;
				}
			break;
		}

		// something has gone horribly wrong, let the user know and hope for brighter lights ahead
		return 'something_went_wrong';
	}
	
}
