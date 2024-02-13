<?php
return [
	'ctrl' => [
		'title' => 'LLL:EXT:verowa_test/Resources/Private/Language/locallang_db.xlf:tx_verowatest_domain_model_room',
		'label' => 'id',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'versioningWS' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		],
		'searchFields' => 'id,location_name,location_url,location_address,location_postcode,location_city,name',
		'iconfile' => 'EXT:verowa_test/Resources/Public/Icons/tx_verowatest_domain_model_room.gif'
	],
	'external' => [
		'general' => [
			0 => [
				'connector' => 'json',
				'parameters' => [
					'uri' => 'https://api.verowa.ch/getrooms/stjosef-zuerich/1ad89c27e1a89ef6aa34f34e4adf7448',
					'encoding' => 'utf-8',
					'headers' => [
						'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:75.0) Gecko/20100101 Firefox/75.0',
						'Accept' => 'application/json'
					],
				],
				'data' => 'array',
				'referenceUid' => 'room_id',
				'group' => 'stjoseftest',
				'priority' => 10,
				'description' => 'Import of all events from Verowa'
			],
		],
	],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, id, location_name, location_url, location_address, location_postcode, location_city, name, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
	],
	'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					],
				],
				'default' => 0,
			],
		],
		'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'default' => 0,
				'items' => [
					['', 0],
				],
				'foreign_table' => 'tx_verowatest_domain_model_room',
				'foreign_table_where' => 'AND {#tx_verowatest_domain_model_room}.{#pid}=###CURRENT_PID### AND {#tx_verowatest_domain_model_room}.{#sys_language_uid} IN (-1,0)',
			],
		],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
		'hidden' => [
			'exclude' => true,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
			'config' => [
				'type' => 'check',
				'renderType' => 'checkboxToggle',
				'items' => [
					[
						0 => '',
						1 => '',
						'invertStateDisplay' => true
					],
				],
			],
		],
		'starttime' => [
			'exclude' => true,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'eval' => 'datetime,int',
				'default' => 0,
				'behaviour' => [
					'allowLanguageSynchronization' => true
				],
			],
		],
		'endtime' => [
			'exclude' => true,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'eval' => 'datetime,int',
				'default' => 0,
				'range' => [
					'upper' => mktime(0, 0, 0, 1, 1, 2038)
				],
				'behaviour' => [
					'allowLanguageSynchronization' => true
				],
			],
		],

		'id' => [
			'exclude' => true,
			'label' => 'Id',
			'config' => [
				'type' => 'input',
			],
			'external' => [
				0 => [
					'field' => 'room_id'
				],
			],
		],
		'location_name' => [
			'exclude' => true,
			'label' => 'Location name',
			'config' => [
				'type' => 'input',
				'size' => 50,
				'max' => 255,
				'eval' => 'trim',
			],
			'external' => [
				0 => [
					'field' => 'location_name'
				],
			],
		],
    'location_url' => [
			'exclude' => true,
			'label' => 'Location URL',
			'config' => [
				'type' => 'input',
				'size' => 50,
				'max' => 255,
				'eval' => 'trim',
			],
			'external' => [
				0 => [
					'field' => 'location_url'
				],
			],
		],
    'location_address' => [
			'exclude' => true,
			'label' => 'Location Address',
			'config' => [
				'type' => 'input',
				'size' => 50,
				'max' => 255,
				'eval' => 'trim',
			],
			'external' => [
				0 => [
					'field' => 'location_address'
				],
			],
		],
    'location_postcode' => [
			'exclude' => true,
			'label' => 'Location Postcode',
			'config' => [
				'type' => 'input',
				'size' => 50,
				'max' => 255,
				'eval' => 'trim',
			],
			'external' => [
				0 => [
					'field' => 'postcode'
				],
			],
		],
    'location_city' => [
			'exclude' => true,
			'label' => 'Location City',
			'config' => [
				'type' => 'input',
				'size' => 50,
				'max' => 255,
				'eval' => 'trim',
			],
			'external' => [
				0 => [
					'field' => 'city'
				],
			],
		],
    'name' => [
			'exclude' => true,
			'label' => 'Room Name',
			'config' => [
				'type' => 'input',
				'size' => 50,
				'max' => 255,
				'eval' => 'trim',
			],
			'external' => [
				0 => [
					'field' => 'room_name'
				],
			],
		],
  ],
];
