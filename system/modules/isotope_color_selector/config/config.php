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
 * Checkout steps
 */
foreach ($GLOBALS['ISO_CHECKOUTSTEP']['address'] as $index => $value) {
	if ($value == '\Isotope\CheckoutStep\ShippingAddress' || $value == 'Isotope\CheckoutStep\ShippingAddress') {
		$GLOBALS['ISO_CHECKOUTSTEP']['address'][$index] = '\IsotopeCheckoutAddressDropdown\CheckoutStep\ShippingAddressDropdown';
	}
	else if ($value == '\Isotope\CheckoutStep\BillingAddress' || $value == 'Isotope\CheckoutStep\BillingAddress') {
		$GLOBALS['ISO_CHECKOUTSTEP']['address'][$index] = '\IsotopeCheckoutAddressDropdown\CheckoutStep\BillingAddressDropdown';
	}
}
