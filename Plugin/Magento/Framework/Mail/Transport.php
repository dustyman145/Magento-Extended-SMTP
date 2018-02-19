<?php

namespace Magento\ExtendedSmtp\Plugin\Magento\Framework\Mail;

class Transport extends \Zend_Mail_Transport_Smtp
{
    /**
     * @var \Magento\ExtendedSmtp\Helper\Data
     */
    private $_dataHelper;

    /**
     * @var \Magento\Framework\Encryption\EncryptorInterface
     */
    private $_encryptor;

    /**
     * @var \Magento\Framework\Registry
     */
    private $_registry;

    /**
     * @param \Magento\ExtendedSmtp\Helper\Data $dataHelper
     * @param \Magento\Framework\Encryption\EncryptorInterface $encryptor
     */
    public function __construct(
        \Magento\ExtendedSmtp\Helper\Data $dataHelper,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor,
        \Magento\Framework\Registry $registry
    )
    {
        $this->_dataHelper = $dataHelper;
        $this->_encryptor = $encryptor;
        $this->_registry = $registry;
    }

    /**
     * @param \Magento\Framework\Mail\TransportInterface $subject
     * @param \Closure $proceed
     */
    public function aroundSendMessage(\Magento\Framework\Mail\TransportInterface $subject, \Closure $proceed)
    {
        if ($this->_dataHelper->isConfigurationEnabled()) {
            $message = $this->_registry->registry('magento_extended_smtp_message');
            $this->sendSmtpMessage($message);
        } else {
            $proceed();
        }
    }

    /**
     * Send a mail using this transport
     *
     * @param \Magento\Framework\Mail\MessageInterface $message
     * @throws \Magento\Framework\Exception\MailException
     */
    public function sendSmtpMessage(
        \Magento\Framework\Mail\MessageInterface $message
    )
    {
        $setReturnPath = $this->_dataHelper->getSetReturnPath();
        switch ($setReturnPath) {
            case 1:
                $message->setReturnPath($message->getFrom());
                break;
            case 2:
                $message->setReturnPath(trim($this->_dataHelper->getEmailReturnPath()));
                break;
            default:
                $message->setReturnPath(null);
                break;
        }

        $host = $this->_dataHelper->getHost();
        $config = array('port' => $this->_dataHelper->getPort());

        $auth = $this->_dataHelper->getAuthentication();
        if ($auth === 'plain' || $auth === 'login' || $auth === 'cram-md5') {
            $config['auth'] = $auth;
            $config['username'] = $this->_dataHelper->getUsername();
            $config['password'] = $this->_encryptor->decrypt($this->_dataHelper->getpassword());
        }

        $ssl = $this->_dataHelper->getProtocol();
        if ($ssl === 'ssl' || $ssl === 'tls') {
            $config['ssl'] = $ssl;
        }

        parent::__construct($host, $config);
        try {
            parent::send($message);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\MailException(new \Magento\Framework\Phrase($e->getMessage()), $e);
        }
    }
}