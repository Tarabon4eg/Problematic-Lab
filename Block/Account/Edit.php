<?php

namespace MagentoEx\Newsletter\Block\Account;


/**
 * Class Edit
 *
 * @package MagentoEx\Newsletter\Block\Account
 */
class Edit extends \Magento\Customer\Controller\Account\Edit
{
    /**
     * Execute
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = parent::execute();
        $resultPage->getConfig()->getTitle()->set(__('The title has been changed by preference'));

        return $resultPage;
    }
}
