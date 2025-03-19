<?php

return [
    [
        "jsx" => true,
        "navbarId" => "dashboard",
        "text" => "Dashboard",
        "priority" => 10,
        "icon" => "ph-gauge",
        "capability" => null,
        "href" => "/dashboard",
        "actives" => ["dashboard"]
    ],
    [
        "jsx" => true,
        "navbarId" => "master-data",
        "text" => "Master Data",
        "priority" => 12,
        "icon" => "ph-table",
        "capability" => null,
        "href" => "/master-data",
        "actives" => ["master-data"]
    ],
    // [
    //     "navbarId" => "menu-user",
    //     "text" => "User",
    //     "priority" => 70,
    //     "icon" => "ph-user",
    //     "capability" => null,
    //     "actives" => ["admin/profile"],
    //     "childs" => [
    //         [
    //             "text" => "Edit Profile Menu",
    //             "priority" => 30,
    //             "capability" => null,
    //             "href" => "dashboard.profile",
    //             "actives" => "admin/profile"
    //         ]
    //     ]
    // ]
];
