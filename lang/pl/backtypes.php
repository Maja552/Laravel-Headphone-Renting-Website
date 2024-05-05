<?php

return [
    'attributes' => [
        'name' => 'Nazwa'
    ],
    'backtypes' => [
        'open-back' => 'Otwarte',
        'closed-back' => 'Zamknięte',
        'semi-open-back' => 'Półotwarte'
    ],
    'actions' => [
        'create' => 'Dodaj typ obudowy',
        'edit' => 'Edytuj typ obudowy',
        'destroy' => 'Usuń typ obudowy',
        'restore' => 'Przywróć typ obudowy'
    ],
    'labels' => [
        'create_form_title' => 'Tworzenie typu obudowy',
        'edit_form_title' => 'Edycja typu obudowy',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano typ obudowy ":name"',
            'updated' => 'Zaktualizowano typ obudowy ":name"',
            'destroyed' => 'Usunięto typ obudowy ":name"',
            'restored' => 'Przywrócono typ obudowy ":name"'
        ]
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie typu obudowy',
            'description' => 'Czy na pewno usunąć typ obudowy ":name"?'
        ],
        'restore' => [
            'title' => 'Przywracanie typu obudowy',
            'description' => 'Czy na pewno przywrócić typ obudowy ":name"?'
        ]
    ]
];
