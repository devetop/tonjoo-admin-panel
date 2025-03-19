<?php

return [
    'frontend' => [
        'routing' => [
    
            /**
             * definisikan post type apa saja yang di-handle secara otomatis oleh
             * frontend routes
             */
            'post-types' => [
                'page',
                'post',
                'product',
            ],
    
            /**
             * definisikan post type yang dimasukkan ke dalam catch-all
             */
            'catch-all' => [
                'page',
            ],
        ],
    
        /**
         * definisikan template post untuk tipe post yang memiliki template
         * 
         * format
         * [ 'post-type' => [ 'post-template-1', 'post-template-2', 'post-template-3' ] ]
         */
        'page-templates' => [
            'post' => [
                'default',
                'news-page',
                'post-with-slider'
            ],
            'page'=> [
                'default',
                'about-us',
                'contact-us',
                'our-team',
                'slider-gallery',
                'page-with-additional-info',
                'list-post',
                'contact-form',
                'content-html',
            ],
            'product' => [
                'default'
            ],
        ]
    ],
    'term' => [
        /**
         * Daftarkan semua taxonomy yang akan digunakan
         *
         * format
         * [ 'slug' => [ 'title' => 'Judul', 'menu-icon' => 'FA icon atau sejenisnya' ] ]
         */
    
        'taxonomies' => [
            'post_category' => [
                'title'     => 'Category',
                'menu-icon' => 'ph-tag',
            ],
            'post_tag' => [
                'title'     => 'Tag',
                'menu-icon' => 'ph-tag',
            ],
            'product_category' => [
                'title'     => 'Category',
                'menu-icon' => 'ph-tag',
            ],
            'product_tag' => [
                'title'     => 'Tag',
                'menu-icon' => 'ph-tag',
            ],
        ],
    
        /**
         * Pasangan post-type x taxonomy
         *
         * format
         * [ 'post-type' => [ 'taxonomy1', 'taxonomy2', ... ] ]
         */
    
        'post-type-taxonomies' => [
            'post' => [
                'post_category',
                'post_tag',
            ],
            'product' => [
                'product_category',
                'product_tag',
            ]
        ],
    ]
];
