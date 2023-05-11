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