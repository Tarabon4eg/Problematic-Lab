<?php
/**
 * Model CustomerInfo
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Model;

use MagentoEx\Newsletter\Model\ResourceModel\CustomerInfo as ResourceModel;
use MagentoEx\Newsletter\Api\Data\CustomerInfoInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class CustomerInfo
 *
 * @package MagentoEx\Newsletter\Model
 */
class CustomerInfo extends AbstractModel implements CustomerInfoInterface
{
    /**
     * Init resource model and id field
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(ResourceModel::class);
        $this->setIdFieldName(CustomerInfoInterface::ID);
    }

    public function getCustomerId(): int
    {
        return $this->getData(CustomerInfoInterface::CUSTOMER_ID);
    }

    public function getSex(): string
    {
        return $this->getData(CustomerInfoInterface::SEX);
    }

    public function getAge(): int
    {
        return $this->getData(CustomerInfoInterface::AGE);
    }

    public function getNationality(): string
    {
        return $this->getData(CustomerInfoInterface::NATIONALITY);
    }

    public function setCustomerId(int $customerId): CustomerInfoInterface
    {
        return $this->setData(CustomerInfoInterface::CUSTOMER_ID, $customerId);
    }

    public function setSex(string $sex): CustomerInfoInterface
    {
        return $this->setData(CustomerInfoInterface::SEX, $sex);
    }

    public function setAge(int $age): CustomerInfoInterface
    {
        return $this->setData(CustomerInfoInterface::AGE, $age);
    }

    public function setNationality(string $nationality): CustomerInfoInterface
    {
        return $this->setData(CustomerInfoInterface::NATIONALITY, $nationality);
    }
}
