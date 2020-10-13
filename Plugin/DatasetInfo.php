<?php
/**
 * Plugin DatasetInfo
 *
 * @category  Smile
 * @package   MagentoEx/Newsletter
 * @author    Taras Trubaichuk <taras.goglechuk@gmail.com>
 * @copyright 2020 Smile
 */
namespace MagentoEx\Newsletter\Plugin;

/**
 * Class DatasetInfo
 *
 * @package MagentoEx\Newsletter\Plugin
 */
class DatasetInfo
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * After get email
     *
     * @param $object
     * @param $result
     *
     * @return mixed
     */
    public function afterGetEmail($object, $result)
    {
        return $result;
    }

    /**
     * Around get email
     *
     * @param $object
     * @param $realFunction
     *
     * @return \Magento\Framework\Phrase
     */
    public function aroundGetEmail($object, $realFunction)
    {
        $result = $realFunction();

        $data = '';
        $data = $this->scopeConfig->getValue('data_visualization/dataset_info_slr/email_ds_slr');

        return __('%2', $result, $data);
    }

}
