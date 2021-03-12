<?php
namespace Legalweb\Legalwebcookie\Service;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Legalweb\Legalwebcookie\Utility\MainUtility;


class JsonFileService {

    protected $callback;
    protected $guid;


    function __construct() {
        
        $this->configurationManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');
        $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
        $this->guid =  $extbaseFrameworkConfiguration['plugin.']['tx_legalwebcookie_pi1.']['settings.']['guid'];
      
    }
    public function generateCallBackUrl () {
        $host = MainUtility::host();
        return "https://{$host}?tx_legalwebcookie_pi1[action]=execute&tx_legalwebcookie_pi1[controller]=Update&type=1645";
    }


    private function getFilePath () {
        $date = MainUtility::dateStringByFormat('Ymd');

        $path = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName("EXT:legalwebcookie/Resources/Public/Json/data{$date}.json") ;

        return $path;
    }

    private function deleteResources () {
        $path = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName("EXT:legalwebcookie/Resources/Public/Json/") ;

        $files =  array_reverse( GeneralUtility::getFilesInDir($path) );
        $index = 0;
        foreach ( $files as $item ) {
            if ($index) {
                
                if (file_exists($path . $item)) {
                    $result = unlink($path . $item);
                }
            }
            $index++;
        }

    }
    private function isResourceFileExist () {

        if ( file_exists($this->getFilePath() ) ) {
            return true;
        }
        return false;
    }

    private function getResourceData () {

        $file = $this->getFilePath();

        $content = file_get_contents( $file );

        $response = json_decode($content);

        return $response;

    }
    private function setResourceData ( $response ) {

        $file = $this->getFilePath();

        $isSaved = false;

        $isSaved = GeneralUtility::writeFile($file , $response, false);

        return $isSaved;
    }

    private function loadService () {

        /** @var \TYPO3\CMS\Core\Http\RequestFactory $requestFactory */
        $requestFactory = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Http\RequestFactory::class);

        $additionalOptions = [
            'headers' => [
                'Callback' => $this->generateCallBackUrl(),
                'Guid' => $this->guid
            ]
        ];

        $service = $requestFactory->request('https://legalweb.io/api', 'GET', $additionalOptions);

        if ($service->getStatusCode() !== 200) {
            throw new \Exception('Call to https://legalweb.io/api not successfully');
        }

        $response = $service->getBody()->getContents();
        $data = json_decode($response);

        if ($data->message !== null){
            throw new \Exception('Call to https://legalweb.io/api not successfully Response:' .  $data->message);
        }

       return $response;
    }    

    public function fileHandler () {
        $this->deleteResources();
        if ( ! $this->isResourceFileExist() ) {

            $this->setResourceData($this->loadService());
        }
      
        return $this->getResourceData();;
    }
    public function updateHandler () {
        $this->deleteResources();
        $this->setResourceData($this->loadService());
        return $this->getResourceData();
    }


}