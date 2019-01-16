<?php

namespace SoftwareTarget\Task\Model\Plugin\Checkout;

use Magento\Quote\Model\QuoteRepository;
use Magento\Checkout\Model\ShippingInformationManagement;
use Magento\Checkout\Api\Data\ShippingInformationInterface;
use SoftwareTarget\Task\Model\Plugin\Checkout\LayoutProcessor;

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
     * @throws \InvalidArgumentException
     */
    public function beforeSaveAddressInformation(
        ShippingInformationManagement $subject,
        $cartId,
        ShippingInformationInterface $addressInformation
    ) {
        $extAttributes = $addressInformation->getShippingAddress()->getExtensionAttributes();
        $externalOrderId = $extAttributes->getExternalOrderId();

        if (LayoutProcessor::FIELD_MAX_LENGTH < strlen($externalOrderId)) {
            throw new \InvalidArgumentException('External order id max length is ' . LayoutProcessor::FIELD_MAX_LENGTH);
        }

        /** @var Magento\Quote\Model\Quote $quote */
        $quote = $this->quoteRepository->getActive($cartId);
        $quote->setExternalOrderId($externalOrderId);
    }
}