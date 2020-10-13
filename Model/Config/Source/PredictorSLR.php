<?php

namespace MagentoEx\Newsletter\Model\Config\Source;

/**
 * Class PredictorSLR
 *
 * @package MagentoEx\Newsletter\Model\Config\Source
 */
class PredictorSLR implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var array
     */
    protected static $_options;

    const SEX = 'S';

    const PRICE_CATEGORY = 'PC';

    const ITEMS_TYPE = 'IT';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        if (!self::$_options) {
            self::$_options = [
                ['label' => __('Sex'), 'value' => self::SEX],
                ['label' => __('Price Category'), 'value' => self::PRICE_CATEGORY],
                ['label' => __('Items Type'), 'value' => self::ITEMS_TYPE],
            ];
        }
        return self::$_options;
    }
}
