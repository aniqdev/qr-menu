<?php

return [
    'hide_validation' => false,
    'button_orientation' => 'left',
    'fields' => [
        // [
        //     'id' => 'name',
        //     'name' => 'What is your name?',
        //     'type' => 'field',
        //     'field' => [
        //         'type' => 'text',
        //         'placeholder' => 'Name',
        //         'default_value' => 'Bob Smith',
        //     ],
        // ],
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
        //     'id' => 'canttouchthis',
        //     'name' => 'You can\'t touch this',
        //     'type' => 'field',
        //     'field' => [
        //         'type' => 'text',
        //         'readonly' => true,
        //         'placeholder' => 'I\'m a placeholder',
        //     ],
        // ],
        // [
        //     'id' => 'notcheckedanddisabled',
        //     'name' => 'Can\'t check me',
        //     'type' => 'field',
        //     'field' => [
        //         'type' => 'checkbox',
        //         'readonly' => true,
        //     ],
        // ],
        // [
        //     'id' => 'checked',
        //     'name' => 'Uncheck me',
        //     'type' => 'field',
        //     'field' => [
        //         'type' => 'checkbox',
        //         'default_value' => 'true',
        //     ],
        // ],
        // [
        //     'id' => 'asd',
        //     'name' => 'asdd',
        //     'type' => 'html',
        //     'html' => '<hr class="mb-0">',
        // ],
        [
            'id' => 'font_size',
            'name' => _t('template_default.font_size'),
            'type' => 'field',
            'field' => [
                'type' => 'select',
                'width' => 6,
                'default_value' => '14',
                'options' => [12,13,14,15,16],
            ],
        ],
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
                    '&nbsp;' => _t('template_default.space'),
                    "'" => _t('template_default.semicolon'),
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
        [
            'id' => 'asd',
            'name' => 'asdd',
            'type' => 'html',
            'html' => '<hr class="mb-0">',
        ],
        [
            'id' => 'show_description',
            'name' => _t('template_default.show_description'),
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