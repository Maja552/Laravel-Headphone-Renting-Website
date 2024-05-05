<?php

return [
    'attributes' => [
        'name' => 'Nazwa'
    ],
    'fittypes' => [
        'in-ear' => 'Dokanałowe',
        'on-ear' => 'Nauszne',
        'over-ear' => 'Zauszne',
        'earbuds' => 'Douszne'
    ],
    'actions' => [
        'create' => 'Dodaj typ dopasowania',
        'edit' => 'Edytuj typ dopasowania',
        'destroy' => 'Usuń typ dopasowania',
        'restore' => 'Przywróć typ dopasowania'
    ],
    'labels' => [
        'create_form_title' => 'Tworzenie nowego typu dopasowania',
        'edit_form_title' => 'Edycja typu dopasowania',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano typ dopasowania ":name"',
            'updated' => 'Zaktualizowano typ dopasowania ":name"',
            'destroyed' => 'Usunięto typ dopasowania ":name"',
            'restored' => 'Przywrócono typ dopasowania ":name"'
        ]
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie typu dopasowania',
            'description' => 'Czy na pewno usunąć typ dopasowania ":name"?'
        ],
        'restore' => [
            'title' => 'Przywracanie typu dopasowania',
            'description' => 'Czy na pewno przywrócić typ dopasowania ":name"?'
        ]
    ]
];
