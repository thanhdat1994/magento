<?php

namespace Magento\Datlt\Block\Sidebar;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\CategoryRepositoryInterface;

class Category extends Template
{
    protected $_helper;
    protected $_modelFactory;
    protected $_storeManager;
    protected $_categoryRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        \Magento\Catalog\Helper\Category $helper,
        \Magento\Catalog\Model\CategoryFactory $modelFacetory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository
    ) {
        parent::__construct($context, $data);
        $this->_helper = $helper;
        $this->_modelFactory  = $modelFacetory;
        $this->_storeManager = $storeManager;
        $this->_categoryRepository = $categoryRepository;
    }

    public function getStoreCategories()
    {
        return $this->_helper->getStoreCategories();
    }

    public function getChildrenCategories($id)
    {
        $model = $this->_modelFactory->create();

        $category = $model->load($id);

        //Get category collection
        $collection = $category->getCollection()
            ->addIsActiveFilter()
            ->addOrderField('name')
            ->addIdFilter($category->getChildren());
        return $collection;
    }

    public function getUrlCategory($categoryId)
    {
        $category = $this->_categoryRepository->get($categoryId, $this->_storeManager->getStore()->getId());
        return $category->getUrl();
    }
}

