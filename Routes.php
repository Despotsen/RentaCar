<?php
    return [
        [
            'Pattern'    => '|^login/?$|',
            'Controller' => 'Main',
            'Method'     => 'login'
        ],
        [
            'Pattern'    => '|^logout/?$|',
            'Controller' => 'Main',
            'Method'     => 'logout'
        ],
        [
            'Pattern'    => '|^costumers/?$|',
            'Controller' => 'Costumer',
            'Method'     => 'index'
        ],
        [
            'Pattern'    => '|^costumers/add/?$|',
            'Controller' => 'Costumer',
            'Method'     => 'add'
        ],
        [
            'Pattern'    => '|^costumers/edit/([0-9]+)/?$|',
            'Controller' => 'Costumer',
            'Method'     => 'edit'
        ],
        [
            'Pattern'    => '|^costumers/delete/([0-9]+)/?$|',
            'Controller' => 'Costumer',
            'Method'     => 'delete'
        ],
        [
            'Pattern'    => '|^cars/?$|',
            'Controller' => 'Car',
            'Method'     => 'index'
        ],
        [
            'Pattern'    => '|^cars/edit/([0-9]+)/?$|',
            'Controller' => 'Car',
            'Method'     => 'edit'
        ],
        [
            'Pattern'    => '|^cars/delete/([0-9]+)/?$|',
            'Controller' => 'Car',
            'Method'     => 'delete'
        ],
        [
            'Pattern'    => '|^cars/add/?$|',
            'Controller' => 'Car',
            'Method'     => 'add'
        ],
        [
            'Pattern'    => '|^rental/?$|',
            'Controller' => 'Rental',
            'Method'     => 'index'
        ],
        [
            'Pattern'    => '|^rental/add/?$|',
            'Controller' => 'Rental',
            'Method'     => 'add'
        ],
        [
            'Pattern'    => '|^rental/costumers/add?$|',
            'Controller' => 'Costumer',
            'Method'     => 'add'
        ],
        [
            'Pattern'    => '|^rental/cars/add?$|',
            'Controller' => 'Car',
            'Method'     => 'add'
        ],
        [
            'Pattern'    => '|^.*$|',
            'Controller' => 'Main',
            'Method'     => 'index'
        ]
    ];
