<?php

namespace Loop\RsrProduct\Cron;

class GenerateTrackingCode
{
    const TRACKING_URL = 'https://supertracking.view.agentur-loop.com/trackme';

    public function __construct(
        \Loop\RsrProduct\Model\LoopProductFactory $loopProductFactory,
        \Magento\Framework\HTTP\Client\Curl $curl,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->loopProductFactory = $loopProductFactory;
        $this->_curl = $curl;
        $this->logger = $logger;
    }

    public function execute()
	{
        $collection = $this->loopProductFactory->create()->getCollection();
        $collection->addFieldToFilter(
            'trackingcode',
            ['neq' => 'NULL']
        );

        if($collection->getSize())
        {
            foreach($collection as $item)
            {
                $params = [
                    'sku' => $item->getSku(),
                    'price' => $item->getPrice()
                ];
                
                 
                try {
                    $code = $this->getApiData(json_encode($params));
                    if($code)
                    { 
                        $model =$this->loopProductFactory->create()->load($item->getLoopId());
                        $model->setTrackingcode(isset($code['code'])&&$code['code'] ? $code['code'] : null);
                        $model->setTrackingmessage(isset($code['message'])&&$code['message'] ? $code['message'] : null);
                        $model->save();
                    }
                } catch (\Exception $e) {
                    $this->logger->critical($e->getMessage());
                }
            }
        }
	}

    public function getApiData($params)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => self::TRACKING_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$params,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response,true);
        
        $message = isset($response['message']) && $response['message'] ? $response['message'] : null;
        $code = isset($response['code']) && $response['code'] ? $response['code'] : null;

        return [
            'code' => $code,
            'message' => $message
        ];
    }
}