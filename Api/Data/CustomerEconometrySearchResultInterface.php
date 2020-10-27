<?php
/**
 * SearchResult Interface CustomerEconometrySearchResultInterface
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace MagentoEx\Newsletter\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CustomerEconometrySearchResultInterface
 *
 * @package MagentoEx\Newsletter\Api\Data
 */
interface CustomerEconometrySearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface[]
     */
    public function getItems();

    /**
     * @param \MagentoEx\Newsletter\Api\Data\CustomerEconometryInterface[] $items
     * @return $this
     */
    public function setItems(array $items);

}
