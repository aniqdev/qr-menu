<?php

return [
    'hide_validation' => false,
    'button_orientation' => 'left',
    'fields' => [
        [
            'id' => 'name',
            'name' => 'What is your name?',
            'type' => 'field',
            'field' => [
                'type' => 'text',
                'placeholder' => 'Name',
                'default_value' => 'Bob Smith',
            ],
        ],
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
        [
            'id' => 'asd',
            'name' => 'asdd',
            'type' => 'html',
            'html' => '<hr class="mb-0">',
        ],
        [
            'id' => 'currency_symbol',
            'name' => 'Currency',
            'type' => 'field',
            'field' => [
                'type' => 'select',
                'width' => 6,
                'options' => [
                    '' => 'Disable',
                    '$' => '$ USD',
                    '£' => '£ PLN',
                    '€' => '€ EUR',
                    '₴' => '₴ UAH',
                ],
            ],
        ],
        [
            'id' => 'price_precision',
            'name' => 'price precision',
            'type' => 'field',
            'field' => [
                'type' => 'select',
                'width' => 6,
                'options' => [0, 1, 2],
            ],
        ],
        [
            'id' => 'decimal_separator',
            'name' => 'decimal separator',
            'type' => 'field',
            'field' => [
                'type' => 'select',
                'width' => 6,
                'options' => [
                    '.' => 'Dot .',
                    ',' => 'Coma ,',
                ],
            ],
        ],
        [
            'id' => 'thousands_separator',
            'name' => 'thousands separator',
            'type' => 'field',
            'field' => [
                'type' => 'select',
                'width' => 6,
                'options' => [
                    ',' => 'Coma ,',
                    ' ' => 'Space',
                    "'" => "Semicolon '",
                ],
            ],
        ],
        [
            'id' => 'space_after_price',
            'name' => 'Space after price',
            'type' => 'field',
            'field' => [
                'type' => 'switch',
                'default_value' => 'false',
            ],
        ],
        [
            'id' => 'select',
            'name' => 'Pick a direction',
            'type' => 'field',
            'field' => [
                'type' => 'select',
                'default_value' => 'Top',
                'options' => [
                    'left' => 'To Left',
                    'right' => 'To Right',
                    'top' => 'To Top',
                    'bottom' => 'To Bottom',
                ],
            ],
        ],
    ],
];