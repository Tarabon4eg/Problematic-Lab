<?php
/**
 * Observer BlockPredispatch
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
 * Class BlockPredispatch
 *
 * @package MagentoEx\Newsletter\Observer
 */
class BlockPredispatch implements ObserverInterface
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
    // Observer initialization code...
    // You can use dependency injection to get any class this observer may need.
    }

    /**
     * Execute
     *
     * @param Observer $observer
     * @return string
     */
    public function execute(Observer $observer)
    {
        $blockText = $observer->getData('subsStatus');
        $blockText->setText('Inactive');

        return $blockText;
    }
}
