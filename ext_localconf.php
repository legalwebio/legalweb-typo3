<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Legalweb.Legalwebcookie',
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
                        iconIdentifier = legalwebcookie-plugin-pi1
                        title = LLL:EXT:legalwebcookie/Resources/Private/Language/locallang_db.xlf:tx_legalwebcookie_pi1.name
                        description = LLL:EXT:legalwebcookie/Resources/Private/Language/locallang_db.xlf:tx_legalwebcookie_pi1.description
                        tt_content_defValues {
                            CType = list
                            list_type = legalwebcookie_pi1
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'legalwebcookie-plugin-pi1',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:legalwebcookie/Resources/Public/Icons/Extensions.png']
			);
		
    }
);
