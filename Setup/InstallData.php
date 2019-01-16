<?php

namespace SoftwareTarget\Task\Setup;

use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    const CONFIG_PATH = 'checkout/options/guest_checkout';
    private $configWriter;

    public function __construct(WriterInterface $configWriter)
    {
        $this->configWriter = $configWriter;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
       $setup->startSetup();
       $this->configWriter->save(self::CONFIG_PATH, 0);
       $setup->endSetup();
    }
}