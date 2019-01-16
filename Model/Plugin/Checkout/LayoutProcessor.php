<?php

namespace SoftwareTarget\Task\Model\Plugin\Checkout;

use Magento\Framework\View\Element\Template\Context;
use Magento\CheckoutAgreements\Model\ResourceModel\Agreement\CollectionFactory;
use Magento\Checkout\Model\Session;
use Magento\Customer\Model\AddressFactory;
use Magento\Checkout\Block\Checkout\LayoutProcessor as CheckoutLayoutProcessor;

class LayoutProcessor
{
    const FIELD_NAME = 'external_order_id';
    const FIELD_MAX_LENGTH = 40;
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var \Magento\Customer\Model\AddressFactory
     */
    protected $customerAddressFactory;

    /**
     * @var \Magento\Framework\Data\Form\FormKey
     */
    protected $formKey;

    public function __construct(
        Context $context,
        CollectionFactory $agreementCollectionFactory,
        Session $checkoutSession,
        AddressFactory $customerAddressFactory
    ) {
        $this->scopeConfig = $context->getScopeConfig();
        $this->checkoutSession = $checkoutSession;
        $this->customerAddressFactory = $customerAddressFactory;
    }
    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        CheckoutLayoutProcessor $subject,
        array  $jsLayout
    ) {
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['before-form']['children'][self::FIELD_NAME] = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
                'options' => [],
                'tooltip' => [
                    'description' => 'External Order Id',
                ],
            ],
            'dataScope' => 'shippingAddress.' . self::FIELD_NAME,
            'label' => 'External Order Id',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [
                'max_text_length' => self::FIELD_MAX_LENGTH
            ],
            'sortOrder' => 200,
            'id' => 'external-order-id'
        ];

        return $jsLayout;
    }
}