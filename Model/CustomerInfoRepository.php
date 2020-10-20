<?php
/**
 * Repository CustomerInfoRepository
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */


namespace MagentoEx\Newsletter\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use MagentoEx\Newsletter\Api\Data\CustomerInfoInterface;
use MagentoEx\Newsletter\Api\Data\CustomerInfoSearchResultInterface;
use MagentoEx\Newsletter\Api\Data\CustomerInfoSearchResultInterfaceFactory;
use MagentoEx\Newsletter\Api\CustomerInfoRepositoryInterface;
use MagentoEx\Newsletter\Model\ResourceModel\CustomerInfo\CollectionFactory as CustomerInfoCollectionFactory;
use MagentoEx\Newsletter\Model\ResourceModel\CustomerInfo\Collection;

/**
 * Class CustomerInfoRepository
 *
 * @package MagentoEx\Newsletter\Model
 */
class CustomerInfoRepository implements CustomerInfoRepositoryInterface
{
    /**
     * @var CustomerInfoFactory
     */
    private $customerInfoFactory;

    /**
     * @var CustomerInfoCollectionFactory
     */
    private $customerInfoCollectionFactory;

    /**
     * @var CustomerInfoSearchResultInterface
     */
    private $searchResultFactory;

    public function __construct(
        CustomerInfoFactory $customerInfoFactory,
        CustomerInfoCollectionFactory $customerInfoCollectionFactory,
        CustomerInfoSearchResultInterfaceFactory $customerInfoSearchResultInterfaceFactory
    ) {
        $this->customerInfoFactory = $customerInfoFactory;
        $this->customerInfoCollectionFactory = $customerInfoCollectionFactory;
        $this->searchResultFactory = $customerInfoSearchResultInterfaceFactory;
    }
    public function getById($id)
    {
        $customerInfo = $this->customerInfoFactory->create();
        $customerInfo->getResource()->load($customerInfo, $id);
        if (! $customerInfo->getId()) {
            throw new NoSuchEntityException(__('Unable to find CustomerID with ID "%1"', $id));
        }
        return $customerInfo;
    }

    public function save(CustomerInfoInterface $customerInfo)
    {
        $customerInfo->getResource()->save($customerInfo);
        return $customerInfo;
    }

    public function delete(CustomerInfoInterface $customerInfo)
    {
        $customerInfo->getResource()->delete($customerInfo);
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->customerInfoCollectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

}
