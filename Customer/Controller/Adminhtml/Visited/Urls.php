<?php
/**
 * Controller Urls
 *
 * @category  Smile
 * @package   Smile\Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace Smile\Customer\Controller\Adminhtml\Visited;

use Magento\Backend\App\AbstractAction;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Urls
 *
 * @package Smile\Customer\Controller\Adminhtml\Visited
 */
class Urls extends AbstractAction implements HttpGetActionInterface
{
    /**
     * Grid view acl resource
     */
    const GRID_VIEW_ACL_RESOURCE = 'Smile_Customer::visited_urls_grid';

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
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Customer Visited Urls'));

        // Set active menu item - optional
        $resultPage->setActiveMenu('Smile_Customer::visited_url_menu');

        return $resultPage;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::GRID_VIEW_ACL_RESOURCE);
    }
}
