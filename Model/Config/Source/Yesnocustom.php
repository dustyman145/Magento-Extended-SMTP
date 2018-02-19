<?php

namespace Magento\ExtendedSmtp\Model\Config\Source;

class Yesnocustom implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 1, 'label' => __('From')],
            ['value' => 0, 'label' => __('No')],
            ['value' => 2, 'label' => __('Specified')]
        ];
    }
}