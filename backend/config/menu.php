<?php

return [
    [
        'navbarId'          => 'dashbord',
        'text'              => 'Dashboard',
        'priority'          => 10,
        'icon'              => 'ph-gauge',
        'capability'        => null,
        'href'              => 'cms.dashboard',
        'actives'           => ['admin']
    ],
    [
        'navbarId'          => 'menu-options',
        'text'              => 'Options',
        'priority'          => 60,
        'icon'              => 'ph-sliders-horizontal',
        'capability'        => 'option',
        'actives'           => [
            'admin/option/general',
            'admin/option/menu',
            'admin/option/banner',
        ],
        'childs'            => [
            [
                'text'              => 'General',
                'priority'          => 10,
                'capability'        => 'general-option',
                'href'              => 'cms.option.general',
                'actives'           => 'admin/option/general',
            ],
        ]
    ],
    [
        'navbarId'          => 'menu-user',
        'text'              => 'User',
        'priority'          => 70,
        'icon'              => 'ph-user',
        'capability'        => null,
        'actives'           => [
            'admin/user*',
            'admin/profile',
            'admin/role*',
        ],
        'childs'            => [
            [
                'text'              => 'Add User',
                'priority'          => 10,
                'capability'        => 'add-user',
                'href'              => 'cms.user.create',
                'actives'           => 'admin/user/create',
            ],
            [
                'text'              => 'List User',
                'priority'          => 20,
                'capability'        => 'list-user',
                'href'              => 'cms.user',
                'actives'           => 'admin/user',
            ],
            [
                'text'              => 'Role & Permissions',
                'priority'          => 30,
                'capability'        => 'list-role',
                'href'              => 'cms.role',
                'actives'           => 'admin/role',
            ],
            [
                'text'              => 'Edit Profile Menu',
                'priority'          => 30,
                'capability'        => null,
                'href'              => 'cms.profile.edit',
                'actives'           => 'admin/profile',
            ]
        ]
    ]
];
