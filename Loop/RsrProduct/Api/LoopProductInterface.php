<?php
namespace Loop\RsrProduct\Api; 
interface LoopProductInterface
{
    /**
     * GET Data api
     * @return \Loop\RsrProduct\Api\ResponseItemInterface[]
     */
    public function getList();
}
