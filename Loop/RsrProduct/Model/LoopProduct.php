<?php

namespace Loop\RsrProduct\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * LoopProduct Model
 *
 * @author      Rahul Patidar
 */
class LoopProduct extends AbstractModel
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime
     */
    protected $_dateTime;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Loop\RsrProduct\Model\ResourceModel\LoopProduct::class);
    }
}