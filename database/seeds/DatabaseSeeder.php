<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \App\User::create([
            'name' => "Motiur",
            'email' => "motiur@gmail.com",
            'password' => \Illuminate\Support\Facades\Hash::make("123456")
        ]);

        \App\Writer::create([
            'name' => "Motiur",
            'email' => "motiur@gmail.com1",
            'password' => \Illuminate\Support\Facades\Hash::make("123456")
        ]);

        \App\Writer::create([
            'name' => "Sadhan",
            'email' => "motiur@gmail.com2",
            'password' => \Illuminate\Support\Facades\Hash::make("123456")
        ]);

        \App\Writer::create([
            'name' => "Maha",
            'email' => "motiur@gmail.com3",
            'password' => \Illuminate\Support\Facades\Hash::make("123456")
        ]);
    }
}
