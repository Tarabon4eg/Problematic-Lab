<?php
/**
 * SearchResult Interface CustomerVisitedUrlsSearchResultInterface
 *
 * @category  Smile
 * @package   Smile\Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */

namespace Smile\Customer\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CustomerVisitedUrlsSearchResultInterface
 *
 * @package Smile\Customer\Api\Data
 */
interface CustomerVisitedUrlsSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Smile\Customer\Api\Data\CustomerVisitedUrlsInterface[]
     */
    public function getItems();

    /**
     * @param \Smile\Customer\Api\Data\CustomerVisitedUrlsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);

}
