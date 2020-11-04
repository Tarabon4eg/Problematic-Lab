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
     * CustomerUrls constructor.
     *
     * @param \Smile\Customer\Api\CustomerVisitedUrlsRepositoryInterface $repository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param FilterBuilder $filterBuilder
     * @param SortOrder $sortOrder
     */
    public function __construct(
        \Smile\Customer\Api\CustomerVisitedUrlsRepositoryInterface $repository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        SortOrder $sortOrder
    ) {
        $this->repository = $repository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
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
     * filterGroup OR method
     * with sorting (descending) and pagination
     * @return mixed
     */
    public function getLastMagentoDevVisitedUrls()
    {
        $filterDev1 = $this->filterBuilder
            ->setField(CustomerVisitedUrlsInterface::CUST_ID)
            ->setConditionType('eq')
            ->setValue(1)
            ->create();

        $filterDev2 = $this->filterBuilder
            ->setField(CustomerVisitedUrlsInterface::CUST_ID)
            ->setConditionType('eq')
            ->setValue(2)
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
            ->setValue(1)
            ->create();

        $filterDev2 = $this->filterBuilder
            ->setField(CustomerVisitedUrlsInterface::CUST_ID)
            ->setConditionType('eq')
            ->setValue(2)
            ->create();

        $sortOrder = $this->sortOrder
            ->setField("created_at")
            ->setDirection("ASC");

        $this->searchCriteriaBuilder->setFilterGroups([$filterDev1, $filterDev2])
            ->setPageSize(5)
            ->setSortOrders([$sortOrder]);

        $searchCriteria = $this->searchCriteriaBuilder->create();

        return $this->repository->getList($searchCriteria);
    }
}
