<?php

namespace SoftwareTarget\Task\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class SaveOrderBeforeSalesModelQuoteObserver implements ObserverInterface
{
    const ATTRIBUTE_NAME = 'external_order_id';

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getData('order');
        $quote = $observer->getEvent()->getData('quote');

        if ($quote->hasData(self::ATTRIBUTE_NAME)) {
            $order->setData(self::ATTRIBUTE_NAME, $quote->getData(self::ATTRIBUTE_NAME));
        }
    }
}