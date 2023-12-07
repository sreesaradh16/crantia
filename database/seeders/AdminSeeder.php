<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
            ]
        ];

        foreach ($admins as $admin) {
            $data =  Admin::find($admin['id']);
            if ($data) {
                $data->name = $admin['name'];
                $data->email = $admin['email'];
                $data->password = $admin['password'];
                $data->save();
            } else {
                $data = Admin::create($admin);
            }
        }
    }
}
