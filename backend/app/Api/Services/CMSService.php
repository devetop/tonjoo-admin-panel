<?php

namespace App\Api\Services;

use App\Api\Contracts\CMSInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class CMSService implements CMSInterface
{
    private $booted = false;
    private $enabled = null;

    private Application $app;

    /**
     * @param Application $app
     */
    public function __construct($app = null)
    {
        if (! $app) {
            $app = app();   //Fallback when $app is not given
        }

        $this->app = $app;
    }

    public function enable()
    {
        $this->enabled = true;

        if (! $this->booted) {
            $this->boot();
        }
    }

    public function boot()
    {
        $this->capability();
        $this->sideMenu();

        \Eventy::addAction('cms.backend', function () {
            CMSRoute::backend();
        });

        // \Eventy::addAction('cms.frontend', function ($router) {
        //     CMSRoute::frontend();
        // });

        \Eventy::addFilter('option.general.keys', function ($args) {
            return array_merge($args, [
                'home_page_type' => 'default',
                'home_page' => null,
            ]);
        });

        config()->set('menu-web', array_merge(
            config()->get('menu-web'),
            [
                [
                    "jsx" => true,
                    "navbarId" => "form",
                    "text" => "Form",
                    "priority" => 11,
                    "icon" => "ph-clipboard",
                    "capability" => null,
                    "href" => "/form",
                    "actives" => ["form"]
                ],
            ]
        ));

        $this->booted = true;
    }

    public function isEnabled()
    {
        return $this->enabled;
    }

    private function capability()
    {
        // Post capability
        add_capability('Post', 'post');
        add_capability('List Post', 'list-post', 'post');
        add_capability('Add Post', 'add-post', 'post');
        add_capability('Edit Post', 'edit-post', 'post');
        add_capability('Delete Post', 'delete-post', 'post');

        // Page capability
        add_capability('Page', 'page');
        add_capability('List Page', 'list-page', 'page');
        add_capability('Add Page', 'add-page', 'page');
        add_capability('Edit Page', 'edit-page', 'page');
        add_capability('Delete Page', 'delete-page', 'page');

        // Product capability
        add_capability('Product', 'product');
        add_capability('List Product', 'list-product', 'product');
        add_capability('Add Product', 'add-product', 'product');
        add_capability('Edit Product', 'edit-product', 'product');
        add_capability('Delete Product', 'delete-product', 'product');

        // Media capability
        add_capability('Media', 'media');
        add_capability('List Media', 'list-media', 'media');
        add_capability('Add Media', 'add-media', 'media');
        add_capability('Edit Media', 'edit-media', 'media');
        add_capability('Delete Media', 'delete-media', 'media');

        // Taxonomy capability
        add_capability('Taxonomy', 'taxonomy');
        add_capability('List Taxonomy', 'list-taxonomy', 'taxonomy');
        add_capability('Add Taxonomy', 'add-taxonomy', 'taxonomy');
        add_capability('Edit Taxonomy', 'edit-taxonomy', 'taxonomy');
        add_capability('Delete Taxonomy', 'delete-taxonomy', 'taxonomy');

        // Option
        add_capability('Menu Option', 'menu-option', 'option');
        add_capability('Banner Option', 'banner-option', 'option');
        add_capability('Available Sites', 'available-sites', 'option');
        add_capability('Frontend Web Theme Options', 'frontend-web-theme-options', 'option');
    }

    private function sideMenu()
    {
        // Post (post-type) menu
        add_side_menu([
            'navbarId'          => 'menu-post',
            'text'              => 'Post',
            'priority'          => 20,
            'icon'              => 'ph-push-pin',
            'capability'        => 'post',
            'actives'           => [
                'admin/post',
                'admin/post/create',
                'admin/post/category',
                'admin/post/tag',
            ],
            'childs'            => [
                [
                    'text'              => 'Add Post',
                    'priority'          => 10,
                    'capability'        => 'add-post',
                    'href'              => 'cms.post.create',
                    'actives'           => 'admin/post/create',
                ],
                [
                    'text'              =>  'List Post',
                    'priority'          => 20,
                    'capability'        => 'list-post',
                    'href'              => 'cms.post',
                    'actives'           => 'admin/post',
                ],
                [
                    'text'              => 'Category',
                    'priority'          => 30,
                    'capability'        => 'list-taxonomy',
                    'href'              => 'cms.post.category.index',
                    'actives'           => "admin/post/category",
                ],
                [
                    'text'              => 'Tag',
                    'priority'          => 40,
                    'capability'        => 'list-taxonomy',
                    'href'              => 'cms.post.tag.index',
                    'actives'           => "admin/post/tag",
                ],
            ],
        ]);

        // Page (post-type) menu
        add_side_menu([
            'navbarId'          => 'menu-page',
            'text'              => 'Page',
            'priority'          => 40,
            'icon'              => 'ph-book',
            'capability'        => 'page',
            'actives'           => [
                'admin/page',
                'admin/page/create',
            ],
            'childs'            => [
                [
                    'text'              => 'Add Page',
                    'priority'          => 10,
                    'capability'        => 'add-page',
                    'href'              => 'cms.page.create',
                    'actives'           => 'admin/page/create',
                ],
                [
                    'text'              => 'List Page',
                    'priority'          => 20,
                    'capability'        => 'list-page',
                    'href'              => 'cms.page',
                    'actives'           => 'admin/page',
                ],
            ],
        ]);

        // Product (product-type) menu
        add_side_menu([
            'navbarId'          => 'menu-product',
            'text'              => 'Product',
            'priority'          => 30,
            'icon'              => 'ph-book',
            'capability'        => 'product',
            'actives'           => [
                'admin/product',
                'admin/product/create',
            ],
            'childs'            => [
                [
                    'text'              => 'Add Product',
                    'priority'          => 10,
                    'capability'        => 'add-product',
                    'href'              => 'cms.product.create',
                    'actives'           => 'admin/product/create',
                ],
                [
                    'text'              => 'List Product',
                    'priority'          => 20,
                    'capability'        => 'list-product',
                    'href'              => 'cms.product',
                    'actives'           => 'admin/product',
                ],
                [
                    'text'              => 'Category',
                    'priority'          => 30,
                    'capability'        => 'add-taxonomy',
                    'href'              => 'cms.product.category.index',
                    'actives'           => "admin/product/category",
                ],
                [
                    'text'              => 'Tag',
                    'priority'          => 40,
                    'capability'        => 'add-taxonomy',
                    'href'              => 'cms.product.tag.index',
                    'actives'           => "admin/product/tag",
                ],
            ],
        ]);

        // Media file menu
        add_side_menu([
            'navbarId'          => 'menu-media',
            'text'              => 'Media',
            'priority'          => 50,
            'icon'              => 'ph-image',
            'capability'        => 'media',
            'href'              => 'cms.media',
            'actives'           => 'admin/media',
        ]);

        // Taxonomy menu

        // Menu Option
        add_side_submenu([
            'text'              => 'Menu',
            'priority'          => 20,
            'capability'        => 'menu-option',
            'href'              => 'cms.option.menu',
            'actives'           => 'admin/option/menu',
        ], 'menu-options');

        // Menu Banner
        add_side_submenu([
            'text'              => 'Banner',
            'priority'          => 30,
            'capability'        => 'banner-option',
            'href'              => 'cms.option.banner',
            'actives'           => 'admin/option/banner',
        ], 'menu-options');

        // Available Sites Api
        // setting website manasaja yang bisa mengakses api 
        add_side_submenu([
            'text'              => 'Available Sites',
            'priority'          => 40,
            'capability'        => 'available-sites',
            'href'              => 'cms.option.available-sites.index',
            'actives'           => 'admin/option/available-sites',
        ],'menu-options');

        add_side_submenu([
            'text'              => 'Frontend Web Theme Options',
            'priority'          => 50,
            'capability'        => 'frontend-web-theme-options',
            'href'              => 'cms.option.frontend-web-theme-options.edit',
            'actives'           => 'admin/option/frontend-web-theme-options',
        ],'menu-options');
    }
}
