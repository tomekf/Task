define(
    ['jquery', 'Magento_Checkout/js/model/step-navigator', 'mage/validation'],
    function ($, stepNavigator) {
        'use strict';
        return {

            validate: function() {
                var value = $("input[name='external_order_id']").val();

                if (value.length > 40) {
                    $("div[name='shippingAddress.external_order_id']").addClass('_error');
                    alert('External order id max length is 40');
                    stepNavigator.navigateTo('shipping');

                    return false;
                }

                return true;
            }
        }
    }
);