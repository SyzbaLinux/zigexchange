<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CurrencySeeder::class);

        \App\Models\User::factory()->create( [
            'name'              => 'System Administrator',
            'email'             => 'admin@example.com',
            'password'          =>  Hash::make('Pass_12345'),
            'email_verified_at' =>  now(),
        ]);
    }
}
