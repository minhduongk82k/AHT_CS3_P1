<?php

namespace AHT\ShopByBrand\Block\Frontend\Brand;

class Index extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \AHT\ShopByBrand\Model\ResourceModel\Brand\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \AHT\ShopByBrand\Model\ResourceModel\Brand\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function showBrandCollection()
    {
        $valueConfig = \Magento\Framework\App\ObjectManager::getInstance()
            ->get(\Magento\Framework\App\Config\ScopeConfigInterface::class)
            ->getValue(
                'brand/showbrand/showbrand_enable',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            );
        return $valueConfig == 1 ? $this->collectionFactory->create()->addFieldToFilter('status', 1) : false;
    }
}
