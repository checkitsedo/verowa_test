<?php
defined('TYPO3_MODE') || die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(
	static function()
	{
		
		ExtensionManagementUtility::addLLrefForTCAdescr(
			'tx_verowatest_domain_model_event',
			'EXT:verowa_test/Resources/Private/Language/locallang_csh_tx_verowatest_domain_model_event.xlf'
		);
		ExtensionManagementUtility::allowTableOnStandardPages(
			'tx_verowatest_domain_model_event'
		);
		
		ExtensionManagementUtility::addLLrefForTCAdescr(
			'tx_verowatest_domain_model_person',
			'EXT:verowa_test/Resources/Private/Language/locallang_csh_tx_verowatest_domain_model_person.xlf'
		);
		ExtensionManagementUtility::allowTableOnStandardPages(
			'tx_verowatest_domain_model_person'
		);
		
		ExtensionManagementUtility::addLLrefForTCAdescr(
			'tx_verowatest_domain_model_room',
			'EXT:verowa_test/Resources/Private/Language/locallang_csh_tx_verowatest_domain_model_room.xlf'
		);
		ExtensionManagementUtility::allowTableOnStandardPages(
			'tx_verowatest_domain_model_room'
		);
		
	}
);
