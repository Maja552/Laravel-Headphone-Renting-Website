<?php

return [
    'attributes' => [
        'name' => 'Nazwa'
    ],
    'drivertechnologies' => [
        'dynamic' => 'Dynamiczne',
        'planar' => 'Planarne',
        'electrostatic' => 'Elektrostatyczne',
        'balanced armature' => 'Zrównoważone',
        'bone conduction' => 'Kostne',
        'piezoelectric' => 'Piezoelektryczne',
    ],
    'actions' => [
        'create' => 'Dodaj technologię',
        'edit' => 'Edytuj technologię',
        'destroy' => 'Usuń technologię',
        'restore' => 'Przywróć technologię'
    ],
    'labels' => [
        'create_form_title' => 'Tworzenie nowej technologii',
        'edit_form_title' => 'Edycja technologii'
    ],
    'messages' => [
        'successes' => [
            'stored' => 'Dodano technologię ":name"',
            'updated' => 'Zaktualizowano technologię ":name"',
            'destroyed' => 'Usunięto technologię ":name"',
            'restored' => 'Przywrócono technologię ":name"'
        ]
    ],
    'dialogs' => [
        'soft_deletes' => [
            'title' => 'Usuwanie technologii',
            'description' => 'Czy na pewno usunąć technologię ":name"?'
        ],
        'restore' => [
            'title' => 'Przywracanie technologii',
            'description' => 'Czy na pewno przywrócić technologię ":name"?'
        ]
    ]
];
