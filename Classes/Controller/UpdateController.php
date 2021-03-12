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


    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $result =  $this->jsonFileService->updateHandler();
        //  \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($result);

        $this->view->assign("result" , $result);


    }

    public function executeAction () {

        $result =  $this->jsonFileService->updateHandler();
        

        exit;

/*
        $path = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName("EXT:legalwebcookie/Resources/Public/Json/") ;

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
*/
    }

}