<?php

namespace Yotpo\Yotpo\Block;
use Magento\Store\Model\ScopeInterface;
class Config
{
    const YOTPO_APP_KEY = 'yotpo/settings/app_key';
    const YOTPO_SECRET = 'yotpo/settings/secret';
    const YOTPO_SHOW_WIDGET = 'yotpo/settings/show_widget';

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Config\Model\Resource\Config $resourceConfig
    ) {        
        $this->_scopeConfig = $scopeConfig;
        $this->_resourceConfig = $resourceConfig;
    }

    public function getAppKey()
    {   
        return $this->_scopeConfig->getValue(self::YOTPO_APP_KEY, ScopeInterface::SCOPE_STORE);     
    }

    public function getSecret()
    {        
        return $this->_scopeConfig->getValue(self::YOTPO_SECRET, ScopeInterface::SCOPE_STORE);
    }

    public function getShowWidget()
    {        
        return (bool)$this->_scopeConfig->getValue(self::YOTPO_SHOW_WIDGET, ScopeInterface::SCOPE_STORE);
    } 

    public function setAppKey($val)
    {   //TODO last parameter should probably be store id
        $this->_resourceConfig->saveConfig(self::YOTPO_APP_KEY, $val, ScopeInterface::SCOPE_STORE, 0);
    }

    public function setSecret()
    {        
        $this->_resourceConfig->saveConfig(self::YOTPO_SECRET, $val, ScopeInterface::SCOPE_STORE, 0);
    }

    public function setShowWidget()
    {        
        $this->_resourceConfig->saveConfig(self::YOTPO_SHOW_WIDGET, $val, ScopeInterface::SCOPE_STORE, 0);
    } 

    public function isAppKeyAndSecretSet()
    {        
        return ($this->getAppKey() != null && $this->getSecret() != null);
    }             
}
