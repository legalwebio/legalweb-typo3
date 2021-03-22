<?php
namespace legalwebio\Legalwebcookie\Controller;

use legalwebio\Legalwebcookie\Service\CookieService;
use legalwebio\Legalwebcookie\Service\JsonFileService;
use TYPO3\CMS\Core\Utility\GeneralUtility;


class UpdateController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * JsonFileService
     *
     * @var \legalwebio\Legalwebcookie\Service\JsonFileService
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

        $this->view->assign("result" , $result);


    }

    public function executeAction () {

        $result =  $this->jsonFileService->updateHandler();
        

        exit;

    }

}