<?php
/**
 * Plugin ReviewPlugin
 *
 * @category  Smile
 * @package   MagentoEx\Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Plugin;

use Magento\Framework\Controller\ResultFactory;

/**
 * Class ControllerManageIndexExecute
 *
 * @package MagentoEx\Newsletter\Plugin
 */
class ReviewPlugin
{
    /**
     * View
     *
     * @var \Magento\Framework\Controller\ResultFactory
     */
    private $resultFactory;

    /**
     * ControllerManageIndexExecute constructor.
     *
     * @param \Magento\Framework\Controller\ResultFactory $resultFactory
     */
    public function __construct(
        \Magento\Framework\Controller\ResultFactory $resultFactory
    )
    {
        $this->resultFactory = $resultFactory;
    }
    /**
     * Around plugin implementation
     *
     * @param \Magento\Review\Controller\Customer $subject
     * @param \Closure $closure
     */
    public function afterExecute($subject, $closure)
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->getConfig()->getTitle()->set(__('Error 404: Title not found'));
        return $resultPage;
    }
}
