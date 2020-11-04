<?php
/**
 * Model CustomerVisitedUrls
 *
 * @category  Smile
 * @package   Smile\Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace Smile\Customer\Model;

use Magento\Framework\Model\AbstractModel;
use Smile\Customer\Api\Data\CustomerVisitedUrlsInterface;
use Smile\Customer\Model\ResourceModel\CustomerVisitedUrls as ResourceModel;

class CustomerVisitedUrls extends AbstractModel implements CustomerVisitedUrlsInterface
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
        $this->setIdFieldName(CustomerVisitedUrlsInterface::ID);
    }

    /**
     * Get customer id
     *
     * @return int
     */
    public function getCustId(): ?int
    {
        return $this->getData(CustomerVisitedUrlsInterface::CUST_ID);
    }

    /**
     * Get customer name
     *
     * @return string
     */
    public function getCustomerName(): string
    {
        return $this->getData(CustomerVisitedUrlsInterface::CUSTOMER_NAME);
    }

    /**
     * Get client ip
     *
     * @return string
     */
    public function getClientIp(): string
    {
            return $this->getData(CustomerVisitedUrlsInterface::CLIENT_IP);
    }

    /**
     * Get visited url
     *
     * @return string
     */
    public function getVisitedUrl(): string
    {
        return $this->getData(CustomerVisitedUrlsInterface::VISITED_URL);
    }

    /**
     * Get url title
     *
     * @return string
     */
    public function getUrlTitle(): string
    {
        return $this->getData(CustomerVisitedUrlsInterface::URL_TITLE);
    }

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->getData(CustomerVisitedUrlsInterface::CREATED_AT);
    }

    /**
     * Is active
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return (bool) $this->getData(CustomerVisitedUrlsInterface::IS_ACTIVE);
    }

    /**
     * Set customer id
     *
     * @param int|null $customerId
     *
     * @return CustomerVisitedUrlsInterface
     */
    public function setCustId(?int $custId): CustomerVisitedUrlsInterface
    {
        return $this->setData(CustomerVisitedUrlsInterface::CUST_ID, $custId);
    }

    /**
     * Set customer name
     *
     * @param string|null $customerName
     *
     * @return CustomerVisitedUrlsInterface
     */
    public function setCustomerName(string $customerName): CustomerVisitedUrlsInterface
    {
        return $this->setData(CustomerVisitedUrlsInterface::CUSTOMER_NAME, $customerName);
    }

    /**
     * Set client ip
     *
     * @param string $clientIp
     *
     * @return CustomerVisitedUrlsInterface
     */
    public function setClientIp(string $clientIp): CustomerVisitedUrlsInterface
    {
        return $this->setData(CustomerVisitedUrlsInterface::CLIENT_IP, $clientIp);
    }

    /**
     * Set visited url
     *
     * @param string $url
     *
     * @return CustomerVisitedUrlsInterface
     */
    public function setVisitedUrl(string $url): CustomerVisitedUrlsInterface
    {
        return $this->setData(CustomerVisitedUrlsInterface::VISITED_URL, $url);
    }

    /**
     * Set url title
     *
     * @param string $urlTitle
     *
     * @return CustomerVisitedUrlsInterface
     */
    public function setUrlTitle(string $urlTitle): CustomerVisitedUrlsInterface
    {
        return $this->setData(CustomerVisitedUrlsInterface::URL_TITLE, $urlTitle);
    }

    /**
     * Set created at
     *
     * @param string $createdAt
     *
     * @return CustomerVisitedUrlsInterface
     */
    public function setCreatedAt(string $createdAt): CustomerVisitedUrlsInterface
    {
        return $this->setData(CustomerVisitedUrlsInterface::CREATED_AT, $createdAt);
    }

    /**
     * Set is active
     *
     * @param bool $isActive
     *
     * @return CustomerVisitedUrlsInterface
     */
    public function setIsActive(bool $isActive): CustomerVisitedUrlsInterface
    {
        return $this->setData(CustomerVisitedUrlsInterface::IS_ACTIVE, $isActive);
    }
}
