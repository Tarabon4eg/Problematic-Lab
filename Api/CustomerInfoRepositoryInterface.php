<?php
/**
 * Repository Interface CustomerInfoRepositoryInterface
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use MagentoEx\Newsletter\Api\Data\CustomerInfoInterface;

/**
 * Interface CustomerInfoRepositoryInterface
 *
 * @package MagentoEx\Newsletter\Api
 */
interface CustomerInfoRepositoryInterface
{
    /**
     * @param int $id
     * @return \MagentoEx\Newsletter\Api\Data\CustomerInfoInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $id);

    /**
     * @param \MagentoEx\Newsletter\Api\Data\CustomerInfoInterface $customerInfo
     * @return \MagentoEx\Newsletter\Api\Data\CustomerInfoInterface
     */
    public function save(CustomerInfoInterface $customerInfo);

    /**
     * @param \MagentoEx\Newsletter\Api\Data\CustomerInfoInterface $customerInfo
     * @return void
     */
    public function delete(CustomerInfoInterface $customerInfo);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \MagentoEx\Newsletter\Api\Data\
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

}
