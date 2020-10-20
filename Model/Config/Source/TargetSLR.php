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
                [
                    'label' => __('Standard Variables'),
                    'value' => [
                    [
                        'label' => __('Income, $'),
                        'value' => self::INCOME
                    ],
                    [
                        'label' => __('Quantity of sold items, n'),
                        'value' => self::SOLD_QUANTITY
                    ]           ]
                ], [
                'label' => __('Derivative Variables'),
                'value' => [
                    [
                        'label' => __('Income dynamic, dx/dy'),
                        'value' => self::INCOME
                    ],
                    [
                        'label' => __('Quantitive dynamic, dx/dy'),
                        'value' => self::SOLD_QUANTITY
                    ]       ]
                ]
            ];
        }
        return self::$_options;
    }
}
