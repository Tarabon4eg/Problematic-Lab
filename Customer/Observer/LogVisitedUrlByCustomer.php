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
use Magento\Customer\Block\Account\Dashboard\Info as AccountDashboardInfo;
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
     * @var AccountDashboardInfo
     */
    protected $customerAccountInfo;

    /**
     * LogVisitedUrlByCustomer constructor.
     *
     * @param CustomerVisitedUrlsRepositoryInterface $customerVisitedUrlsRepository
     * @param CustomerVisitedUrlsInterfaceFactory $visitedUrlsFactory
     * @param Session $customerSession
     * @param AccountDashboardInfo $customerAccountInfo
     */
    public function __construct(
        CustomerVisitedUrlsRepositoryInterface $customerVisitedUrlsRepository,
        CustomerVisitedUrlsInterfaceFactory $visitedUrlsFactory,
        Session $customerSession,
        AccountDashboardInfo $customerAccountInfo
    ) {
        $this->customerVisitedUrlsRepository = $customerVisitedUrlsRepository;
        $this->visitedUrlsFactory = $visitedUrlsFactory;
        $this->customerSession = $customerSession;
        $this->customerAccountInfo = $customerAccountInfo;
    }

    /**
     * @inheritDoc
     */
    public function execute(Observer $observer)
    {
        /** @var Http $request */
        $request = $observer->getRequest();
        $model = $this->visitedUrlsFactory->create();
        $model->setCustomerId($this->customerSession->getCustomerId())
            ->setVisitedUrl($request->getRequestUri())
            ->setUrlTitle($request->getRouteName())
            ->setClientIp($request->getClientIp())
            ->setIsActive(CustomerVisitedUrlsInterface::ENABLED);
        $this->customerVisitedUrlsRepository->save($model);

        $userNameModel = $this->visitedUrlsFactory->create();
        if (!$this->customerAccountInfo->getName()) {
            $userNameModel = 'Unathorized user';
        } else {
            $userNameModel->setCustomerName($this->customerAccountInfo->getName());
        }
        $this->customerVisitedUrlsRepository->save($userNameModel);
    }
}
