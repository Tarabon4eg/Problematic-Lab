<?php
/**
 * Repository Interface CustomerEconometryRepositoryInterface
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface;

/**
 * Interface CustomerEconometryRepositoryInterface
 *
 * @package MagentoEx\Newsletter\Api
 * @api
 */
interface CustomerEconometryRepositoryInterface
{
    /**
     * @param int $econId
     * @return \MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get(int $econId);

    /**
     * @param \MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface $customerEconometry
     * @return \MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface
     */
    public function save(CustomerEconometryInterface $customerEconometry);

    /**
     * @param \MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface $customerEconometry
     * @return bool
     */
    public function delete(CustomerEconometryInterface $customerEconometry);

    /**
     * @param int $custId
     * @return bool
     */
    public function deleteById(int $econId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \MagentoEx\Newsletter\Api\Data\
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

}
