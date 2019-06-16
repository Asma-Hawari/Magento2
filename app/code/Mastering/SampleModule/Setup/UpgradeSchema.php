<?php


namespace Mastering\SampleModule\Setup;


use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('mastering_sample_item'),
                'description',
                [
                    'type' => Table::TYPE_TEXT,
                    'nullable' => true,
                    'comment' => 'Item Description'

                ]
            );

        }

        if (version_compare($context->getVersion(), '1.1.0', '<')) {

            $new_table = $setup->getConnection()->newTable(
                $setup->getTable('mastering_item_images'))
                ->addColumn(  'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true , 'nullable' => false , 'primary' =>true],
            'Item Image ID')
                ->addColumn(
                    'item_id',
                    Table::TYPE_INTEGER,
                    255,
                    ['nullable' => false])
                ->addColumn(
                    'path',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => true])
                ->addForeignKey(
                    $setup->getFkName(
                        'mastering_item_images', 'item_id',
                        'mastering_sample_item', 'id'),
                    'item_id',
                    $setup->getTable('mastering_sample_item'), /* main table name */
                    'id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                );

            $setup->getConnection()->createTable($new_table);
        }




        $setup->endSetup();
    }

}