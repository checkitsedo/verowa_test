<?php
return [
	'ctrl' => [
		'title' => 'LLL:EXT:verowa_test/Resources/Private/Language/locallang_db.xlf:tx_verowatest_domain_model_event',
		'label' => 'event_id',
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
		'searchFields' => 'event_id,title,short_desc,long_desc,organizer,subs_person_id,rooms',
		'iconfile' => 'EXT:verowa_test/Resources/Public/Icons/tx_verowatest_domain_model_event.gif'
	],
	'external' => [
		'general' => [
			0 => [
				'connector' => 'json',
				'parameters' => [
					'uri' => 'https://api.verowa.ch/geteventdetails/stjosef-zuerich/1ad89c27e1a89ef6aa34f34e4adf7448/0',
					'encoding' => 'utf-8',
					'headers' => [
						'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:75.0) Gecko/20100101 Firefox/75.0',
						'Accept' => 'application/json'
					],
				],
				'data' => 'array',
				'referenceUid' => 'event_id',
				'group' => 'stjoseftest',
				'priority' => 10,
				'description' => 'Import of all events from Verowa'
			],
		],
	],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, event_id, date_from, date_to, title, hide_time, short_desc, long_desc, subs_date, subs_person_id, date_text, image_url, organizer, rooms, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
				'foreign_table' => 'tx_verowatest_domain_model_event',
				'foreign_table_where' => 'AND {#tx_verowatest_domain_model_event}.{#pid}=###CURRENT_PID### AND {#tx_verowatest_domain_model_event}.{#sys_language_uid} IN (-1,0)',
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

		'event_id' => [
			'exclude' => true,
			'label' => 'Event Id',
			'config' => [
				'type' => 'input',
			],
			'external' => [
				0 => [
					'field' => 'event_id'
				],
			],
		],
		'date_from' => [
			'exclude' => true,
			'label' => 'Date From',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'eval' => 'datetime',
			],
			'external' => [
				0 => [
					'field' => 'date_from',
					'transformations' => [
						10 => [
							'userFunction' => [
								'class' => \Cobweb\ExternalImport\Transformation\DateTimeTransformation::class,
								'method' => 'parseDate',
								'parameters' => [
									'enforceTimeZone' => true
								],
							],
						],
					],
				],
			],
		],
		'date_to' => [
			'exclude' => true,
			'label' => 'Date To',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'eval' => 'datetime',
			],
			'external' => [
				0 => [
					'field' => 'date_to',
					'transformations' => [
						10 => [
							'userFunction' => [
								'class' => \Cobweb\ExternalImport\Transformation\DateTimeTransformation::class,
								'method' => 'parseDate',
								'parameters' => [
									'enforceTimeZone' => true
								],
							],
						],
					],
				],
			],
		],
		'date_text' => [
			'exclude' => true,
			'label' => 'Date Text',
			'config' => [
				'type' => 'input',
				'size' => 50,
				'max' => 255,
				'eval' => 'trim',
			],
			'external' => [
				0 => [
					'field' => 'date_text'
				],
			],
		],
		'hide_time' => [
			'exclude' => true,
			'label' => 'Hide Time',
			'config' => [
				'type' => 'check',
				'renderType' => 'checkboxToggle',
				'items' => [
					[
						0 => '',
						1 => '',
					],
				],
				'default' => 0,
			],
			'external' => [
				0 => [
					'field' => 'hide_time'
				],
			],
		],
		'title' => [
			'exclude' => true,
			'label' => 'Title',
			'config' => [
				'type' => 'input',
				'size' => 50,
				'max' => 255,
				'eval' => 'trim',
			],
			'external' => [
				0 => [
					'field' => 'title'
				],
			],
		],
		'topic' => [
			'exclude' => true,
			'label' => 'Topic',
			'config' => [
				'type' => 'input',
				'size' => 50,
				'max' => 255,
				'eval' => 'trim',
			],
			'external' => [
				0 => [
					'field' => 'topic'
				],
			],
		],
		'short_desc' => [
			'exclude' => true,
			'label' => 'Short Desc',
			'config' => [
				'type' => 'text',
			], 
			'external' => [
				0 => [
					'field' => 'short_desc'
				],
			],
		],
		'long_desc' => [
			'exclude' => true,
			'label' => 'Long Desc',
			'config' => [
				'type' => 'text',
				'enableRichtext' => true,
				'richtextConfiguration' => 'default',
				'fieldControl' => [
					'fullScreenRichtext' => [
						'disabled' => false,
					],
				],
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
			],
			'external' => [
				0 => [
					'field' => 'long_desc'
				],
			],
		],
		'organizer' => [
			'exclude' => true,
			'label' => 'Organizer',
			'config' => [
				'type' => 'group',
				'allowed' => 'tx_verowatest_domain_model_person',
				'foreign_table' => 'tx_verowatest_domain_model_person',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'default' => 0,
				'fieldControl' => [
					'addRecord' => [
						'disabled' => false,
					],
				],
			],
		],
		'organists' => [
			'exclude' => true,
			'label' => 'Organists',
			'config' => [
				'type' => 'group',
				'allowed' => 'tx_verowatest_domain_model_person',
				'foreign_table' => 'tx_verowatest_domain_model_person',
				'size' => 5,
				'minitems' => 0,
				'maxitems' => 100,
				'default' => 0,
				'MM' => 'tx_verowatest_event_person_mm',
				'behaviour' => [
					'allowLanguageSynchronization' => true,
				],
				'fieldControl' => [
					'addRecord' => [
						'disabled' => false,
					],
				],
			],
		],
		'subs_date' => [
			'exclude' => true,
			'label' => 'Subs Date',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'eval' => 'datetime',
			],
			'external' => [
				0 => [
					'field' => 'subs_date',
					'transformations' => [
						10 => [
							'userFunction' => [
								'class' => \Cobweb\ExternalImport\Transformation\DateTimeTransformation::class,
								'method' => 'parseDate',
								'parameters' => [
									'enforceTimeZone' => true
								],
							],
						],
					],
				],
			],
		],
		'subs_text' => [
			'exclude' => true,
			'label' => 'Subs Text',
			'config' => [
				'type' => 'text',
			],
			'external' => [
				0 => [
					'field' => 'subs_text'
				],
			],
		],
		'subs_person_id' => [
			'exclude' => true,
			'label' => 'Subs Person Id',
			'config' => [
				'type' => 'group',
				'allowed' => 'tx_verowatest_domain_model_person',
				'foreign_table' => 'tx_verowatest_domain_model_person',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'default' => 0,
				'fieldControl' => [
					'addRecord' => [
						'disabled' => false,
					],
				],
			],
		],
		'rooms' => [
			'exclude' => true,
			'label' => 'Rooms',
			'config' => [
				'type' => 'group',
				'allowed' => 'tx_verowatest_domain_model_room',
				'foreign_table' => 'tx_verowatest_domain_model_room',
				'size' => 5,
				'minitems' => 0,
				'maxitems' => 100,
				'default' => 0,
				'MM' => 'tx_verowatest_event_room_mm',
				'behaviour' => [
					'allowLanguageSynchronization' => true,
				],
				'fieldControl' => [
					'addRecord' => [
						'disabled' => false,
					],
				],
			],
		],
		'image_url' => [
			'exclude' => true,
			'label' => 'Image URL',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputLink',
				'size' => 50,
				'max' => 255,
				'eval' => 'trim',
				'fieldControl' => [
					'linkPopup' => [
						'options' => [
							'blindLinkFields' => 'class, params, target, title',
							'blindLinkOptions' => 'file, folder, mail, page, spec, telephone',
						],
					],
				],
			],
			'external' => [
				0 => [
					'field' => 'image_url'
				],
			],
		],
  ],
];
