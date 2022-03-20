<?php

use WireUi\View\Components;

return [
    /*
        |--------------------------------------------------------------------------
        | Icons
        |--------------------------------------------------------------------------
        |
        | The icons config will be used in icon component as default
        | https://heroicons.com
        |
    */
    'icons' => [
        'style' => env('WIREUI_ICONS_STYLE', 'outline'),
    ],

    /*
        |--------------------------------------------------------------------------
        | Modal
        |--------------------------------------------------------------------------
        |
        | The default modal preferences
        |
    */
    'modal' => [
        'zIndex'   => env('WIREUI_MODAL_Z_INDEX', 'z-50'),
        'maxWidth' => env('WIREUI_MODAL_MAX_WIDTH', '2xl'),
        'spacing'  => env('WIREUI_MODAL_SPACING', 'p-4'),
        'align'    => env('WIREUI_MODAL_ALIGN', 'start'),
        'blur'     => env('WIREUI_MODAL_BLUR', false),
    ],

    /*
        |--------------------------------------------------------------------------
        | Components
        |--------------------------------------------------------------------------
        |
        | List with WireUI components.
        | Change the alias to call the component with a different name.
        | Extend the component and replace your changes in this file.
        | Remove the component from this file if you don't want to use.
        |
     */
    'components' => [
        'icon' => [
            'class' => Components\Icon::class,
            'alias' => 'wire-icon',
        ],
        'icon.spinner' => [
            'class' => Components\Icons\Spinner::class,
            'alias' => 'wire-icon.spinner',
        ],
        'input' => [
            'class' => Components\Input::class,
            'alias' => 'wire-input',
        ],
        'textarea' => [
            'class' => Components\Textarea::class,
            'alias' => 'wire-textarea',
        ],
        'label' => [
            'class' => Components\Label::class,
            'alias' => 'wire-label',
        ],
        'error' => [
            'class' => Components\Error::class,
            'alias' => 'wire-error',
        ],
        'errors' => [
            'class' => Components\Errors::class,
            'alias' => 'wire-errors',
        ],
        'inputs.maskable' => [
            'class' => Components\Inputs\MaskableInput::class,
            'alias' => 'wire-inputs.maskable',
        ],
        'inputs.phone' => [
            'class' => Components\Inputs\PhoneInput::class,
            'alias' => 'wire-inputs.phone',
        ],
        'inputs.currency' => [
            'class' => Components\Inputs\CurrencyInput::class,
            'alias' => 'wire-inputs.currency',
        ],
        'button' => [
            'class' => Components\Button::class,
            'alias' => 'wire-button',
        ],
        'dropdown' => [
            'class' => Components\Dropdown::class,
            'alias' => 'wire-dropdown',
        ],
        'dropdown.item' => [
            'class' => Components\Dropdown\DropdownItem::class,
            'alias' => 'wire-dropdown.item',
        ],
        'dropdown.header' => [
            'class' => Components\Dropdown\DropdownHeader::class,
            'alias' => 'wire-dropdown.header',
        ],
        'notifications' => [
            'class' => Components\Notifications::class,
            'alias' => 'wire-notifications',
        ],
        'datetime-picker' => [
            'class' => Components\DatetimePicker::class,
            'alias' => 'wire-datetime-picker',
        ],
        'time-picker' => [
            'class' => Components\TimePicker::class,
            'alias' => 'wire-time-picker',
        ],
        'card' => [
            'class' => Components\Card::class,
            'alias' => 'wire-card',
        ],
        'native-select' => [
            'class' => Components\NativeSelect::class,
            'alias' => 'wire-native-select',
        ],
        'select' => [
            'class' => Components\Select::class,
            'alias' => 'wire-select',
        ],
        'select.option' => [
            'class' => Components\Select\Option::class,
            'alias' => 'wire-select.option',
        ],
        'select.user-option' => [
            'class' => Components\Select\UserOption::class,
            'alias' => 'wire-select.user-option',
        ],
        'toggle' => [
            'class' => Components\Toggle::class,
            'alias' => 'wire-toggle',
        ],
        'checkbox' => [
            'class' => Components\Checkbox::class,
            'alias' => 'wire-checkbox',
        ],
        'radio' => [
            'class' => Components\Radio::class,
            'alias' => 'wire-radio',
        ],
        'modal' => [
            'class' => Components\Modal::class,
            'alias' => 'wire-modal',
        ],
        'modal.card' => [
            'class' => Components\ModalCard::class,
            'alias' => 'wire-modal.card',
        ],
        'dialog' => [
            'class' => Components\Dialog::class,
            'alias' => 'wire-dialog',
        ],
    ],
];
