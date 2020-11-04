<?php
/**
 * Repository Interface CustomerVisitedUrlsRepositoryInterface
 *
 * @category  Smile
 * @package   Smile/Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */
namespace Smile\Customer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CustomerVisitedUrlsRepositoryInterface
 *
 * @package Smile\Customer\Api
 * @api
 */
interface CustomerVisitedUrlsRepositoryInterface
{
    /**
     * @param int $id
     * @return \Smile\Customer\Api\Data\CustomerVisitedUrlsInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $id);

    /**
     * @param string $url
     * @return \Smile\Customer\Api\Data\CustomerVisitedUrlsInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getByUrl(string $url);

    /**
     * @param string $clientIp
     * @return \Smile\Customer\Api\Data\CustomerVisitedUrlsInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getByClientIp(string $clientIp);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Smile\Customer\Api\Data\
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id);

    /**
     * @param \Smile\Customer\Api\Data\CustomerVisitedUrlsInterface $model
     * @return bool
     */
    public function delete(Data\CustomerVisitedUrlsInterface $model);

    /**
     * @param \Smile\Customer\Api\Data\CustomerVisitedUrlsInterface $model
     * @return \Smile\Customer\Api\Data\CustomerVisitedUrlsInterface
     */
    public function save(Data\CustomerVisitedUrlsInterface $model);
}
