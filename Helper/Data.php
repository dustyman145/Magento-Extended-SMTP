<?php

namespace Magento\ExtendedSmtp\Helper;

/**
 * @package Magento\ExtendedSmtp\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * Data constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(\Magento\Framework\App\Helper\Context $context)
    {
        parent::__construct($context);
        $this->_scopeConfig = $context->getScopeConfig();
    }

    /**
     * Check if the manual Smtp configuration should be used instead of using the default PHP mail configuration.
     *
     * @param null $storeId
     * @return mixed
     */
    public function isConfigurationEnabled($storeId = null)
    {
        return $this->_scopeConfig->getValue('system/smtp/smtp_configuration/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get the Smtp host configuration.
     *
     * @param null $storeId
     * @return mixed
     */
    public function getHost($storeId = null)
    {
        return $this->_scopeConfig->getValue('system/smtp/smtp_configuration/host', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get the Smtp port configuration.
     *
     * @param null $storeId
     * @return mixed
     */
    public function getPort($storeId = null)
    {
        return $this->_scopeConfig->getValue('system/smtp/smtp_configuration/port', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get the Smtp authentication protocol configuration.
     *
     * @param null $storeId
     * @return mixed
     */
    public function getAuthentication($storeId = null)
    {
        return $this->_scopeConfig->getValue('system/smtp/smtp_configuration/authentication', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get the Smtp login user configuration.
     *
     * @param null $storeId
     * @return mixed
     */
    public function getUsername($storeId = null)
    {
        return $this->_scopeConfig->getValue('system/smtp/smtp_configuration/username', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get the Smtp login password user configuration.
     *
     * @param null $storeId
     * @return mixed
     */
    public function getPassword($storeId = null)
    {
        return $this->_scopeConfig->getValue('system/smtp/smtp_configuration/password', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get the Smtp security protocol configuration.
     *
     * @param null $storeId
     * @return mixed
     */
    public function getProtocol($storeId = null)
    {
        return $this->_scopeConfig->getValue('system/smtp/smtp_configuration/protocol', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get the return path configuration.
     *
     * @param null $storeId
     * @return mixed
     */
    public function getSetReturnPath($storeId = null)
    {
        return $this->_scopeConfig->getValue('system/smtp/set_return_path', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get the email return path configuration.
     *
     * @param null $storeId
     * @return mixed
     */
    public function getEmailReturnPath($storeId = null)
    {
        return $this->_scopeConfig->getValue('system/smtp/return_path_email', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }
}