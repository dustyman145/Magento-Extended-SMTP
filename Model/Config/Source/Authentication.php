<?php

namespace Magento\ExtendedSmtp\Model\Config\Source;

/**
 * Class Authentication
 * @package Magento\ExtendedSmtp\Model\Config\Source
 */
class Authentication implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * to option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => '',
                'label' => __('None')
            ],
            [
                'value' => 'plain',
                'label' => __('PLAIN')
            ],
            [
                'value' => 'login',
                'label' => __('Login')
            ],
            [
                'value' => 'cram-md5',
                'label' => __('CRAM-MD5')
            ],
        ];

        return $options;
    }
}