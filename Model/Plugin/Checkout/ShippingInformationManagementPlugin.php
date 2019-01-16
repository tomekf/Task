<?php

namespace SoftwareTarget\Task\Model\Plugin\Checkout;

use Magento\Quote\Model\QuoteRepository;
use Magento\Checkout\Model\ShippingInformationManagement;
use Magento\Checkout\Api\Data\ShippingInformationInterface;

class ShippingInformationManagementPlugin
{
    /**
     * @var Magento\Quote\Model\QuoteRepository
     */
    protected $quoteRepository;

    public function __construct(QuoteRepository $quoteRepository)
    {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param ShippingInformationManagement $subject
     * @param $cartId
     * @param ShippingInformationInterface $addressInformation
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function beforeSaveAddressInformation(
        ShippingInformationManagement $subject,
        $cartId,
        ShippingInformationInterface $addressInformation
    ) {
        $extAttributes = $addressInformation->getShippingAddress()->getExtensionAttributes();
        $externalOrderId = $extAttributes->getExternalOrderId();
        $quote = $this->quoteRepository->getActive($cartId);
        $quote->setExternalOrderId($externalOrderId);
    }
}