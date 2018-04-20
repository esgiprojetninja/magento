<?php
namespace Esgi\Ninja\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

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
        // Action to do if module version is less than 1.1.0
        // if (version_compare($context->getVersion(), '1.1.0') < 0) {
            // $this->addNinjaTable($setup);
            $this->addNinjaStoreTable($setup);
        // }

        /*if (version_compare($context->getVersion(), '1.2.0') < 0) {
            $this->addNinjaStoresAndNinjaIndexes($setup);
        }*/

    }

    protected function addNinjaTable(SchemaSetupInterface $setup)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Create table 'esgi_ninja_ninja'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('esgi_ninja_ninja')
        )->addColumn(
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Ninja ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Ninja Title'
        )->addColumn(
            'type',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Ninja type'
        )->addColumn(
            'location',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Ninja location'
        )->addColumn(
            'date',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
            255,
            ['nullable' => false],
            'Ninja date begin'
        )->addColumn(
            'is_active',
            \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
            255,
            ['nullable' => false, 'default' => 0],
            'Ninja status'
        )->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            [],
            'Ninja Description'
        )
        ->addColumn(
            'ninjastore_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'NinjaStores linked to the ninja'
        )->addForeignKey(
                $installer->getFkName('esgi_ninja_ninja', 'ninjastore_id', 'esgi_ninja_ninjastore', 'entity_id'),
                'ninjastore_id',
                $installer->getTable('esgi_ninja_ninjastore'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->setComment(
            'Ninja management for Esgi Ninja module'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }

    protected function addNinjaStoreTable(SchemaSetupInterface $setup)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Create table 'esgi_ninja_ninja'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('esgi_ninja_ninjastore')
        )->addColumn(
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'NinjaStore ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'NinjaStore Name'
        )->addColumn(
            'content',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            [],
            'NinjaStore Description'
        )->addColumn(
            'lat',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'NinjaStore ID'
        )->addColumn(
            'lng',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'NinjaStore ID'
        )->addColumn(
            'link',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'NinjaStore Name'
        )->setComment(
            'NinjaStore management for Esgi Ninja module'
        );

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }

    /*protected function addNinjaStoresAndNinjaIndexes(SchemaSetupInterface $setup)
    {
        $installer = $setup;
        $installer->startSetup();



        $installer->endSetup();
    }*/
}
