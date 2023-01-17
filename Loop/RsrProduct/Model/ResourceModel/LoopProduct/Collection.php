<?php

namespace Loop\RsrProduct\Model\ResourceModel\LoopProduct;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Loop\RsrProduct\Model\LoopProduct', 'Loop\RsrProduct\Model\ResourceModel\LoopProduct');
    }
}
