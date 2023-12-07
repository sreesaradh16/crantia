<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            [
                'id' => 1,
                'name' => 'male',
            ],
            [
                'id' => 2,
                'name' => 'female',
            ],
            [
                'id' => 3,
                'name' => 'other',
            ]
        ];

        foreach ($genders as $gender) {
            $data =  Gender::find($gender['id']);
            if ($data) {
                $data->name = $gender['name'];
                $data->save();
            } else {
                $data = Gender::create($gender);
            }
        }
    }
}
