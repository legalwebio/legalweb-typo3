<?php
namespace legalwebio\Legalwebcookie\Utility;



use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

class MainUtility {
    public static function TFSE () : TypoScriptFrontendController {
        return  $GLOBALS['TSFE'];
    }
    public static function dateStringByFormat ( $format = 'Ymd' ) {
        $date = new \DateTime();
        $date = $date->format($format);
        return $date;
    }
    public static function host () {
        return "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

}