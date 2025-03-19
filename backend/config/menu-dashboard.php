<?php

return [
    [
        'navbarId'          => 'dashbord',
        'text'              => 'Dashboard',
        'priority'          => 10,
        'icon'              => 'ph-gauge',
        'capability'        => null,
        'href'              => 'dashboard.index',
        'actives'           => ['admin']
    ],
    [
        'navbarId'          => 'menu-user',
        'text'              => 'User',
        'priority'          => 70,
        'icon'              => 'ph-user',
        'capability'        => null,
        'actives'           => [
            'admin/profile',
        ],
        'childs'            => [
            [
                'text'              => 'Edit Profile Menu',
                'priority'          => 30,
                'capability'        => null,
                'href'              => 'dashboard.profile',
                'actives'           => 'admin/profile',
            ]
        ]
    ]
];
