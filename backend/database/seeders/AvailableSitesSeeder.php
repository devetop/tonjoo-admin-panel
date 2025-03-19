<?php

namespace Database\Seeders;

use App\Models\AvailableSites;
use Illuminate\Database\Seeder;

class AvailableSitesSeeder extends Seeder
{
    public function __construct(
        private AvailableSites $availableSites,
    ) { }
    
    public function run()
    {
        $sites = [
            [
                'name' => 'web',
                'base_url' => 'http://127.0.0.1:8080',
                'is_cors_allowed' => 1,
            ],
            [
                'name' => 'dashboard',
                'base_url' => 'http://127.0.0.1:8090',
                'is_cors_allowed' => 1,
            ],
            [
                'name' => 'docker web',
                'base_url' => 'https://dev.local',
                'is_cors_allowed' => 1,
            ],
            [
                'name' => 'docker dashboard',
                'base_url' => 'https://dashboard.dev.local',
                'is_cors_allowed' => 1,
            ],
        ];

        foreach ($sites as $site) {
            $this->availableSites->firstOrCreate($site);
        }
    }
}
