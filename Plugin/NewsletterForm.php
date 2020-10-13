<?php
/**
 * Plugin NewsletterForm
 *
 * @category  Smile
 * @package   MagentoEx\Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Plugin;

/**
 * Class ControllerManageIndexExecute
 *
 * @package MagentoEx\Newsletter\Plugin
 */
class NewsletterForm
{
    /**
     * View
     *
     * @var \Magento\Framework\App\ViewInterface
     */
    private $view;

    /**
     * ControllerManageIndexExecute constructor.
     *
     * @param \Magento\Framework\App\ViewInterface $view
     */
    public function __construct(
        \Magento\Framework\App\ViewInterface $view
    )
    {
        $this->view = $view;
    }

    /**
     * Around plugin implementation
     *
     * @param \Magento\Newsletter\Controller\Manage\Index $subject
     * @param \Closure $closure
     */
    public function aroundExecute($subject, $closure)
    {
        $this->view->loadLayout();
        $this->view->getPage()->getConfig()->getTitle()->set(__('Error 404: Title not found'));
        $this->view->renderLayout();
    }
}
