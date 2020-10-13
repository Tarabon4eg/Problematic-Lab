<?php

namespace MagentoEx\Newsletter\Model\Config\Source;

/**
 * Class UserCategory
 *
 * @package MagentoEx\Newsletter\Model\Config\Source
 */
class UserCategory implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var array
     */
    protected static $_options;

    const LOGINED = 'L';

    const EVERYONE = 'E';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        if (!self::$_options) {
            self::$_options = [
                ['label' => __('Only Authorized Users'), 'value' => self::LOGINED],
                ['label' => __('Only Users from white list'), 'value' => self::EVERYONE]
            ];
        }
        return self::$_options;
    }
}
