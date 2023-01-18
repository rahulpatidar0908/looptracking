## **Installation**
1. - Download the latest Loop RsrProduct installation package loop-rsrPproduct [here](https://github.com/rahulpatidar0908/looptracking.git)
      - Navigate to your Magento app/code folder<br />
          `cd path_to_the_magento_app_code`<br />
      - Upload contents of the Loop RsrProducts installation package to your Magento Extension directory
      - Then run the following command<br />
          `php bin/magento module:enable Loop_RsrProduct`<br />
   
- After installing the extension, run the following command
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush


Note: I also attached the Estimation.txt file for the estimation.