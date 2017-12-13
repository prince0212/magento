<?php
/**
 * Baju InternetProtocol InstallSchema
 */

namespace Baju\InternetProtocol\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
	
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.0') < 0) {
            $setup->startSetup();
            /**
             * Create table 'internet_protocol'
             */
            $table = $setup->getConnection()->newTable(
                $setup->getTable('internet_protocol')
            )->addColumn(
                'ip_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Crud Id'
            )->addColumn(
                'ip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                225,
                [],
                'IP'
            )->addColumn(
                'email_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                225,
                [],
                'Email'
            )->setComment('Baju InternetProtocol');

        $setup->getConnection()->createTable($table);
		}
        $setup->endSetup();
    }
}
