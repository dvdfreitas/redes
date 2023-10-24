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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'David Freitas',
            'email' => 'david.freitas@aeg1.pt',
            'password' => Hash::make('123')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pinto da Costa',
            'email' => 'pc@aeg1.pt',
            'password' => Hash::make('123')
        ]);

        DB::table('users')->insertOrIgnore([
            'name' => "Deco",
            'email' => "deco@aeg1.pt",
            'password' => Hash::make('password'),
        ]);

        DB::table('abilities')->insertOrIgnore([
            'name' => "Inserir utilizador",
            'slug' => 'insert_user'
        ]);
    }
}
