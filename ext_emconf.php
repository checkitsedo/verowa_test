<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "verowa_importer"
 *
 * Auto generated by Extension Builder 2021-08-08
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Verowa Importer',
    'description' => 'This extension connects to the Verowa API. To use it in your Typo3 project, you need a Verowa instance and an API key.

Verowa is a Swiss organization tool for parishes. Verowa connects your team, manages your rooms and equipment, helps you plan events like church services or meetings and organizes your advertising, service weeks and much more. Verowa informs you about changes and keeps your website up to date with this plugin.',
    'category' => 'plugin',
    'author' => 'Dominik Senti',
    'author_email' => 'info@senti.lu',
    'state' => 'beta',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
            'external_import' => '6.3.2-0.0.0',
            'svconnector_json' => '3.0.0-0.0.0',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
