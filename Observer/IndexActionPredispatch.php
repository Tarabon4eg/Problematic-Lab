<?php
/**
 * Observer IndexActionPredispatch
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */
namespace MagentoEx\Newsletter\Observer;

use Magento\Framework\Event\Observer;
use \Magento\Framework\Event\ObserverInterface;

/**
 * Class IndexActionPredispatch
 *
 * @package MagentoEx\Newsletter\Observer
 */
class IndexActionPredispatch implements ObserverInterface
{
    /**
     * Execute
     *
     * @param Observer $observer
     * @return string
     */
    public function execute(Observer $observer)
    {
        $displayText = $observer->getData('obsText');
        $displayText->getText();
        $displayText->setText('The data has been successfully dispatched!');

        return $this;
    }
}
