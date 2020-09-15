<?php
namespace Legalweb\Legalwebcookie\Controller;

use Legalweb\Legalwebcookie\Service\CookieService;
use Legalweb\Legalwebcookie\Service\JsonFileService;
use TYPO3\CMS\Core\Utility\GeneralUtility;


class UpdateController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * JsonFileService
     *
     * @var \Legalweb\Legalwebcookie\Service\JsonFileService
     */
    protected $jsonFileService = null;


    /**
     * @param JsonFileService $jsonFileService
     */
    public function injectJsonFileService(JsonFileService $jsonFileService)
    {
        $this->jsonFileService = $jsonFileService;
    }


    public function executeAction () {

        $result =  $this->jsonFileService->fileHandler();

        //     http://p549567.webspaceconfig.de/?tx_legealwebcookie_pi1[action]=execute&tx_legealwebcookie_pi1[controller]=Update&type=1645

        $path = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName("EXT:legalwebcookie/Resources/Public/Json/") ;

/*
        $resourceFactory = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Resource\ResourceFactory::class);
        $defaultStorage = $resourceFactory->getDefaultStorage();

        $folder = $defaultStorage->getFolder("/typo3conf/ext/legalwebcookie/Resources/Public/Json/");
        $files = $defaultStorage->getFilesInFolder($folder);

*/

        $files =  array_reverse( GeneralUtility::getFilesInDir($path) );
        $index = 0;
       foreach ( $files as $item ) {
           if ($index) {

              // $item = $files[$i];
               \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($item);

               if (file_exists($path . $item)) {
                   $result = unlink($path . $item);
               }
           }
            $index++;
        }

        exit;
        /*
        $response = [];
        if ($result->getStatusCode() === 200) {
            
            $response = [
                'success' => 1
            ];
        }
        else {
            $response = ['success' => 0 ];
        }


        return json_encode($response);
*/
    }

}