<?php
/**
 * ResourceModel CustomerInfo
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */
namespace MagentoEx\Newsletter\Model\ResourceModel;

use MagentoEx\Newsletter\Api\Data\CustomerInfoInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class CustomerInfo
 *
 * @package MagentoEx\Newsletter\Model\ResourceModel
 */
class CustomerInfo extends AbstractDb
{
    /**
     * Child Constructor
     *
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    /**
     * Initialize main table and table id field
     *
     * @return void
     * @codeCoverageIgnore
     */
    protected function _construct()
    {
        $this->_init('customer_info', CustomerInfoInterface::ID);
    }
}
