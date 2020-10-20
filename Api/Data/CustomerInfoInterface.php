<?php

/**
 * DTO Interface CustomerInfoInterface
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */
namespace MagentoEx\Newsletter\Api\Data;


/**
 * Interface CustomerInfo
 *
 * @package MagentoEx\Newsletter\Api\Data
 */
interface CustomerInfoInterface
{
    /**#@+
     * Fields
     */
    const ID = 'id';
    const CUSTOMER_ID = 'customer_id';
    const SEX = 'sex';
    const AGE = 'age';
    const NATIONALITY = 'nationality';
    /**#@-*/


    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function getCustomerId() : int;

    /**
     * @return string
     */
    public function getSex() : string;

    /**
     * @return int
     */
    public function getAge() : int;

    /**
     * @return string
     */
    public function getNationality() : string;

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id);

    /**
     * @param int $customerId
     * @return self
     */
    public function setCustomerId(int $customerId) : self;

    /**
     * @param string $sex
     * @return self
     */
    public function setSex(string $sex) : self;

    /**
     * @param int $age
     * @return self
     */
    public function setAge(int $age) : self;

    /**
     * @param string $nationality
     * @return self
     */
    public function setNationality(string $nationality) : self;
}
