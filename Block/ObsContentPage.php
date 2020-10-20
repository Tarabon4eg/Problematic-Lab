<?php
/**
 * Block ObsContentPage
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Event\ManagerInterface as EventManager;

/**
 * Class ContentPageBlock
 *
 * @package MagentoEx\Newsletter\Block
 */
class ObsContentPage extends Template
    {
    /**
    * @var EventManager
    */
    private $eventManager;

    /**
     * ObsContentPage constructor.
     * @param EventManager $eventManager
     * @param Template\Context $context
     */
    public function __construct(
        EventManager $eventManager,
        Template\Context $context
    )   {
        parent::__construct($context);
        $this->eventManager = $eventManager;
    }

    /**
     * Execute
     * @return string
     */
    public function execute()
    {
        $eventData = new \Magento\Framework\DataObject(array('key1' => 'Active'));
        $this->eventManager->dispatch('block_predispatch_data', ['userStatus' => $eventData]);

        return $eventData->getData('key1');
    }
}

