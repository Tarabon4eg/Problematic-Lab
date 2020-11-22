<?php
/**
 * Controller Add
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
 * Class Add
 *
 * @package Smile\Ratings\Controller\Adminhtml\Customer
 */
class Add extends AbstractAction implements HttpGetActionInterface
{
    /**
     * View acl resource
     */
    const VIEW_ACL_RESOURCE = 'Smile_Ratings::customer_rating_add';

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
     * @return void
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $this->_forward('edit');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::VIEW_ACL_RESOURCE);
    }
}
