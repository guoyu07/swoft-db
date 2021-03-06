<?php
return [
    "version"           => '1.0',
    'autoInitBean'      => true,
    'beanScan'          => [
        'Swoft\\Db\\Test\\Testing' => BASE_PATH."/Testing"
    ],
    'I18n'              => [
        'sourceLanguage' => '@root/resources/messages/',
    ],
    'env'               => 'Base',
    'user.stelin.steln' => 'fafafa',
    'Service'           => [
        'user' => [
            'timeout' => 3000
        ]
    ],
    'db' => require dirname(__FILE__) . DS . "db.php",
];
