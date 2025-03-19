<?php

namespace App\Traits;

trait HasMockTrait
{
    private $seedId = 0;

    // untuk menambah kolom id di data
    public function withId()
    {
        return $this->state(function() {
            return [
                'id' => $this->seedId
            ];
        });
    }

    public function withTimestamps($isHasSoftDelete = false)
    {
        return $this->state(function() use($isHasSoftDelete) {
            $state = [
                'created_at' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
                'updated_at' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            ];

            if ($isHasSoftDelete) {
                $state['deleted_at'] = $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d');
            }

            return $state;
        });
    }

    // contoh with, digunakan untuk relasi, untuk mocking data bersarang
    public function with(array $relations)
    {
        return $this->state(function($item) use($relations) {
            $state = [];

            if (in_array('created_by_user', $relations)) {
                // $state['created_by_user'] = app(UserFactory::class)->setSeedId($item['created_by'])->makeOne()->toArray();
            }
            
            return $state;
        });
    }

    // untuk mock get one by id
    public function setSeedId($seedId)
    {
        $this->seedId = $seedId;
        return $this;
    }
}