<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@smkn2balikpapan.sch.id',
            'password' => Hash::make('1admin2345'),
            'level' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
