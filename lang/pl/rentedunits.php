<?php

return [
    'attributes' => [
        'id' => 'ID',
        'price' => 'Koszt',
        'headphone' => 'Sztuka słuchawek',
        'unit' => 'Sztuka słuchawek',
        'rent' => 'Wypożyczenie'
    ],
    'actions' => [
        'create' => 'Dodaj wypożyczoną sztukę',
        'edit' => 'Edytuj wypożyczeną sztukę',
        'destroy' => 'Usuń wypożyczeną sztukę',
        'restore' => 'Przywróć wypożyczeną sztukę',
    ],

    'labels' => [
        'create_form_title' => 'Dodawanie wypożyczenej sztuki',
        'edit_form_title' => 'Edycja wypożyczenej sztuki',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano wypożyczoną sztukę',
            'updated' => 'Zaktualizowano wypożyczeną sztukę',
            'destroyed' => 'Usunięto wypożyczeną sztukę',
            'restored' => 'Przywrócono wypożyczeną sztukę',
        ]
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie wypożyczenej sztuki',
            'description' => 'Czy na pewno usunąć wypożyczeną sztukę?'
        ],
        'restore' => [
            'title' => 'Przywracanie wypożyczenej sztuki',
            'description' => 'Czy na pewno przywrócić wypożyczeną sztukę?'
        ]
    ]
];
