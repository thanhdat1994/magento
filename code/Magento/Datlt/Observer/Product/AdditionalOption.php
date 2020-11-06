<?php

namespace Magento\Datlt\Observer\Product;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\App\RequestInterface;

class AdditionalOption implements ObserverInterface
{
    protected $_request;
    protected $serializer;

    public function __construct(RequestInterface $request, Json $serializer)
    {
        $this->_request = $request;
        $this->serializer = $serializer ?: \Magento\Framework\App\ObjectManager::getInstance()
            ->get(\Magento\Framework\Serialize\Serializer\Json::class);
    }

    public function execute(Observer $observer)
    {
        $date = $this->_request->getParam('delivery-date');
        $product = $observer->getProduct();
        $additionalOptions = [];
        $additionalOptions[] = array(
            'label' => "Date of delivery: ",
            'value' => $date,
        );
        $product->addCustomOption('additional_options', $this->serializer->serialize($additionalOptions));
    }
}
