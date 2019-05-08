<?php

namespace Ajaxsearch\Iverve\Block\Ivervesearch;


class ajaxsearch extends \Magento\Framework\View\Element\Template
{    
    protected $_categoryFactory;
    protected $_productloader;
    protected $_storeManager;
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Catalog\Model\ProductFactory $_productloader,
        \Magento\Store\Model\StoreManagerInterface $storemanager,
        array $data = []
    )
    {    
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
        $this->_productloader = $_productloader;
        $this->_storeManager =  $storemanager;
    }
    
    public function getCategory($categoryId) 
    {
        $category = $this->_categoryFactory->create();
        $category->load($categoryId);
        return $category;
    }
    
    public function getCategoryProducts($categoryId) 
    {
        $products = $this->getCategory($categoryId)->getProductCollection();
        $products->addAttributeToSelect('*');
        return $products;
    }
    Public function getProductImageUsingCode($productId)
    {
        $store = $this->_storeManager->getStore();
        $product1 = $this->_productloader->create()->load($productId);
         
        $productImageUrl = $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'catalog/product' .$product1->getImage();
        $productUrl = $product->getProductUrl();
        return $productUrl;
    }
}
?>