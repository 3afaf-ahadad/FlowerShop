<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            ProductSeeder::class,
        ]);

    }
}
\App\Models\User::factory()->create([
    'name' => 'Saadia Admin',
    'email' => 'admin@rose.com',
    'password' => bcrypt('password123'),
]);