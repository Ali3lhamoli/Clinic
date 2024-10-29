<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->has(Role::factory()->has(Major::factory()))->create([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'password'=> Hash::make('123456789'),
            'phone'=> '01151915789',
        ]);
    }
}
