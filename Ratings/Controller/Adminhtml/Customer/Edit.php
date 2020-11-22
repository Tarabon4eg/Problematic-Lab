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

use Magento\Backend\App\AbstractAction;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Edit
 *
 * @package Smile\Ratings\Controller\Adminhtml\Customer
 */
class Edit extends AbstractAction implements HttpGetActionInterface
{
    /**
     * Grid view acl resource
     */
    const VIEW_ACL_RESOURCE = 'Smile_Ratings::customer_rating_edit';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Urls constructor.
     *
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
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
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Customer Ratings'));

        // Set active menu item - optional
        $resultPage->setActiveMenu('Smile_Ratings::customer_rating_menu');

        return $resultPage;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::VIEW_ACL_RESOURCE);
    }
}
