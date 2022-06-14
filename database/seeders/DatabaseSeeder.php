<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ahmad Ikbal Djaya',
            'username' => 'ahmad-ikbal-djaya',
            'email' => 'ikbaldjaya@gmail.com',
            'password' => bcrypt('123')
        ]);
        User::create([
            'name' => 'Andi Ahmad Zulkifli Basma',
            'username' => 'andi-ahmad-zullkifli-basma',
            'email' => 'andiAhmad@gmail.com',
            'password' => bcrypt('123')
        ]);

        Biodata::create([
            'user_id' => 1,
            'birthday' => '2002-08-18',
            'genre' => 'Laki-laki'
        ]);
        Biodata::create([
            'user_id' => 2,
            'birthday' => '2002-07-07',
            'genre' => 'Perempuan'
        ]);

        Post::factory(10)->create();
        Comment::factory(10)->create();


    }
}
