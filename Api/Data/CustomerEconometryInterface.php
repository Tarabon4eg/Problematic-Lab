<?php

/**
 * DTO Interface CustomerEconometry
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */
namespace MagentoEx\Newsletter\Api\Data;


/**
 * Interface CustomerEconometry
 *
 * @package MagentoEx\Newsletter\Api\Data
 * @api
 */
interface CustomerEconometryInterface
{
    /**#@+
     * Fields
     */
    const CUST_ID = 'cust_id';
    const INCOME_MONTH = 'income_month';
    const CUST_PROFIT = 'cust_profit';
    const CUST_ITEMS = 'cust_items';
    /**#@-*/


    /**
     * @return int
     */
    public function getCustId();

    /**
     * @return int
     */
    public function getIncomeMonth() : int;

    /**
     * @return int
     */
    public function getCustProfit() : int;

    /**
     * @return int
     */
    public function getCustItems() : int;

    /**
     * @param int $custId
     * @return void
     */
    public function setCustId(int $custId);

    /**
     * @param int $incomeMonth
     * @return self
     */
    public function setIncomeMonth(int $incomeMonth) : self;

    /**
     * @param int $custProfit
     * @return self
     */
    public function setCustProfit(int $custProfit) : self;

    /**
     * @param int $custItems
     * @return self
     */
    public function setCustItems(int $custItems) : self;


}
