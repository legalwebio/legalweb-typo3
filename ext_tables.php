<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Legalwebio.LegalWebTypo3',
            'Pi1',
            'LegalWebTypo3'
        );


        if (TYPO3_MODE === 'BE') {

            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'Legalwebio.LegalWebTypo3',
                'web', // Make module a submodule of 'web'
                'Pi1', // Submodule key
                '', // Position
                [
                    'Update' => 'list',
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:legal_web_typo3/Resources/Public/Icons/Extension.png',
                    'labels' => 'LLL:EXT:legal_web_typo3/Resources/Private/Language/locallang_legalcookie.xlf',
                ]
            );

        }

        $pluginSignature = str_replace('_', '', 'legalwebtypo3') . '_pi1';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:legal_web_typo3/Configuration/FlexForms/flexform_pi1.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('legal_web_typo3', 'Configuration/TypoScript/', 'Legal Web Typo3');

    }
);
