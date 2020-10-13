<?php

namespace MagentoEx\Newsletter\Model\Config\Source;

/**
 * Class TargetSLR
 *
 * @package MagentoEx\Newsletter\Model\Config\Source
 */
class TargetSLR implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var array
     */
    protected static $_options;

    const INCOME = 'i';

    const SOLD_QUANTITY = 'sq';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        if (!self::$_options) {
            self::$_options = [
                ['label' => __('Income, $'), 'value' => self::INCOME],
                ['label' => __('Quantity of sold items, n'), 'value' => self::SOLD_QUANTITY]
            ];
        }
        return self::$_options;
    }
}
