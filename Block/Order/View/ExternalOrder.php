<?php

namespace SoftwareTarget\Task\Block\Order\View;

use Magento\Sales\Block\Order\Info;

class ExternalOrder extends Info
{
    /**
     * @return string
     */
    public function getExternalOrderId(): string
    {
        return (string)$this->getOrder()->getData('external_order_id');
    }
}