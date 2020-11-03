<?php
/**
 * Repository Interface CustomerVisitedUrlsRepositoryInterface
 *
 * @category  Smile
 * @package   Smile/Customer
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */
namespace Smile\Customer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CustomerVisitedUrlsRepositoryInterface
 *
 * @package Smile\Customer\Api
 */
interface CustomerVisitedUrlsRepositoryInterface
{
    public function getById(int $id);

    public function getByUrl(string $url);

    public function getByClientIp(string $clientIp);

    public function getList(SearchCriteriaInterface $criteria);

    public function deleteById(int $id);

    public function delete(Data\CustomerVisitedUrlsInterface $model);

    public function save(Data\CustomerVisitedUrlsInterface $model);
}
