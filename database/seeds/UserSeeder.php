<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 500; $i++) {
            $userData[] = [
                'name' => Str::random(10),
                'email' => Str::random(12).'@gmail.com',
                'password' => Hash::make('password')
            ];
        }

        foreach ($userData as $user) {
            User::create($user);
        }
    }
}
