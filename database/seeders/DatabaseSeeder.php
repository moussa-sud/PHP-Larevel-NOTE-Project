<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notes;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'id'=>1, 
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=>bcrypt('pass123')
        ]);


        // in here we are adding randomly 100 elements by the command bellow 
        // additionaly "php artisan db:seed"

        Notes::factory(30)->create(); 
    }
}
