<?php

namespace MagentoEx\Newsletter\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;

/**
 * Class Index
 *
 * @package MagentoEx\Newsletter\Controller\Index
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var EventManager
     */
    private $eventManager;


    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param EventManager $eventManager
     */

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        EventManager $eventManager
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->eventManager = $eventManager;
    }

    /**
     * Execute
    * @return \Magento\Framework\View\Result\Page
    */
    public function execute()
    {
        $page = $this->resultPageFactory->create();
        $page->getLayout()->getUpdate()->addHandle('newsletter_index_index');

        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'The data is prepared for dispatching'));
        $this->eventManager->dispatch('controller_action_predispatch_newsletter_index_index',
            ['obsText' => $textDisplay]);

        return $page;
    }
}
