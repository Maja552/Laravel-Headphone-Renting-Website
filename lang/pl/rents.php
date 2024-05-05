<?php

return [
    'tostring' => ':description (ID: :id, :owner)',
    'table_empty' => 'Brak wypożyczeń',
    'filters' => [
        'rentstatus_title' => 'Status',

    ],
    'attributes' => [
        'id' => 'ID',
        'number' => 'Numer wypożyczenia',
        'totalPrice' => 'Cena całkowita',
        'startDate' => 'Data rozpoczęcia',
        'endDate' => 'Data zakończenia',
        'requestDate' => 'Data złożenia',
        'user' => 'Właściciel',
        'description' => 'Opis',
        'status' => 'Status',
        'name' => 'Imię i nazwisko',
        'email' => 'Adres email',
        'phone' => 'Numer telefonu',
        'address' => 'Adres',

    ],
    'actions' => [
        'create' => 'Dodaj wypożyczenie',
        'edit' => 'Edytuj wypożyczenie',
        'destroy' => 'Usuń wypożyczenie',
        'restore' => 'Przywróć wypożyczenie',
        'showdelivery' => 'Dane dostawy'
    ],

    'labels' => [
        'create_form_title' => 'Dodawanie wypożyczenia',
        'edit_form_title' => 'Edycja wypożyczenia',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano wypożyczenie',
            'updated' => 'Zaktualizowano wypożyczenie',
            'destroyed' => 'Usunięto wypożyczenie',
            'restored' => 'Przywrócono wypożyczenie',
        ]
    ],
    'dialogs' => [
        'showdelivery' => [
            'title' => 'Dane dostawy wypożyczenia',
            'description' => 'Imię i nazwisko: :name<br>
            Numer telefonu: :phone<br>
            Email: :email<br>
            Adres: :address
            '
        ],
        'soft_deletes' => [
            'title' => 'Usuwanie wypożyczenia',
            'description' => 'Czy na pewno usunąć wypożyczenie?'
        ],
        'restore' => [
            'title' => 'Przywracanie wypożyczenia',
            'description' => 'Czy na pewno przywrócić wypożyczenie?'
        ]
    ]
];
