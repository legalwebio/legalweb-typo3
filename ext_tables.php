<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'legalwebio.Legalwebcookie',
            'Pi1',
            'LegalWebCookie'
        );


        if (TYPO3_MODE === 'BE') {

            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'legalwebio.Legalwebcookie',
                'web', // Make module a submodule of 'web'
                'Pi1', // Submodule key
                '', // Position
                [
                    'Update' => 'list',
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:legalwebcookie/Resources/Public/Icons/Extension.png',
                    'labels' => 'LLL:EXT:legalwebcookie/Resources/Private/Language/locallang_legalcookie.xlf',
                ]
            );

        }

        $pluginSignature = str_replace('_', '', 'legalwebcookie') . '_pi1';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:legalwebcookie/Configuration/FlexForms/flexform_pi1.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('legalwebcookie', 'Configuration/TypoScript', 'LegalWebCookie');

    }
);
