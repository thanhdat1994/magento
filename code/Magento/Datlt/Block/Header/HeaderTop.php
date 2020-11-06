<?php

namespace Magento\Datlt\Block\Header;

use Magento\Framework\View\Element\Template;

class HeaderTop extends \Magento\Framework\View\Element\Template
{
    protected function _beforeToHtml()
    {
        $config = $this->_scopeConfig;
        $phone = $config->getValue('general/store_information/phone');
        $email = $config->getValue('trans_email/ident_general/email');
        $facebook = $config->getValue('social/social_config/facebook');
        $twitter = $config->getValue('social/social_config/twitter');
        $this->setData('phone', $phone);
        $this->setData('email', $email);
        $this->setData('facebook', $facebook);
        $this->setData('twitter', $twitter);
    }
}
