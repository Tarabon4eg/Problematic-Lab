<?php
/**
 * ResourceModel CustomerEconometry
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */
namespace MagentoEx\Newsletter\Model\ResourceModel;

use MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class CustomerEconometry
 *
 * @package MagentoEx\Newsletter\Model\ResourceModel
 */
class CustomerEconometry extends AbstractDb
{
    /**
     * @var string
     */
    const TABLE_NAME = 'customer_info_econometry';

    /**
     * Initialize main table and table id field
     *
     * @return void
     */
    protected function _construct() //@codingStandardsIgnoreLine
    {
        $this->_init(self::TABLE_NAME, CustomerEconometryInterface::ECON_ID);
    }
}
