<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(10)->create();

        User::create([
            'username' => 'Ahmad Ikbal Djaya',
            'email' => 'ikbaldjaya@gmail.com',
            'password' => bcrypt('123')
        ]);
        User::create([
            'username' => 'Andi Ahmad Zulkifli Basma',
            'email' => 'andiAhmad@gmail.com',
            'password' => bcrypt('123')
        ]);

        Biodata::create([
            'user_id' => 1,
            'name' => 'Ahmad Ikbal Djaya',
            'birthday' => '2002-08-18',
            'genre' => 'Laki-laki'
        ]);
        Biodata::create([
            'user_id' => 2,
            'name' => 'Andi Ahmad Zulkili Basma',
            'birthday' => '2002-07-07',
            'genre' => 'Laki-laki'
        ]);

    }
}
