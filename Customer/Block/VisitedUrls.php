<?php
/**
 * Block VisitedUrls
 *
 * @category  Smile
 * @package   Smile/Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace Smile\Customer\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class Page
 *
 * @package Smile\Course\Block
 */
class VisitedUrls extends Template
{
    /**
     * @var \Smile\Customer\ViewModel\CustomerUrls
     */
    protected $customerUrlsViewModel;

    /**
     * Page constructor.
     *
     * @param Template\Context $context
     * @param \Smile\Customer\ViewModel\CustomerUrls $customerUrlsViewModel
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        \Smile\Customer\ViewModel\CustomerUrls $customerUrlsViewModel,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerUrlsViewModel = $customerUrlsViewModel;
    }

    /**
     * @return mixed
     */
    public function getCustomerUrls()
    {
        return $this->customerUrlsViewModel->getNoLoginCustomerVisitedUrls();
    }

    /**
     * @return mixed
     */
    public function getLastMagentoDevUrls()
    {
        return $this->customerUrlsViewModel->getLastMagentoDevVisitedUrls();
    }

    /**
     * @return mixed
     */
    public function getFirstMagentoDevsUrls()
    {
        return $this->customerUrlsViewModel->getFirstMagentoDevsVisitedUrls();
    }
}
