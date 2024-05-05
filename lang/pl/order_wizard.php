<?php

return [
    'cart' => [
        'title' => 'Koszyk zakupów',
        'columns' => [
            'image' => 'Zdjęcie',
            'qty' => 'Ilość',
            'unit_price' => 'Cena',
            'cost' => 'Wartość',
        ],
        'labels' => [
            'empty' => 'Koszyk zakupowy jest pusty',
        ],
        'dialogs' => [
            'remove' => [
                'title' => 'Usuwanie słuchawek z koszyka',
                'description' => 'Czy na pewno usunąć :name z koszyka?',
            ],
        ]
    ],
    'information' => [
        'title' => 'Informacje',
    ],
    'renting' => [
        'title' => 'Wypożyczenie',
        'columns' => [
            'image' => 'Zdjęcie',
            'name' => 'Naza modelu słuchawek',
            'unit_price' => 'Cena',
            'cost' => 'Wartość',
        ],
        'labels' => [
            'empty' => 'Koszyk wypożyczeń jest pusty',
        ],
        'cancel_button' => 'Anuluj',
        'rent_button' => 'Wypożycz',
        'renting_enddate' => 'Do kiedy chcesz wypożyczyć?',
        'input_enddate' => 'Wybierz datę',
        'enddate' => 'Data końcowa',
        'price' => ' / tydz.',
        'renting_startdate' => 'Od kiedy chcesz wypożyczyć?',
        'input_startdate' => 'Wybierz datę',
        'startdate' => 'Data początkowa',
    ],
    'delivery' => [
        'title' => 'Dane dostawy',
        'attributes' => [
            'name' => 'Imię',
            'enter_name' => 'Wpisz imię',
            'surname' => 'Nazwisko',
            'enter_surname' => 'Wpisz nazwisko',
            'email' => 'Email',
            'enter_email' => 'Wpisz email',
            'phone' => 'Numer telefonu',
            'enter_phone' => 'Wpisz numer telefonu',
            'street' => 'Ulica',
            'enter_street' => 'Wpisz ulicę',
            'house_number' => 'Numer domu',
            'enter_house_number' => 'Wpisz numer domu',
            'apartment_number' => 'Numer mieszkania',
            'enter_apartment_number' => 'Wpisz numer mieszkania',
            'city' => 'Miasto',
            'enter_city' => 'Wpisz miasto',
            'postal_code' => 'Kod pocztowy',
            'enter_postal_code' => 'Wpisz kod pocztowy',
        ]
    ],
    'confirm_rent' => [
        'title' => 'Potwierdzenie',
        'columns' => [
            'image' => 'Zdjęcie',
            'product' => 'Produkt',
            'qty' => 'Ilość',
            'unit_price' => 'Cena',
            'cost' => 'Wartość',
        ],
        'labels' => [
            'delivery' => 'Dane zamawiającego',
            'delivery_name' => 'Imię i nazwisko',
            'delivery_address' => 'Adres dostawy',
            'total_cost' => 'Koszt całkowity',
            'total_qty_items' => 'Ilość pozycji',
            'confirm_rent' => 'Złóż wypożyczenie',
            'rent_duration' => 'Czas wypożyczenia',
            'startdate' => 'Data początku',
            'enddate' => 'Data końca',
            'duration' => 'Długość',
            'days' => 'dni'
        ],
        'messages' => [
            'successes' => [
                'ordered' => [
                    'title' => 'Złożono wypożyczenie',
                    'description' => 'Złożono wypożyczenie na produkty o wartości :total_cost.',
                ],
            ],
        ],
    ],
    'email_notification' => [
        'subject' => 'Zamówienie numer :number',
    ],
];
