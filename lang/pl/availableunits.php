<?php

return [
    'table_empty' => 'Brak dostępnych sztuk słuchawek',
    'attributes' => [
        'manufacturer' => 'Producent',
        'price' => 'Cena',
    ],
    'actions' => [
        'rent' => 'Wypożycz',
        'not_available' => 'Niedostępne',
        'add_to_cart' => 'Dodaj do koszyka',
        'remove_from_cart' => 'Usuń z koszyka',
    ],
    'messages' => [
        'successes' => [
            'added_to_cart' => 'Dodano do koszyka sztukę słuchawek :name',
            'removed_from_cart' => 'Usunięto z koszyka sztukę słuchawek :name',
        ],
        'errors' => [
            'image_deleted' => 'Nie udało się usunąć zdjęcia dla sztuki słuchawek :name',
        ],
    ],
    'filters' => [
        'backtype' => 'Typ tyłu',
        'fittype' => 'Typ dopasowania',
        'drivertechnology' => 'Technologia przetwornika',
        'manufacturer' => 'Producent',
    ]
];
