<?php
/**
 * Model CustomerEconometry
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Model;

use MagentoEx\Newsletter\Model\ResourceModel\CustomerEconometry as ResourceModel;
use MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class CustomerEconometry
 *
 * @package MagentoEx\Newsletter\Model
 */
class CustomerEconometry extends AbstractModel implements CustomerEconometryInterface
{
    /**
     * @var string
     */
    protected $_idFieldName = CustomerEconometryInterface::ECON_ID; //@codingStandardsIgnoreLine

    /**
     * @inheritdoc
     */
    protected function _construct() //@codingStandardsIgnoreLine
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @return int
     */
    public function getEconId(): int
    {
        return $this->getData(CustomerEconometryInterface::ECON_ID);
    }

    /**
     * @return int
     */
    public function getIncomeMonth(): int
    {
        return $this->getData(CustomerEconometryInterface::INCOME_MONTH);
    }

    /**
     * @return int
     */
    public function getCustProfit(): int
    {
        return $this->getData(CustomerEconometryInterface::CUST_PROFIT);
    }

    /**
     * @return int
     */
    public function getCustItems(): int
    {
        return $this->getData(CustomerEconometryInterface::CUST_ITEMS);
    }


    /**
     * @param int $econId
     * @return $this
     */
    public function setEconId(int $econId): CustomerEconometryInterface
    {
        return $this->setData(CustomerEconometryInterface::ECON_ID, $econId);
    }

    /**
     * @param int $incomeMonth
     * @return $this
     */
    public function setIncomeMonth(int $incomeMonth): CustomerEconometryInterface
    {
        return $this->setData(CustomerEconometryInterface::INCOME_MONTH, $incomeMonth);
    }

    /**
     * @param int $custProfit
     * @return $this
     */
    public function setCustProfit(int $custProfit): CustomerEconometryInterface
    {
        return $this->setData(CustomerEconometryInterface::CUST_PROFIT, $custProfit);
    }

    /**
     * @param int $custItems
     * @return $this
     */
    public function setCustItems(int $custItems): CustomerEconometryInterface
    {
        return $this->setData(CustomerEconometryInterface::CUST_ITEMS, $custItems);
    }
}
