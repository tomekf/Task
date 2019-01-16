<?php

namespace SoftwareTarget\Task\Block\Adminhtml\Order\View;

use Magento\Sales\Block\Adminhtml\Order\AbstractOrder;

class ExternalOrder extends AbstractOrder
{
    /**
     * @return string
     */
    public function getExternalOrderId(): string
    {
        return (string) $this->getOrder()->getData('external_order_id');
    }
}