<?php

namespace MagentoEx\Newsletter\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use MagentoEx\Newsletter\Model\CustomerEconometryFactory;
Use MagentoEx\Newsletter\Model\ResourceModel\CustomerEconometry as CustomerEconometryResource;

class AddCustomerEconometryData implements DataPatchInterface, PatchVersionInterface
{
    protected $customerEconometryFactory;
    protected $customerEconometryResource;
    protected $moduleDataSetup;
    public function __construct(
        CustomerEconometryFactory $customerEconometryFactory,
        CustomerEconometryResource $customerEconometryResource,
        ModuleDataSetupInterface $moduleDataSetup
    )
    {
        $this->customerEconometryFactory = $customerEconometryFactory;
        $this->customerEconometryResource = $customerEconometryResource;
        $this->moduleDataSetup = $moduleDataSetup;
    }
    public function apply()
    {
        //Install data row into contact_details table
        $this->moduleDataSetup->startSetup();
        $econometricalData = $this->customerEconometryFactory->create();
        $econometricalData->setEconId('3')->setIncomeMonth('4500')
            ->setCustProfit('725')->setCustItems('7');
        $this->customerEconometryResource->save($econometricalData);
        $this->moduleDataSetup->endSetup();

    }
    public static function getDependencies()
    {
        return [];
    }
    public static function getVersion()
    {
        return '1.0.1';
    }
    public function getAliases()

    {
        return [];
    }
}
