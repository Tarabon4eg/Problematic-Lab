<?php
/**
 * SearchResult Interface CustomerInfoSearchResultInterface
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CustomerInfoSearchResultInterface
 *
 * @package MagentoEx\Newsletter\Api\Data
 */
interface CustomerInfoSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \MagentoEx\Newsletter\Api\Data\CustomerInfoInterface[]
     */
    public function getItems();

    /**
     * @param \MagentoEx\Newsletter\Api\Data\CustomerInfoInterface[] $items
     * @return void
     */
    public function setItems(array $items);

}
