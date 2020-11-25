<?php
/**
 * DTO Interface CustomerVisitedUrlsInterface
 *
 * @category  Smile
 * @package   Smile/Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace Smile\Customer\Api\Data;

/**
 * Interface CustomerVisitedUrls
 *
 * @package Smile\Customer\Api\Data
 */
interface CustomerVisitedUrlsInterface
{
    /**#@+
     * Fields
     */
    const ID = 'id';
    const CUST_ID = 'cust_id';
    const CUSTOMER_NAME = 'customer_name';
    const CLIENT_IP = 'client_ip';
    const VISITED_URL = 'visited_url';
    const URL_TITLE = 'url_title';
    const CREATED_AT = 'created_at';
    const PAGE_TITLE = 'page_title';
    const IS_ACTIVE = 'is_active';
    /**#@-*/

    /**#@+
     * IS_ACTIVE states
     */
    const ENABLED = 1;
    const DISABLED = 0;
    /**#@-*/

    /**
     * @return int|string|null
     */
    public function getCustId();

    /**
     * @return string
     */
    public function getCustomerName() : string;

    /**
     * @return string
     */
    public function getClientIp() : string;

    /**
     * @return string
     */
    public function getVisitedUrl() : string;

    /**
     * @return string
     */
    public function getUrlTitle() : string;

    /**
     * @return string
     */
    public function getCreatedAt() : string;

    /**
     * @return string
     */
    public function getPageTitle() : string;

    /**
     * @return bool
     */
    public function isActive() : bool;

    /**
     * @param int $custId
     * @return self
     */
    public function setCustId(int $custId) : self;

    /**
     * @param string $customerName
     * @return self
     */
    public function setCustomerName(string $customerName) : self;

    /**
     * @param string $clientIp
     * @return self
     */
    public function setClientIp(string $clientIp) : self;

    /**
     * @param string $url
     * @return self
     */
    public function setVisitedUrl(string $url) : self;

    /**
     * @param string $urlTitle
     * @return self
     */
    public function setUrlTitle(string $urlTitle) : self;

    /**
     * @param string $createdAt
     * @return self
     */
    public function setCreatedAt(string $createdAt) : self;

    /**
     * @param string $pageTitle
     * @return self
     */
    public function setPageTitle(string $pageTitle) : self;

    /**
     * @param string $isActive
     * @return self
     */
    public function setIsActive(bool $isActive) : self;
}
