<?php

use App\Models\Foundation\User;
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
        User::firstOrCreate([
            'name' => "Milkmeowo",
            'email' => 'Milkmeowo@gmail.com',
            'password' => app('hash')->make('1234567890'),
            'remember_token' => str_random(10),
        ]);

        factory(User::class, 50)->create();
    }
}
