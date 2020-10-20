<?php
/**
 * Collection
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Model\ResourceModel\CustomerInfo;

/**
 * Class Collection
 *
 * @package MagentoEx\Newsletter\Model\ResourceModel\CustomerInfo
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('MagentoEx\Newsletter\Model\CustomerInfo', 'MagentoEx\Newsletter\Model\ResourceModel\CustomerInfo');
    }
}
