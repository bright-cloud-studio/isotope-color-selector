<?php
/*
 * Isotope Checkout Address Dropdown - Changes addresses into dropdown selects
 *
 * Copyright (C) 2021 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/isotope-checkout-address-dropdown
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */



/**
 * Register the classes
 */

ClassLoader::addClasses(array
(
	//'IsotopeFedEx\CheckoutStep\ShippingAddressVerify' 			=> 'system/modules/isotope_shipping_fedex/library/IsotopeFedEx/CheckoutStep/ShippingAddressVerify.php',
	'IsotopeCheckoutAddressDropdown\CheckoutStep\BillingAddressDropdown' 		=> 'system/modules/isotope_checkout_address_dropdown/library/IsotopeCheckoutAddressDropdown/CheckoutStep/BillingAddressDropdown.php',
	'IsotopeCheckoutAddressDropdown\CheckoutStep\ShippingAddressDropdown' 		=> 'system/modules/isotope_checkout_address_dropdown/library/IsotopeCheckoutAddressDropdown/CheckoutStep/ShippingAddressDropdown.php',
));
