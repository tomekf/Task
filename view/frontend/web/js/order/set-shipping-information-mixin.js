/**
 * @author aakimov
 */
/*jshint browser:true jquery:true*/
/*global alert*/
define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote'
], function ($, wrapper, quote) {
    'use strict';

    return function (setShippingInformationAction) {

        return wrapper.wrap(setShippingInformationAction, function (originalAction) {
            var shippingAddress = quote.shippingAddress();
            if (shippingAddress['extension_attributes'] === undefined) {
                shippingAddress['extension_attributes'] = {};
            }

            shippingAddress['extension_attributes']['delivery_date'] = jQuery('[name="delivery_date"]').val();
            shippingAddress['extension_attributes']['external_order_id'] = jQuery('[name="external_order_id"]').val();

            return originalAction();
        });
    };
});