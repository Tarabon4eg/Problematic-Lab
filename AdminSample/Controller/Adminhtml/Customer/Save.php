<?php

namespace MagentoEx\AdminSample\Controller\Adminhtml\Customer;

use Magento\Customer\Model\CustomerFactory;

class Save extends \Magento\Backend\App\Action
{
    private $customerFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        CustomerFactory $customerFactory
    ) {
        $this->customerFactory = $customerFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->customerFactory->create()
            ->setData($this->getRequest()->getPostValue()['general'])
            ->save();
        return $this->resultRedirectFactory->create()->setPath('magentoex/index/index');
    }
}
