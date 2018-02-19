<?php

namespace Magento\ExtendedSmtp\Plugin\Magento\Framework\Mail;
/**
 * Class Message
 * @package Magento\ExtendedSmtp\Plugin\Magento\Framework\Mail
 */
class Message
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $_registry;

    /**
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(\Magento\Framework\Registry $registry)
    {
        $this->_registry = $registry;
    }

    /**
     * Register $this
     *
     * @return $this
     */
    public function afterSetBody(\Magento\Framework\Mail\Message $subject, $result)
    {
        $this->_registry->unregister('magento_extended_smtp_message');
        $this->_registry->register('magento_extended_smtp_message', $subject);
        return $result;
    }
}