<?php

return [
    'attributes' => [
        'id' => 'ID',
        'name' => 'Nazwa',
        'idManufacturer' => 'Producent',
        'idDrivertechnology' => 'Technologia przetwornika',
        'idFittype' => 'Typ dopasowania',
        'idBacktype' => 'Typ tyłu',
        'idType' => 'Typ',
        'releaseYear' => 'Rok wydania',
        'weight' => 'Waga',
        'impedance' => 'Impedancja',
        'sensitivity' => 'Czułość',
        'sensitivityUnit' => 'Jednostka czułości',
        'driverSize' => 'Rozmiar przetwornika',
        'image' => 'Zdjęcie',
    ],
    'actions' => [
        'create' => 'Dodaj model słuchawek',
        'edit' => 'Edytuj model słuchawek',
        'destroy' => 'Usuń model słuchawek',
        'restore' => 'Przywróć model słuchawek',
    ],
    'labels' => [
        'create_form_title' => 'Tworzenie nowego modelu słuchawek',
        'edit_form_title' => 'Edycja modelu słuchawek',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano nowy model słuchawek ":name"',
            'updated' => 'Zaktualizowano model słuchawek ":name"',
            'destroyed' => 'Usunięto model słuchawek ":name"',
            'restored' => 'Przywrócono model słuchawek ":name"',
            'image_deleted' => 'Zdjęcia dla sztuki słuchawek :name zostało usunięte',
        ],
        'errors' => [
            'image_deleted' => 'Nie udało się usunąć zdjęcia dla sztuki słuchawek :name',
        ],
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie modelu słuchawek',
            'description' => 'Czy na pewno usunąć model słuchawek ":name"?'
        ],
        'restore' => [
            'title' => 'Przywracanie modelu słuchawek',
            'description' => 'Czy na pewno przywrócić model słuchawek ":name"?'
        ],
        'image_delete' => [
            'title' => 'Usuwanie zdjęcia',
            'description' => 'Czy na pewno usunąć zdjęcie dla słuchawek :name?'
        ]
    ]
];
