<?php
/**
 * Block ContentPageBlock
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class ContentPageBlock
 *
 * @package MagentoEx\Newsletter\Block
 */
class ContentPageBlock extends Template
{
    /**
     * @var ContentPageBlock
     */
    protected $_start = '';

    /**
     * @var ContentPageBlock
     */
    protected $_end = '';

    /**
     * @var ContentPageBlock
     */
    protected $_viewModelObj = '';

    /**
     * ContentPageBlock constructor.
     *
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        array $data = []
    )   {
        parent::__construct($context, $data);
        $this->_start = $this->_data['dateArray']['startDate'];
        $this->_end = $this->_data['dateArray']['endDate'];
        $this->_viewModelObj = $this->_data['objArray']['viewModelContent'];
    }

    /**
     * Get StartDate
     * @return string
     */
    public function getStartDate()
    {
        return $this->_start;
    }

    /**
     * Get EndDate
     * @return string
     */
    public function getEndDate()
    {
        return $this->_end;
    }

    /**
     * Get NewsletterInfo
     * @return string
     */
    public function getNewsletterInfo()
    {
        return $this->_viewModelObj->getNewsletterInfo();
    }

    /**
     * Get Activity
     * @return string
     */
    public function getActivity()
    {
        return $this->_viewModelObj->getActivity();
    }

    /**
     * Get Email
     * Plugin: MagentoEx/Newsletter/Plugin/DatasetInfo
     */
    public function getEmail()
    {
    }
}
