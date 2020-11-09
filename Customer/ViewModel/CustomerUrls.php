<?php
/**
 * ViewModel CustomerUrls
 *
 * @category  Smile
 * @package   Smile/Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace Smile\Customer\ViewModel;

use Smile\Customer\Api\Data\CustomerVisitedUrlsInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\Search\FilterGroup;

/**
 * Class CustomerUrls
 *
 * @package Smile\Customer\ViewModel
 */
class CustomerUrls implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Smile\Customer\Api\CustomerVisitedUrlsRepositoryInterface
     */
    protected $repository;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * @var FilterBuilder
     */
    protected $filterBuilder;

    /**
     * @var SortOrder
     */
    protected $sortOrder;

    /**
     * @var FilterGroup
     */
    protected $filterGroup;

    /**
     * CustomerUrls constructor.
     *
     * @param \Smile\Customer\Api\CustomerVisitedUrlsRepositoryInterface $repository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param FilterBuilder $filterBuilder
     * @param FilterGroup $filterGroup
     * @param SortOrder $sortOrder
     */
    public function __construct(
        \Smile\Customer\Api\CustomerVisitedUrlsRepositoryInterface $repository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        FilterGroup $filterGroup,
        SortOrder $sortOrder
    ) {
        $this->repository = $repository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->filterGroup = $filterGroup;
        $this->sortOrder = $sortOrder;
    }

    /**
     * filter method
     * @return mixed
     */
    public function getNoLoginCustomerVisitedUrls()
    {
        $searchCriteria = $this->searchCriteriaBuilder->addFilter(
            CustomerVisitedUrlsInterface::CUST_ID,
            null,
            'null'
        )
        ->addFilter(
            CustomerVisitedUrlsInterface::IS_ACTIVE,
            CustomerVisitedUrlsInterface::ENABLED
        )->create();

        return $this->repository->getList($searchCriteria);
    }

    /**
     * filter method
     * @return mixed
     */
    public function getLastLoginedCustomerVisitedUrlsFullNames()
    {
        $sortOrder = $this->sortOrder
            ->setField("created_at")
            ->setDirection("ASC");

        $this->searchCriteriaBuilder->setPageSize(5)
            ->setSortOrders([$sortOrder]);

        $searchCriteria = $this->searchCriteriaBuilder->addFilter(
            CustomerVisitedUrlsInterface::CUST_ID,
            null,
            'neq'
        )->create();

        return $this->repository->getListWithCustomersFullNames($searchCriteria);
    }

    /**
     * filter method
     * @return mixed
     */
    public function getLastLoginedCustomerVisitedUrlsContactInfo()
    {
        $sortOrder = $this->sortOrder
            ->setField("created_at")
            ->setDirection("ASC");

        $this->searchCriteriaBuilder->setPageSize(5)
            ->setSortOrders([$sortOrder]);

        $searchCriteria = $this->searchCriteriaBuilder->addFilter(
            CustomerVisitedUrlsInterface::CUST_ID,
            null,
            'neq'
        )->create();

        return $this->repository->getListWithCustomersContactInfo($searchCriteria);
    }

    /**
     * filterGroup OR method
     * with sorting (descending) and pagination
     * @return mixed
     */
    public function getLastMagentoDevVisitedUrls()
    {
        $filterDev1 = $this->filterBuilder
            ->setField(CustomerVisitedUrlsInterface::CUST_ID)
            ->setConditionType('eq')
            ->setValue("1")
            ->create();

        $filterDev2 = $this->filterBuilder
            ->setField(CustomerVisitedUrlsInterface::CUST_ID)
            ->setConditionType('eq')
            ->setValue("2")
            ->create();

        $sortOrder = $this->sortOrder
            ->setField("created_at")
            ->setDirection("DESC");

        $this->searchCriteriaBuilder->addFilters([$filterDev1, $filterDev2])
            ->setPageSize(5)
            ->setSortOrders([$sortOrder]);

        $searchCriteria = $this->searchCriteriaBuilder->create();
        return $this->repository->getList($searchCriteria);
    }

    /**
     * filterGroup AND method
     * with sorting (ascending) and pagination
     * @return mixed
     */
    public function getFirstMagentoDevsVisitedUrls()
    {
        $filterDev1 = $this->filterBuilder
            ->setField(CustomerVisitedUrlsInterface::CUST_ID)
            ->setConditionType('eq')
            ->setValue("1")
            ->create();
        $groupFilterDev1 = $this->filterGroup->setFilters([$filterDev1]);

        $filterDev2 = $this->filterBuilder
            ->setField(CustomerVisitedUrlsInterface::IS_ACTIVE)
            ->setConditionType('eq')
            ->setValue(CustomerVisitedUrlsInterface::ENABLED)
            ->create();
        $groupFilterDev2 = $this->filterGroup->setFilters([$filterDev2]);

        $sortOrder = $this->sortOrder
            ->setField("created_at")
            ->setDirection("ASC");

        $this->searchCriteriaBuilder->setFilterGroups([$groupFilterDev1, $groupFilterDev2])
            ->setPageSize(5)
            ->setSortOrders([$sortOrder]);

        $searchCriteria = $this->searchCriteriaBuilder->create();

        return $this->repository->getList($searchCriteria);
    }
}
