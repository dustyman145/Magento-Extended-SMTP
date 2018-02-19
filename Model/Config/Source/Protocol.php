<?php

namespace Magento\ExtendedSmtp\Model\Config\Source;

/**
 * Class Protocol
 * @package Magento\ExtendedSmtp\Model\Config\Source
 */
class Protocol implements \Magento\Framework\Option\ArrayInterface
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
				'value' => 'ssl',
				'label' => __('SSL')
			],
			[
				'value' => 'tls',
				'label' => __('TLS')
			],
		];

		return $options;
	}
}
