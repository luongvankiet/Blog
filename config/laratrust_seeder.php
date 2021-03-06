<?php

return [
    'role_structure' => [
        'admin' => [
            'users' => 'r,d',
            'profile' => 'r,u'
            
        ],
        'user' => [
            'profile' => 'r,u',
            'post' => 'c,r,u,d'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
