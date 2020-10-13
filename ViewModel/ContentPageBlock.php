<?php
/**
 * Block ContentPageBlock
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\ViewModel;

/**
 * Class Page
 *
 * @package MagentoEx\Newsletter\ViewModel
 */
class ContentPageBlock implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * Get NewsletterInfo
     * @return string
     */
    public function getNewsletterInfo()
    {
        return __('This newsletter is used for receiving information about sales and new items in our shop.');
    }

    /**
     * Get Activity
     * @return string
     */
    public function getActivity()
    {
        return __('Daily');
    }
}
