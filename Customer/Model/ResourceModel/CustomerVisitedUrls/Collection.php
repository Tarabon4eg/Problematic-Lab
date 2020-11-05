<?php
/**
 * Collection CustomerVisitedUrls
 *
 * @category  Smile
 * @package   Smile\Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace Smile\Customer\Model\ResourceModel\CustomerVisitedUrls;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Smile\Customer\Model\CustomerVisitedUrls;
use Smile\Customer\Model\ResourceModel\CustomerVisitedUrls as ResourceCustomerVisitedUrls;

/**
 * Class Collection
 *
 * @package Smile\Customer\Model\ResourceModel\CustomerVisitedUrls
 */
class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(CustomerVisitedUrls::class, ResourceCustomerVisitedUrls::class);
    }
}
