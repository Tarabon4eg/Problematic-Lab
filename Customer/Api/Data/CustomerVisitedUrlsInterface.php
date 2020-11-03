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
    const CUSTOMER_ID = 'customer_id';
    const CUSTOMER_NAME = 'customer_name';
    const CLIENT_IP = 'client_ip';
    const VISITED_URL = 'visited_url';
    const URL_TITLE = 'url_title';
    const CREATED_AT = 'created_at';
    const IS_ACTIVE = 'is_active';
    /**#@-*/

    /**#@+
     * IS_ACTIVE states
     */
    const ENABLED = 1;
    const DISABLED = 0;
    /**#@-*/

    public function getCustomerId() : ?int;
    public function getCustomerName() : string;
    public function getClientIp() : string;
    public function getVisitedUrl() : string;
    public function getUrlTitle() : string;
    public function getCreatedAt() : string;
    public function isActive() : bool;

    public function setCustomerId(?int $customerId) : self;
    public function setCustomerName(string $customerName) : self;
    public function setClientIp(string $clientIp) : self;
    public function setVisitedUrl(string $url) : self;
    public function setUrlTitle(string $urlTitle) : self;
    public function setCreatedAt(string $createdAt) : self;
    public function setIsActive(bool $isActive) : self;
}
