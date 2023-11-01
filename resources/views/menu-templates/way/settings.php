<?php

return [
    'hide_validation' => false,
    'button_orientation' => 'left',
    'donor' => 'https://demo.menu.wayforpay.com/',
    'fields' => [
        // [
        //     'id' => 'color',
        //     'name' => 'What is your favorite color?',
        //     'type' => 'field',
        //     'field' => [
        //         'type' => 'color',
        //         'placeholder' => 'Color',
        //     ],
        // ],
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
            'id' => 'show_logo',
            'name' => _t('template_default.show_logo'),
            'type' => 'field',
            'field' => [
                'type' => 'switch',
                'default_value' => false,
            ],
        ],
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
        // footer
        [
            'id' => 'asd',
            'name' => 'asdd',
            'type' => 'html',
            'html' => '<hr class="mb-0">',
        ],
        [
            'id' => 'footer_phone',
            'name' => _t('template_default.footer_phone'),
            'type' => 'field',
            'field' => [
                'type' => 'text',
                'placeholder' => _t('template_default.footer_phone_placeholder'),
                'default_value' => '',
            ],
        ],
        [
            'id' => 'footer_email',
            'name' => _t('template_default.footer_email'),
            'type' => 'field',
            'field' => [
                'type' => 'text',
                'placeholder' => 'example@gmail.com',
                'default_value' => '',
            ],
        ],
        [
            'id' => 'footer_instagram',
            'name' => _t('template_default.footer_instagram'),
            'type' => 'field',
            'field' => [
                'type' => 'text',
                'placeholder' => 'https://www.instagram.com/qr.online.menu',
                'default_value' => '',
            ],
        ],
        [
            'id' => 'footer_telegram',
            'name' => _t('template_default.footer_telegram'),
            'type' => 'field',
            'field' => [
                'type' => 'text',
                'placeholder' => 'https://t.me/qr_online_menu',
                'default_value' => '',
            ],
        ],
    ],
];