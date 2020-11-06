<?php

namespace Magento\BannerSlider\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class BannerSlider extends Template implements BlockInterface
{
    /**
     * @var \Magento\BannerSlider\Model\BannerFactory
     */
    protected $bannerFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\BannerSlider\Model\BannerFactory $bannerFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\BannerSlider\Model\BannerFactory $bannerFactory,
        array $data = []
    ) {
        $this->bannerFactory = $bannerFactory;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve the banners slider
     *
     * @param \Magento\BannerSlider\Model\Banner[]
     */
    public function getBanners()
    {
        $groupId = (int)$this->getGroupId();
        $collection = $this->bannerFactory->create()->getCollection()->addFieldToFilter(
            'group_id', $groupId
        )->addFieldToFilter(
            'status', \Magento\BannerSlider\Model\Banner::STATUS_ENABLED
        )->setOrder('main_table.order', 'ASC');
        return $collection;
    }
}
