<?php

namespace Database\Seeders;

use App\Api\Contracts\OptionInterface;
use App\Api\Contracts\PostInterface;
use App\Http\Enums\PostStatus;
use App\Models\Post;
use App\Models\Taxonomy;
use App\Models\User;
use Illuminate\Database\Seeder;

class CMSSeeder extends Seeder
{
    public function __construct(
        private OptionInterface $optionApi,
        private PostInterface $postApi,
        private Post $postModel,
        private Taxonomy $taxonomyModel,
    ) {
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeding Option Menu
        $menuData = [
            [
                'class' => null,
                'display' => 'none',
                'menus' => [
                    [
                        'class' => null,
                        'display' => 'none',
                        'menus' => [],
                        'name' => 'Organization Structure',
                        'url' => '#',
                        'is_inertia_link' => true,
                    ],
                    [
                        'class' => null,
                        'display' => 'none',
                        'menus' => [],
                        'name' => 'History',
                        'url' => '#',
                        'is_inertia_link' => true,
                    ],
                    [
                        'class' => null,
                        'display' => 'none',
                        'menus' => [
                            [
                                'display' => 'none',
                                'name' => 'Submenu Level 3 - 1',
                                'url' => '#',
                            ],
                            [
                                'display' => 'none',
                                'name' => 'Submenu Level 3 - 2',
                                'url' => '#',
                            ],
                            [
                                'display' => 'none',
                                'name' => 'Submenu Level 3 - 3',
                                'url' => '#',
                            ],
                            [
                                'display' => 'none',
                                'name' => 'Submenu Level 3 - 4',
                                'url' => '#',
                            ],
                            [
                                'display' => 'none',
                                'name' => 'Submenu Level 3 - 5',
                                'url' => '#',
                            ],
                        ],
                        'name' => 'Vision and Mission',
                        'url' => '#',
                        'is_inertia_link' => true,
                    ],
                ],
                'name' => 'About Us',
                'url' => '/about-us',
                'is_inertia_link' => true,
            ],
            [
                'class' => null,
                'display' => 'none',
                'menus' => [],
                'name' => 'Portofolio',
                'url' => '/archive/product',
                'is_inertia_link' => true,
            ],
            [
                'class' => null,
                'display' => 'none',
                'menus' => [
                    [
                        'display' => 'none',
                        'name' => 'Teknologi',
                        'url' => '/archive/post?category=teknologi',
                    ],
                    [
                        'display' => 'none',
                        'name' => 'Berita',
                        'url' => '/archive/post?category=berita',
                    ],
                    [
                        'display' => 'none',
                        'name' => 'Bisnis',
                        'url' => '/archive/post?category=bisnis',
                    ],
                    [
                        'display' => 'none',
                        'name' => 'Kesehatan',
                        'url' => '/archive/post?category=kesehatan',
                    ],
                ],
                'name' => 'Post',
                'url' => '/archive/post',
                'is_inertia_link' => true,
            ],
        ];
        if(!$this->optionApi->get('menu', false)) {
            $this->optionApi->set(
                'menu',
                $menuData
            );
        };

        // Seeding About Us and Our Team Page
        $pages = ['About Us', 'Our Team', 'Contact Us'];
        foreach ($pages as $page) {
            $newPage = $this->postModel->firstOrCreate([
                'title' => $page,
                'slug'  => strtolower(str_replace(' ', '-', $page)),
                'content' => '<p>kosong</p>',
                'type' => 'page',
                'author_id' => User::first()->id,
                'status' => PostStatus::PUBLISH,
            ]);
            $this->postApi->setMeta($newPage, 'page_template', strtolower(str_replace(' ', '-', $page)));
        }

        // set about-us meta
        $aboutUsPage = $this->postModel->where('slug', 'about-us')->first();
        $this->postApi->setMeta($aboutUsPage, 'about_us', $this->getAboutUsMeta(), true);

        // Seeding Taxonomies
        $taxonomy = config('cms.term.taxonomies', []);
        foreach ($taxonomy as $key => $value) {
            $taxonomy = $this->taxonomyModel->firstOrCreate(['name' => $key]);

            if($taxonomy->terms->count() >= 4) {
                continue;
            }

            if($key === 'post_category') {
                $newTaxos = ['Teknologi', 'Berita', 'Bisnis', 'Kesehatan'];
            } else if($key == 'post_tag') {
                $newTaxos = ['JavaScript', 'Viral', 'Keuangan', 'Kesejahteraan'];
            } else if($key == 'product_category') {
                $newTaxos = ['Aplikasi Mobile', 'Aplikasi Web', 'Perangkat Lunak Desktop', 'Layanan Cloud'];
            } else if($key == 'product_tag') {
                $newTaxos = ['Android', 'ReactJs', 'Electron', 'Linux'];
            }

            foreach ($newTaxos as $newTaxo) {
                $taxonomy->terms()->insert([
                    'name' => $newTaxo,
                    'slug' => strtolower($newTaxo),
                    'taxonomy_id' => $taxonomy->id
                ]);
            }
        }

        $users = User::whereRelation('roles', 'name', 'Frontend Dashboard User')->get('id');
        foreach ($users as $user) {
            foreach (['post', 'product'] as $type) {
                if($this->postModel->where([
                    'type' => $type,
                    'author_id' => $user->id
                ])->count() < 20) {
                    Post::factory(20)->create(['type' => $type, 'author_id' => $user->id])->each(function(Post $post) use($type) {
                        $this->postApi->setTerms($post, $type.'_category', $this->getRandomTermsByTaxonomyName($type.'_category', 1));
                        $this->postApi->setTerms($post, $type.'_tag', $this->getRandomTermsByTaxonomyName($type.'_tag', 1));
                        $this->postApi->setMeta($post->id, 'page_template', 'default');
                    });
                };
            }
        }
    }

    private function getRandomTermsByTaxonomyName($taxonomyName, $count) {
        return fake()->randomElements($this->taxonomyModel->where('name', $taxonomyName)->first()->terms->pluck('id')->toArray(), $count);
    }

    private function getAboutUsMeta() {
        $aboutUs = [
            "section1" => [
                "header" => [
                    "title" => "CORE VALUES",
                    "subtitle" => "Pijar berdedikasi untuk membaca peluang masa depan, mengakselerasi potensi, dan menciptakan kesetaraan"
                ],
                "cards" => [
                    [
                        "image_url" => fe_url("/assets/frontend/about-us/ph_line-segments.png"),
                        "title" => "Envisioning",
                        "description" => "Pijar berdedikasi untuk menganalisis peluang di masa mendatang berbasis data & pendekatan ilmiah.",
                        "image_file" => "",
                        "image_filename" => "ph_line-segments.png"
                    ],
                    [
                        "image_url" => fe_url("/assets/frontend/about-us/ph_chart-pie-slice.png"),
                        "title" => "Elevating",
                        "description" => "Pijar berupaya untuk mengakselerasi potensi sumber daya yang telah ada, agar mampu berdaya saing global, serta mampu menjawab tantangan di masa depan.",
                        "image_file" => "",
                        "image_filename" => "ph_chart-pie-slice.png"
                    ],
                    [
                        "image_url" => fe_url("/assets/frontend/about-us/ph_gauge.png"),
                        "title" => "Elevating",
                        "description" => "Pijar hadir untuk mengoptimasi pemanfaatan akses yang setara di segala bidang, bagi setiap orang, tanpa terkecuali.",
                        "image_file" => "",
                        "image_filename" => "ph_gauge.png"
                    ]
                ]
            ],
            "section2" => [
                "header" => [
                    "title" => "OUR TEAMS",
                    "subtitle" => "Bergerak bersama, berpijar bersama"
                ],
                "cards" => []
            ],
            "section3" => [
                "header" => [
                    "title" => "THEME",
                    "subtitle" => "Membangun talenta masa depan & bumi yang ramah untuk ditinggali"
                ],
                "cards" => [
                    [
                        "image_url" => fe_url("/assets/frontend/about-us/ph_leaf.png"),
                        "title" => "Future Planet",
                        "content" => "<p>Menganalisis &amp; merencanakan masa depan bumi agar menjadi tempat hidup yang nyaman. Pijar akan terlibat dalam isu strategis seputar =></p>\r\n<ul>\r\n<li>Renewable energy</li>\r\n<li>Carbon trading</li>\r\n<li>Innovative waste management</li>\r\n<li>Electric vehicles and million-mile batteries</li>\r\n<li>Grid management</li>\r\n<li>Sustainable agriculture</li>\r\n<li>Etc</li>\r\n</ul>",
                        "image_file" => "",
                        "image_filename" => "ph_leaf.png"
                    ],
                    [
                        "image_url" => fe_url("/assets/frontend/about-us/ph_users-three.png"),
                        "title" => "Future Planet",
                        "content" => "<p>Menganalisis &amp; merencanakan masa depan bumi agar menjadi tempat hidup yang nyaman. Pijar akan terlibat dalam isu strategis seputar =></p>\r\n<ul>\r\n<li>Renewable energy</li>\r\n<li>Carbon trading</li>\r\n<li>Innovative waste management</li>\r\n<li>Electric vehicles and million-mile batteries</li>\r\n<li>Grid management</li>\r\n<li>Sustainable agriculture</li>\r\n<li>Etc</li>\r\n</ul>",
                        "image_file" => "",
                        "image_filename" => "ph_users-three.png"
                    ],
                ]
            ]
        ];

        for ($i=1; $i <= 16; $i++) { 
            $aboutUs['section2']['cards'][] = [
                "image_url" => fe_url("/assets/frontend/about-us/default-person.jpg"),
                "name" => "Persin " . $i,
                "job_title" => "Job Title " . $i,
                "social_fb" => "#",
                "social_x" => "#",
                "social_in" => "#",
                "image_file" => "",
                "image_filename" => "default-person.jpg"
            ];
        }
        
        return $aboutUs;
    }
}