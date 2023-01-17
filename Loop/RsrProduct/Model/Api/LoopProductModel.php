<?php 
namespace Loop\RsrProduct\Model\Api; 

use Psr\Log\LoggerInterface;

class LoopProductModel
{
    protected $logger;
    public function __construct(
        \Loop\RsrProduct\Model\LoopProductFactory $loopProductFactory,
        LoggerInterface $logger
    ) {
        $this->loopProductFactory = $loopProductFactory;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     *
     * @return \Loop\RsrProduct\Api\ResponseItemInterface[]
     */
    public function getList()
    {
        $collection = $this->loopProductFactory->create()->getCollection();
        $result = [];
        foreach($collection as $item)
        {
            $result[] = $item;
        }

        return $result;
    }
}