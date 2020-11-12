<?php

namespace Smile\Customer\Setup\Patch\Schema;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;

class VisitedUrlsTitleColumn implements SchemaPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    protected $moduleDataSetup;

    /**
     * VisitedUrlsTitleColumn constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Get array of patches that have to be executed prior to this
     *
     * @return string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Get aliases (previous names) for the patch
     *
     * @return string[]
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * The function returns a string with a version number
     * @return string[]
     */
    public static function getVersion()
    {
        return [];
    }

    /**
     * Apply Schema Patch
     * @return $this
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $this->moduleDataSetup->getConnection()
            ->addColumn(
                $this->moduleDataSetup->getTable('customer_visited_urls'),
                'page_title',
                [
                    'type' => Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'comment'  => 'Page Title',
                ]
            );

        $this->moduleDataSetup->endSetup();

        return $this;
    }
}
