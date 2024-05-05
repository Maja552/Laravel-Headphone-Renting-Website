<?php

return [
    'attributes' => [
        'name' => 'Nazwa'
    ],
    'rentstatuses' => [
        'new' => 'Nowe',
        'cancelled' => 'Anulowane',
        'in shipping' => 'W drodze',
        'in use' => 'W użyciu',
        'returned' => 'Zwrócone',
    ],
    'actions' => [
        'create' => 'Dodaj status',
        'edit' => 'Edytuj status',
        'destroy' => 'Usuń status',
        'restore' => 'Przywróć status',
    ],
    'labels' => [
        'create_form_title' => 'Tworzenie nowego statusu',
        'edit_form_title' => 'Edycja statusu'
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano status ":name"',
            'updated' => 'Zaktualizowano status ":name"',
            'destroyed' => 'Usunięto status ":name"',
            'restored' => 'Przywrócono status ":name"'
        ]
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie statusu',
            'description' => 'Czy na pewno usunąć status ":name"?'
        ],
        'restore' => [
            'title' => 'Przywracanie statusu',
            'description' => 'Czy na pewno przywrócić status ":name"?'
        ]
    ]
];
