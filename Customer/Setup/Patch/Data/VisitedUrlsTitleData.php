<?php

namespace Smile\Customer\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class VisitedUrlsTitleData implements DataPatchInterface
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
     * Apply Data Patch
     * @return $this
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->update(
            $this->moduleDataSetup->getTable('customer_visited_urls'),
            [
                'page_title' => 'Smile Shop'
            ],
            $this->moduleDataSetup->getConnection()->quoteInto('id = ?', 41)
        );

        $this->moduleDataSetup->endSetup();

        return $this;
    }
}

