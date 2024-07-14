<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'id' => '9c8466c0-bd85-4e43-b287-0470e3444256',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        Task::factory()->create([
            'user_id' => '9c8466c0-bd85-4e43-b287-0470e3444256'
            ]
        );
    }
}
