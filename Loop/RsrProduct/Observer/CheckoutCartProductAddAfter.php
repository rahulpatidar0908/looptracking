<?php
namespace Loop\RsrProduct\Observer;

use Magento\Framework\Event\ObserverInterface;

class CheckoutCartProductAddAfter implements ObserverInterface
{
    public function __construct(
        \Loop\RsrProduct\Model\LoopProductFactory $loopProductFactory,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->loopProductFactory = $loopProductFactory;
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer) {
        try {
            $item = $observer->getEvent()->getData('quote_item');         
            $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
            $loopProduct = $this->loopProductFactory->create();
            $loopProduct->setSku($item->getSku());
            $loopProduct->setPrice($item->getPrice());
            $loopProduct->save();
        } catch (\Exception $e) {
            $this->logger->critical($e->getMessage());
        }
    }
}