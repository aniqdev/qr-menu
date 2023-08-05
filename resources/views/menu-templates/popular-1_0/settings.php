<?php

return [
    'hide_validation' => false,
    'button_orientation' => 'left',
    'fields' => [
        // [
        //   "id" => "basiclist",
        //   "name" => "Add some food",
        //   "type" => "field",
        //   "field" => [
        //     "type" => "list",
        //     "placeholder" => "Food item",
        //     "helptext" => "Enter a food and hit Add"
        //   ]
        // ],
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
                    'грн.' => 'грн.',
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
                'default_value' => ',',
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
                'default_value' => ' ',
                'options' => [
                    ',' => 'Coma ,',
                    ' ' => 'Space',
                    "'" => "Semicolon '",
                ],
            ],
        ],


        [
            'id' => 'card_body_bg_opacity',
            'name' => 'Card body bg opacity',
            'type' => 'field',
            'field' => [
                'type' => 'range',
                'required' => true,
                'default_value' => '65',
                'width' => 12,
            ],
        ],

        [
            'id' => 'name',
            'name' => 'What is your name?',
            'type' => 'field',
            'field' => [
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Name',
                'default_value' => 'Bob Smith',
                'width' => 6,
            ],
        ],
        [
            'id' => 'color',
            'name' => 'What is your favorite color?',
            'type' => 'field',
            'field' => [
                'type' => 'color',
                'placeholder' => 'Color',
                'default_value' => '#276786',
                'width' => 6,
            ],
        ],
        [
            'id' => 'canttouchthis',
            'name' => 'You can\'t touch this',
            'type' => 'field',
            'field' => [
                'type' => 'text',
                'readonly' => true,
                'placeholder' => 'I\'m a placeholder',
            ],
        ],
        [
            'id' => 'notcheckedanddisabled',
            'name' => 'Can\'t check me',
            'type' => 'field',
            'field' => [
                'type' => 'checkbox',
                'readonly' => true,
            ],
        ],
        [
            'id' => 'checked',
            'name' => 'Uncheck me',
            'type' => 'field',
            'field' => [
                'type' => 'checkbox',
                'default_value' => 'true',
            ],
        ],
        [
            'id' => 'abcradio',
            'name' => 'A, B, or C?',
            'type' => 'field',
            'field' => [
                'type' => 'radio',
                'options' => [
                    0 => 'Option A',
                    1 => 'Option B',
                    2 => 'Option C',
                ],
            ],
        ],
        [
            'id' => 'switchon',
            'name' => 'Switch that is on by default',
            'type' => 'field',
            'field' => [
                'type' => 'switch',
                'default_value' => 'true',
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
                    0 => 'Left',
                    1 => 'Right',
                    2 => 'Top',
                    3 => 'Bottom',
                ],
            ],
        ],
    ],
];