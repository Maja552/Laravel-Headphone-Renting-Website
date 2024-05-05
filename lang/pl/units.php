<?php

return [
    'tostring' => 'Sztuka :headphone (ID: :id)',
    'attributes' => [
        'id' => 'ID',
        'headphone' => 'Model słuchawek',
        'owner' => 'Właściciel',
        'description' => 'Opis',
        'price' => 'Cena',
    ],
    'actions' => [
        'create' => 'Dodaj sztukę słuchawek',
        'edit' => 'Edytuj sztukę słuchawek',
        'destroy' => 'Usuń sztukę słuchawek',
        'restore' => 'Przywróć sztukę słuchawek',
    ],
    'labels' => [
        'create_form_title' => 'Dodawanie nowej sztuki słuchawek',
        'edit_form_title' => 'Edycja sztuki słuchawek',
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano nową sztukę słuchawek ":name"',
            'updated' => 'Zaktualizowano sztukę słuchawek ":name"',
            'destroyed' => 'Usunięto sztukę słuchawek ":name"',
            'restored' => 'Przywrócono sztukę słuchawek ":name"',
        ],
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie sztuki słuchawek',
            'description' => 'Czy na pewno usunąć sztukę słuchawek ":name"?'
        ],
        'restore' => [
            'title' => 'Przywracanie sztuki słuchawek',
            'description' => 'Czy na pewno przywrócić sztukę słuchawek ":name"?'
        ],
    ]
];
