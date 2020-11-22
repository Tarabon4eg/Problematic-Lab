<?php
/**
 * Controller Edit
 *
 * @category  Smile
 * @package   Smile\Ratings
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace Smile\Ratings\Controller\Adminhtml\Customer;

use \Exception;
use Magento\Backend\App\AbstractAction;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Smile\Customer\Api\CustomerVisitedUrlsRepositoryInterface;
use Smile\Customer\Api\Data\CustomerVisitedUrlsInterfaceFactory;

/**
 * Class Save
 *
 * @package Smile\Ratings\Controller\Adminhtml\Customer
 */
class Save extends AbstractAction implements HttpPostActionInterface
{
    /**
     * Grid view acl resource
     */
    const SAVE_ACL_RESOURCE = 'Smile_Ratings::customer_rating_save';

    /**
     * @var CustomerVisitedUrlsInterfaceFactory
     */
    protected $customerVisitedUrlsInterfaceFactory;

    /**
     * @var CustomerVisitedUrlsRepositoryInterface
     */
    protected $customerVisitedUrlsRepository;

    /**
     * Save constructor.
     *
     * @param Action\Context $context
     * @param CustomerVisitedUrlsInterfaceFactory $customerVisitedUrlsInterfaceFactory
     * @param CustomerVisitedUrlsRepositoryInterface $customerVisitedUrlsRepository
     */
    public function __construct(
        Action\Context $context,
        CustomerVisitedUrlsInterfaceFactory $customerVisitedUrlsInterfaceFactory,
        CustomerVisitedUrlsRepositoryInterface $customerVisitedUrlsRepository
    ) {
        parent::__construct($context);
        $this->customerVisitedUrlsInterfaceFactory = $customerVisitedUrlsInterfaceFactory;
        $this->customerVisitedUrlsRepository = $customerVisitedUrlsRepository;
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $model = $this->customerVisitedUrlsInterfaceFactory->create();
        $model->setData($this->getRequest()->getParams());
        try {
            $this->customerVisitedUrlsRepository->save($model);
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $this->_redirect('customer/visited/edit', ['id' => $model->getId()]);
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::SAVE_ACL_RESOURCE);
    }
}
