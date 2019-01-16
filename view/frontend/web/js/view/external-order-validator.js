define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/additional-validators',
        'SoftwareTarget_Task/js/model/external-order-validator'
    ],
    function (Component, additionalValidators, externalOrderIdValidator) {
        'use strict';
        additionalValidators.registerValidator(externalOrderIdValidator);
        return Component.extend({});
    }
);