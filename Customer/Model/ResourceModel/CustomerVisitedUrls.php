<?php
/**
 * ResourceModel CustomerVisitedUrls
 *
 * @category  Smile
 * @package   Smile\Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace Smile\Customer\Model\ResourceModel;

use Magento\Catalog\Model\Product;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Smile\Customer\Api\Data\CustomerVisitedUrlsInterface;

/**
 * Class CustomerVisitedUrls
 *
 * @package Smile\Customer\Model\ResourceModel
 */
class CustomerVisitedUrls extends AbstractDb
{
    /**
     * Initialize main table and table id field
     *
     * @return void
     * @codeCoverageIgnore
     */
    protected function _construct()
    {
        $this->_init('customer_visited_urls', CustomerVisitedUrlsInterface::ID);
    }
}
