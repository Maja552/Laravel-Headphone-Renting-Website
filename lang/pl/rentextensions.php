<?php

return [
    'attributes' => [
        'id' => 'ID',
        'requestDate' => 'Data złożenia wniosku',
        'oldEndDate' => 'Stara data zakończenia',
        'newEndDate' => 'Nowa data zakończenia',
        'idRent' => 'ID wypożyczenia',
        'rent' => 'Wypożyczenie',
        'price' => 'Cena',
        'description' => 'Opis'
    ],
    'actions' => [
        'create' => 'Dodaj przedłużenie',
        'edit' => 'Edytuj przedłużenie',
        'destroy' => 'Usuń przedłużenie',
        'restore' => 'Przywróć przedłużenie',
    ],

    'labels' => [
        'create_form_title' => 'Dodawanie przedłużenia',
        'edit_form_title' => 'Edycja przedłużenia',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano przedłużenie',
            'updated' => 'Zaktualizowano przedłużenie',
            'destroyed' => 'Usunięto przedłużenie',
            'restored' => 'Przywrócono przedłużenie',
        ]
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie przedłużenia',
            'description' => 'Czy na pewno usunąć przedłużenie?'
        ],
        'restore' => [
            'title' => 'Przywracanie przedłużenia',
            'description' => 'Czy na pewno przywrócić przedłużenie?'
        ]
    ]
];
