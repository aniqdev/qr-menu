<?php

return [
    'hide_validation' => false,
    'button_orientation' => 'left',
    'donor' => 'https://expz.menu/a384fe28-7ff2-47ef-aa46-78e411998771/menu?menuId=1714',
    'fields' => [
        // [
        //     'id' => 'theme',
        //     'name' => _t('template_default.theme'),
        //     'type' => 'field',
        //     'field' => [
        //         'type' => 'radio',
        //         'default_value' => 'light',
        //         'width' => 12,
        //         'options' => [
        //             'light' => _t('template_default.light'),
        //             'dark' => _t('template_default.dark'),
        //         ],
        //     ],
        // ],
        [
            'id' => 'currency_symbol',
            'name' => _t('template_default.currency'),
            'type' => 'field',
            'field' => [
                'type' => 'select',
                'width' => 6,
                'options' => [
                    '' => _t('template_default.currency_disable'),
                    '$' => '$ USD',
                    '€' => '€ EUR',
                    '₴' => '₴ UAH',
                    'грн.' => 'грн.',
                ],
            ],
        ],
        [
            'id' => 'price_precision',
            'name' => _t('template_default.price_precision'),
            'type' => 'field',
            'field' => [
                'type' => 'select',
                'default_value' => 0,
                'width' => 6,
                'options' => [0, 1, 2],
            ],
        ],
        [
            'id' => 'decimal_separator',
            'name' => _t('template_default.decimal_separator'),
            'type' => 'field',
            'field' => [
                'type' => 'select',
                'default_value' => ',',
                'width' => 6,
                'options' => [
                    '.' => _t('template_default.dot'),
                    ',' => _t('template_default.coma'),
                ],
            ],
        ],
        [
            'id' => 'thousands_separator',
            'name' => _t('template_default.thousands_separator'),
            'type' => 'field',
            'field' => [
                'type' => 'select',
                'default_value' => ' ',
                'width' => 6,
                'options' => [
                    ',' => _t('template_default.coma'),
                    ' ' => _t('template_default.space'),
                    "'" => _t('template_default.quote'),
                ],
            ],
        ],
        [
            'id' => 'space_after_price',
            'name' => _t('template_default.space_after_price'),
            'type' => 'field',
            'field' => [
                'type' => 'switch',
                'default_value' => false,
            ],
        ],
        // [
        //     'id' => 'select',
        //     'name' => 'Pick a direction',
        //     'type' => 'field',
        //     'field' => [
        //         'type' => 'select',
        //         'default_value' => 'Top',
        //         'options' => [
        //             'left' => 'To Left',
        //             'right' => 'To Right',
        //             'top' => 'To Top',
        //             'bottom' => 'To Bottom',
        //         ],
        //     ],
        // ],
    ],
];