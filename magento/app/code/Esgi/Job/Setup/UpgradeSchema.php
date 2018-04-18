<?php

namespace Tinwork\Job\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class UpgradeSchema
 *
 * @package     Tinwork\Job\Setup
 * @copyright   Copyright (c) 2018 Slabprea
 */
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
        // --> On compare les versions et lance tel ou tel upgrade si besoin
        if (version_compare($context->getVersion(), '1.1.0') < 0) {
            $this->addJobTable($setup);
        }

        /*if (version_compare($context->getVersion(), '1.2.0') < 0) {
            $this->addDepartmentAndJobIndexes($setup);
        }*/
    }

    protected function addJobTable(SchemaSetupInterface $setup)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Create table 'tinwork_job_job'
         */
        $table = $installer
            ->getConnection()
            ->newTable($installer->getTable('tinwork_job_job'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Job ID'
            )
            ->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Job Title'
            )
            ->addColumn(
                'type',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Job type'
            )
            ->addColumn(
                'location',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Job location'
            )
            ->addColumn(
                'date',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
                255,
                ['nullable' => false],
                'Job date begin'
            )
            ->addColumn(
                'is_active',
                \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                255,
                ['nullable' => false, 'default' => 0],
                'Job status'
            )
            ->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '2M',
                [],
                'Job Description'
            )
            ->addColumn(
                'department_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => false],
                'Department linked to the job'
            )
            ->addForeignKey(
                $installer->getFkName('tinwork_job_job', 'department_id', 'tinwork_job_department', 'entity_id'),
                'department_id',
                $installer->getTable('tinwork_job_department'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment(
                'Job management for Tinwork Job module'
            );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }

    /*protected function addDepartmentAndJobIndexes(SchemaSetupInterface $setup)
    {
        $installer = $setup;
        $installer->startSetup();

        $installer->endSetup();
    }*/
}