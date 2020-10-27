<?php
/**
 * Collection
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Model\ResourceModel\CustomerEconometry;

use MagentoEx\Newsletter\Model\CustomerEconometry;
use MagentoEx\Newsletter\Model\ResourceModel\CustomerEconometry as CustomerEconometryResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package MagentoEx\Newsletter\Model\ResourceModel\CustomerEconometry
 */
class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct() //@codingStandardsIgnoreLine
    {
        $this->_init(CustomerEconometry::class, CustomerEconometryResource::class);
    }
}
