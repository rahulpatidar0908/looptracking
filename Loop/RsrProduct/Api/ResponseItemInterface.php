<?php
namespace Loop\RsrProduct\Api; 

/**
 * Interface ResponseItemInterface
 *
 * @api
 */
interface ResponseItemInterface
{
    const DATA_ID = 'loop_id';
    const DATA_SKU = 'sku';
    const DATA_PRICE = 'price';
    const DATA_CODE = 'trackingcode';
    const DATA_MESSAGE = 'trackingmessage';
    const DATA_CREATED = 'created_at';

    /**
     * @return int
     */
    public function getLoopId();

    /**
     * @return string
     */
    public function getSku();

    /**
     * @return string
     */
    public function getPrice();

    /**
     * @return string|null
     */
    public function getTrackingcode();

    /**
     * @return string|null
     */
    public function getTrackingmessage();

    /**
     * @return string
     */
    public function getCreatedAt();

    // optional setters:

    /**
     * @param int $id
     * @return $this
     */
    public function setLoopId(int $id);

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku);

    /**
     * @param string $price
     * @return $this
     */
    public function setPrice(string $price);

    /**
     * @param string $trackingcode
     * @return $this
     */
    public function setTrackingcode(string $trackingcode);

    /**
     * @param string $trackingmessage
     * @return $this
     */
    public function setTrackingmessage(string $trackingmessage);

    /**
     * @param string $createdat
     * @return $this
     */
    public function setCreatedAt(string $createdat);
}
