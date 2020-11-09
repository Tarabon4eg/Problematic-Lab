<?php
/**
 * Observer LogVisitedUrlByCustomer
 *
 * @category  Smile
 * @package   Smile\Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace Smile\Customer\Observer;

use Magento\Customer\Model\Session;
use Magento\Customer\Api\GroupRepositoryInterface as CustomerGroupRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterfaceFactory;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\Data\Customer as CustomerModel;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Smile\Customer\Api\CustomerVisitedUrlsRepositoryInterface;
use Smile\Customer\Api\Data\CustomerVisitedUrlsInterfaceFactory;
use Smile\Customer\Api\Data\CustomerVisitedUrlsInterface;

/**
 * Class LogVisitedUrlByCustomer
 *
 * @package Smile\Customer\Observer
 */
class LogVisitedUrlByCustomer implements ObserverInterface
{
    /**
     * @var CustomerVisitedUrlsRepositoryInterface
     */
    protected $customerVisitedUrlsRepository;

    /**
     * @var CustomerVisitedUrlsInterfaceFactory
     */
    protected $visitedUrlsFactory;

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * @var CustomerGroupRepositoryInterface
     */
    protected $customerGroupRepository;

    /**
     * @var CustomerInterfaceFactory
     */
    protected $customerInterfaceFactory;

    /**
     * @var CustomerModel
     */
    protected $customerModel;

    /**
     * LogVisitedUrlByCustomer constructor.
     *
     * @param CustomerVisitedUrlsRepositoryInterface $customerVisitedUrlsRepository
     * @param CustomerVisitedUrlsInterfaceFactory $visitedUrlsFactory
     * @param Session $customerSession
     * @param CustomerInterfaceFactory $customerInterfaceFactory
     * @param CustomerGroupRepositoryInterface $customerGroupRepository
     * @param CustomerModel $customerModel
     */
    public function __construct(
        CustomerVisitedUrlsRepositoryInterface $customerVisitedUrlsRepository,
        CustomerVisitedUrlsInterfaceFactory $visitedUrlsFactory,
        Session $customerSession,
        CustomerGroupRepositoryInterface $customerGroupRepository,
        CustomerInterfaceFactory $customerInterfaceFactory,
        CustomerModel $customerModel
    ) {
        $this->customerVisitedUrlsRepository = $customerVisitedUrlsRepository;
        $this->visitedUrlsFactory = $visitedUrlsFactory;
        $this->customerSession = $customerSession;
        $this->customerGroupRepository = $customerGroupRepository;
        $this->customerInterfaceFactory = $customerInterfaceFactory;
        $this->customerModel = $customerModel;
    }

    /**
     * @inheritDoc
     *
     */
    public function execute(Observer $observer)
    {
        /** @var Http $request */
        $request = $observer->getRequest();

        $model = $this->visitedUrlsFactory->create();
        $model->setCustId($this->customerSession->getCustomerId())
            ->setVisitedUrl($request->getRequestUri())
            ->setUrlTitle($request->getRouteName())
            ->setClientIp($request->getClientIp())
            ->setIsActive(CustomerVisitedUrlsInterface::ENABLED);

        $this->customerVisitedUrlsRepository->save($model);
    }
}
