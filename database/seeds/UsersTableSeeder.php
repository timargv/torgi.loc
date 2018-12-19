<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Тимур Rgv',
            'email' => 'tima.rgv@mail.ru',
            'email_verified_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'role' => 'admin',
            'remember_token' => str_random(10),
        ]);
        User::create([
                'name' => 'Анастасия Арькова',
                'email' => 'm4atis@yandex.ru',
                'email_verified_at' => now(),
                'password' => '$2y$10$rC.FMOoWzUYGHCpzuPWRhu3vWGD2/QQ6l0CDyeAxGI0VnCJRStes.',
                'role' => 'user',
                'remember_token' => str_random(10),
            ]);
        User::create([
                'name' => 'Наталия Кольцова',
                'email' => 'm1atis@yandex.ru',
                'email_verified_at' => now(),
                'password' => '$2y$10$rC.FMOoWzUYGHCpzuPWRhu3vWGD2/QQ6l0CDyeAxGI0VnCJRStes.',
                'role' => 'user',
                'remember_token' => str_random(10),
            ]
        );
        factory(User::class, 10)->create();
    }
}
