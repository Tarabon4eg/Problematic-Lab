<?php
/**
 * Repository CustomerEconometryRepository
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */


namespace MagentoEx\Newsletter\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Exception\NoSuchEntityException;
use MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface;
use MagentoEx\Newsletter\Api\Data\CustomerEconometrySearchResultInterface;
use MagentoEx\Newsletter\Api\Data\CustomerEconometrySearchResultInterfaceFactory;
use MagentoEx\Newsletter\Api\CustomerEconometryRepositoryInterface;
use MagentoEx\Newsletter\Model\ResourceModel\CustomerEconometry as CustomerEconometryResource;
use MagentoEx\Newsletter\Model\ResourceModel\CustomerEconometry\CollectionFactory as CustomerEconometryCollectionFactory;
use MagentoEx\Newsletter\Model\ResourceModel\CustomerEconometry\Collection as CustomerEconometryCollection;
use MagentoEx\Newsletter\Model\CustomerEconometry;


/**
 * Class CustomerEconometryRepository
 *
 * @package MagentoEx\Newsletter\Model
 */
class CustomerEconometryRepository implements CustomerEconometryRepositoryInterface
{
    /**
     * @var array
     */
    private $registry = [];

    /**
     * @var CustomerEconometryResource
     */
    private $customerEconometryResource;

    /**
     * @var CustomerEconometryFactory
     */
    private $customerEconometryFactory;

    /**
     * @var CustomerEconometryCollectionFactory
     */
    private $customerEconometryCollectionFactory;

    /**
     * @var CustomerEconometrySearchResultInterfaceFactory
     */
    private $customerEconometrySearchResultFactory;

    /**
     * @param CustomerEconometryResource $customerEconometryResource
     * @param CustomerEconometryFactory $customerEconometryFactory
     * @param CustomerEconometryCollectionFactory $customerEconometryCollectionFactory
     * @param CustomerEconometrySearchResultInterfaceFactory $customerEconometrySearchResultFactory
     */
    public function __construct(
        CustomerEconometryResource $customerEconometryResource,
        CustomerEconometryFactory $customerEconometryFactory,
        CustomerEconometryCollectionFactory $customerEconometryCollectionFactory,
        CustomerEconometrySearchResultInterfaceFactory $customerEconometrySearchResultFactory
    ) {
        $this->customerEconometryResource = $customerEconometryResource;
        $this->customerEconometryFactory = $customerEconometryFactory;
        $this->customerEconometryCollectionFactory = $customerEconometryCollectionFactory;
        $this->customerEconometrySearchResultFactory = $customerEconometrySearchResultFactory;
    }

    /**
     * @param int $econId
     * @return CustomerEconometryInterface
     * @throws NoSuchEntityException
     */
    public function get(int $econId)
    {
        if (!array_key_exists($econId, $this->registry)) {
            $customerEconometry = $this->customerEconometryFactory->create();
            $this->customerEconometryResource->load($customerEconometry, $econId);
            if (!$customerEconometry->getEconId()) {
                throw new NoSuchEntityException(__('Requested Customer Econometric Info does not exist'));
            }
            $this->registry[$econId] = $customerEconometry;
        }

        return $this->registry[$econId];
    }


    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \MagentoEx\Newsletter\Api\Data\CustomerEconometrySearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var CustomerEconometryCollection $collection */
        $collection = $this->customerEconometryCollectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }

        /** @var CustomerEconometrySearchResultInterface $searchResult */
        $searchResult = $this->customerEconometrySearchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }

    /**
     * @param \MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface $customerEconometry
     * @return CustomerEconometryInterface
     * @throws StateException
     */
    public function save(CustomerEconometryInterface $customerEconometry)
    {
        try {
            /** @var CustomerEconometry $customerEconometry */
            $this->customerEconometryResource->save($customerEconometry);
            $this->registry[$customerEconometry->getEconId()] = $this->get($customerEconometry->getEconId());
        } catch (\Exception $exception) {
            throw new StateException(__('Unable to save post #%1', $customerEconometry->getEconId()));
        }
        return $this->registry[$customerEconometry->getEconId()];
    }

    /**
     * @param \MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface $customerEconometry
     * @return bool
     * @throws StateException
     */
    public function delete(CustomerEconometryInterface $customerEconometry)
    {
        try {
            /** @var CustomerEconometry $customerEconometry */
            $this->customerEconometryResource->delete($customerEconometry);
            unset($this->registry[$customerEconometry->getEconId()]);
        } catch (\Exception $e) {
            throw new StateException(__('Unable to remove post #%1', $customerEconometry->getEconId()));
        }

        return true;
    }

    /**
     * @param int $econId
     * @return bool
     */
    public function deleteById(int $econId)
    {
        return $this->delete($this->get($econId));
    }

}
