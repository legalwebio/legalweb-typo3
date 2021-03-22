<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Legalwebio.LegalWebTypo3',
            'Pi1',
            [
                'Cookie' => 'list, imprint, contractWithDrawalService, contractWithDrawalDigital, contractCheckout, contractTerms, dpStatement',
                'Update' => 'execute'
            ],
            // non-cacheable actions
            [
                'Cookie' => 'list, imprint, contractWithDrawalService, contractWithDrawalDigital, contractCheckout, contractTerms, dpStatement',
                'Update' => 'execute'
            ]
        );


    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    pi1 {
                        iconIdentifier = LegalWebTypo3-plugin-pi1
                        title = LLL:EXT:legal_web_typo3/Resources/Private/Language/locallang_db.xlf:tx_legalwebtypo3_pi1.name
                        description = LLL:EXT:legal_web_typo3/Resources/Private/Language/locallang_db.xlf:tx_legalwebtypo3_pi1.description
                        tt_content_defValues {
                            CType = list
                            list_type = legalwebtypo3_pi1
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'LegalWebTypo3-plugin-pi1',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:legal_web_typo3/Resources/Public/Icons/Extension.png']
			);
		
    }
);
