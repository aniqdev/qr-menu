<?php

return [
    'hide_validation' => false,
    'button_orientation' => 'left',
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
        [
            'id' => 'theme',
            'name' => _t('template_default.theme'),
            'type' => 'field',
            'field' => [
                'type' => 'radio',
                'default_value' => 'light',
                // 'width' => 12,
                'options' => [
                    'light' => _t('template_default.theme_dark'),
                    'dark' => _t('template_default.theme_light'),
                ],
            ],
        ],
        [
            'id' => 'show_logo',
            'name' => _t('template_default.show_logo'),
            'type' => 'field',
            'field' => [
                'type' => 'switch',
                'width' => 6,
                'default_value' => false,
            ],
        ],
        [
            'id' => 'show_company_name',
            'name' => _t('template_default.show_company_name'),
            'type' => 'field',
            'field' => [
                'type' => 'switch',
                'width' => 6,
                'default_value' => false,
            ],
        ],
        // [
        //     'id' => 'show_company_description',
        //     'name' => _t('template_default.show_company_description'),
        //     'type' => 'field',
        //     'field' => [
        //         'type' => 'switch',
        //         'default_value' => false,
        //     ],
        // ],
        [
            'id' => 'header_text',
            'name' => _t('template_default.header_text'),
            'type' => 'field',
            'field' => [
                'type' => 'textarea',
                'placeholder' => _t('template_default.header_text_placeholder'),
                'default_value' => '',
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
                    '&nbsp;' => _t('template_default.space'),
                    ',' => _t('template_default.coma'),
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
            'id' => 'footer_address',
            'name' => _t('template_default.footer_address'),
            'type' => 'field',
            'field' => [
                'type' => 'text',
                'placeholder' => _t('template_default.footer_address_placeholder'),
                'default_value' => '',
            ],
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
            'id' => 'working_hours',
            'name' => _t('template_default.working_hours'),
            'type' => 'field',
            'field' => [
                'type' => 'text',
                'placeholder' => '10:00 - 22:00',
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
        // [
        //     'id' => 'footer_telegram',
        //     'name' => _t('template_default.footer_telegram'),
        //     'type' => 'field',
        //     'field' => [
        //         'type' => 'text',
        //         'placeholder' => 'https://t.me/qr_online_menu',
        //         'default_value' => '',
        //     ],
        // ],
        [
            'id' => 'asd',
            'name' => 'asdd',
            'type' => 'html',
            'html' => '<div style="margin: 15px 0 -40px; position: relative;">
                <label for="JsonForm-MyForm-Input-google_map_iframe">' . _t('template_default.google_map_iframe') . '</label>
                <a href="{{ route(\'items.create\') }}" class="question-link" 
                            onclick="modal_load(event, this)"
                            data-modalurl="' . route('admin-modals', 'google-map-instructiom') . '"
                            data-modalsize="modal-lg">?</a>
            </div>',
        ],
        [
            'id' => 'google_map_iframe',
            'name' => '', // _t('template_default.google_map_iframe'),
            'type' => 'field',
            'field' => [
                'type' => 'textarea',
                'rows' => 5,
                'placeholder' => htmlspecialchars(_t('template_default.google_map_iframe_placeholder')),
                'default_value' => '',
            ],
        ],
    ],
];
