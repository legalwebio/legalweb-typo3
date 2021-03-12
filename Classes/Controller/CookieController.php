<?php
namespace Legalweb\Legalwebcookie\Controller;
//use Psr\Http\Message\ResponseInterface;
//use TYPO3\CMS\Core\Utility\GeneralUtility;
use Legalweb\Legalwebcookie\Service\CookieService;
use Legalweb\Legalwebcookie\Domain\Model\Response;
use Legalweb\Legalwebcookie\Domain\Respository\ResponseRepository;
use TYPO3\CMS\Core\Page\PageRenderer;
use Legalweb\Legalwebcookie\Utility\MainUtility;
use Legalweb\Legalwebcookie\Utility\Language;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use Legalweb\Legalwebcookie\Service\JsonFileService;

/***
 *
 * This file is part of the "LegalWebCookie" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Legalweb.io <office@legalweb.io>, Legalweb
 *
 ***/
/**
 * CookieController
 */
class CookieController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
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
    
    public function contractWithDrawalServiceAction () : void {
        $data = $this->jsonFileService->fileHandler();
        $isoCode = MainUtility::TFSE()->sys_language_isocode;

        switch ( $isoCode ) {
            case Language::DE:
                $value = $data->services->contractwithdrawalservice->de;
                break;

            case Language::EN:
                $value = $data->services->contractwithdrawalservice->en;
                break;

            case Language::IT:
                $value = $data->services->contractwithdrawalservice->it;
                break;
            case Language::ES:
                $value = $data->services->contractwithdrawalservice->es;
                break;
            case Language::HU:
                $value = $data->services->contractwithdrawalservice->hu;
                break;


            case Language::FR:
                $value = $data->services->contractwithdrawalservice->fr;
                break;
            default:
                $value = $data->services->contractwithdrawalservice->de;
                break;
        }

        $this->view->assign('value' , $value);
    }
    public function contractWithDrawalDigitalAction () : void {
        $data = $this->jsonFileService->fileHandler();
        $isoCode = MainUtility::TFSE()->sys_language_isocode;

        switch ( $isoCode ) {
            case Language::DE:
                $value = $data->services->contractwithdrawaldigital->de;
                break;

            case Language::EN:
                $value = $data->services->contractwithdrawaldigital->en;
                break;

            case Language::IT:
                $value = $data->services->contractwithdrawaldigital->it;
                break;

            case Language::HU:
                $value = $data->services->contractwithdrawaldigital->hu;
                break;

            case Language::ES:
                $value = $data->services->contractwithdrawaldigital->es;
                break;

            case Language::FR:
                $value = $data->services->contractwithdrawaldigital->fr;
                break;
            default:
                $value = $data->services->contractwithdrawaldigital->de;
                break;
        }

        $this->view->assign('value' , $value);
    }
    public function contractCheckoutAction () : void {
        $data = $this->jsonFileService->fileHandler();
        $isoCode = MainUtility::TFSE()->sys_language_isocode;

        switch ( $isoCode ) {
            case Language::DE:
                $value = $data->services->contractcheckout->de;
                break;

            case Language::EN:
                $value = $data->services->contractcheckout->en;
                break;

            case Language::IT:
                $value = $data->services->contractcheckout->it;
                break;

            case Language::HU:
                $value = $data->services->contractcheckout->hu;
                break;
            case Language::ES:
                $value = $data->services->contractcheckout->es;
                break;


            case Language::IT:
                $value = $data->services->contractcheckout->it;
                break;

            case Language::FR:
                $value = $data->services->contractcheckout->fr;
                break;
            default:
                $value = $data->services->contractcheckout->de;
                break;
        }

        $this->view->assign('value' , $value);
    }
    public function contractTermsAction () : void {

        $data = $this->jsonFileService->fileHandler();
        $isoCode = MainUtility::TFSE()->sys_language_isocode;

        switch ( $isoCode ) {
            case Language::DE:
                $value = $data->services->contractterms->de;
                break;

            case Language::EN:
                $value = $data->services->contractterms->en;
                break;

            case Language::FR:
                $value = $data->services->contractterms->fr;
                break;

            case Language::ES:
                $value = $data->services->contractterms->es;
                break;

            case Language::IT:
                $value = $data->services->contractterms->it;
                break;

            case Language::HU:
                $value = $data->services->contractterms->hu;
                break;
            default:
                $value = $data->services->contractterms->de;
                break;
        }

        $this->view->assign('value' , $value);
    }

    public function dpStatementAction () : void {
        $data = $this->jsonFileService->fileHandler();

        $isoCode = MainUtility::TFSE()->sys_language_isocode;

        switch ( $isoCode ) {
            case Language::DE:
                $value = $data->services->dpstatement->de;
                break;

            case Language::EN:
                $value = $data->services->dpstatement->en;
                break;

            case Language::IT:
                $value = $data->services->dpstatement->it;
                break;

            case Language::ES:
                $value = $data->services->dpstatement->es;
                break;

            case Language::HU:
                $value = $data->services->dpstatement->hu;
                break;

            case Language::FR:
                $value = $data->services->dpstatement->fr;
                break;
            default:
                $value = $data->services->dpstatement->de;
                break;
        }
        
        $this->view->assign('value' , $value);
    }

    
    public function imprintAction () : void {

       $data = $this->jsonFileService->fileHandler();

       $isoCode = MainUtility::TFSE()->sys_language_isocode;

        switch ( $isoCode ) {
            case Language::DE:
                $value = $data->services->imprint->de;
                break;

            case Language::EN:
                $value = $data->services->imprint->en;
                break;
            case Language::HU:
                $value = $data->services->imprint->hu;
                break;
            case Language::IT:
                $value = $data->services->imprint->it;
                break;
            case Language::ES:
                $value = $data->services->imprint->es;
                break;
            case Language::FR:
                $value = $data->services->imprint->fr;
                break;

            default:
                $value = $data->services->imprint->de;
                break;
        }

        
        $this->view->assign('value' , $value);
    }


    /**
     * action list
     * 
     * @return void
     */
    public function listAction() : void
    {
        $data = $this->jsonFileService->fileHandler();

        /** @var PageRenderer $pageRenderer */
        $pageRenderer = $this->objectManager->get(PageRenderer::class);
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings);
        if ( (int) $this->settings["showPopup"] ) {
            $pageRenderer->addCssInlineBlock('dppopupcss', $data->services->dppopupcss , false , true );

            $this->view->assign ('spDsgvoGeneralConfig' ,  json_encode ( $data->services->dppopupconfig->spDsgvoGeneralConfig ) );
            $this->view->assign ('spDsgvoIntegrationConfig' ,  json_encode ( $data->services->dppopupconfig->spDsgvoIntegrationConfig ) );

            $this->view->assign('dppopupjs', ($data->services->dppopupjs));
            $this->view->assign('popup', $data->services->dppopup->de);
        }

        $this->view->assign ('sealofApproval', $data->services->dppopup->guetesiegel );


    }

}
