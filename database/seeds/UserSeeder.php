<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public $users;

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        $user_seed_number = 50000;
        $user_seed_chunk =  5000;
        $users_seed = factory(User::class,$user_seed_number)->make();

        $users_seed_chunks = $users_seed->chunk($user_seed_chunk);

        foreach ($users_seed_chunks as $chunk) {
            User::insert($chunk->toArray());
        }

    }
}
