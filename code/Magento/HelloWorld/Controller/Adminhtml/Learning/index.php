<?php

namespace Magento\HelloWorld\Controller\Adminhtml\Learning;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
    protected $_pageFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        echo "Hi Im Dat";
        exit;
//        return $this->_pageFactory->create();
    }
}
