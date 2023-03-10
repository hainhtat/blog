<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin1@email.com',
                'is_admin' => '1',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('12345678'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
