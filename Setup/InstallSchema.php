<?php

namespace SoftwareTarget\Task\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    const COLUMN_NAME = 'external_order_id';
    const COLUMN_COMMENT = 'External Order Id';
    const COLUMN_SIZE = 40;
    const COLUMN_TYPE = Table::TYPE_TEXT;

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $installer->getConnection()->addColumn(
            $installer->getTable('quote'),
            self::COLUMN_NAME,
            [
                'type' => self::COLUMN_TYPE,
                'size'  => self::COLUMN_SIZE,
                'nullable' => true,
                'comment' => self::COLUMN_COMMENT,
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order'),
            self::COLUMN_NAME,
            [
                'type' => self::COLUMN_TYPE,
                'size'  => self::COLUMN_SIZE,
                'nullable' => true,
                'comment' => self::COLUMN_COMMENT,
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order_grid'),
            self::COLUMN_NAME,
            [
                'type' => self::COLUMN_TYPE,
                'size'  => self::COLUMN_SIZE,
                'nullable' => true,
                'comment' => self::COLUMN_COMMENT,
            ]
        );
        $installer->endSetup();
    }
}