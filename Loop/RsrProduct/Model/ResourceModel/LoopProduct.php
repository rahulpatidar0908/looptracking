<?php

namespace Loop\RsrProduct\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class LoopProduct extends AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('loop_minitracker', 'loop_id');
    }
}