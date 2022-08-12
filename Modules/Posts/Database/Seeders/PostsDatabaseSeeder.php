<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Posts\Entities\Post;
use Illuminate\Database\Eloquent\Model;

class PostsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        Post::create([
            'title' => 'Web Programming',
            'user_id' => 1,
            'content'=> 'Lorem ipsum dolor sit amet.'
        ]);

        Post::create([
            'title' => 'Personal',
            'user_id' => 1,
            'content'=> 'Lorem ipsum dolor sit amet.'
        ]);
        
        Post::create([
            'title' => 'Web Design',
            'user_id' => 1,
            'content'=> 'Lorem ipsum dolor sit amet.'
        ]);
    }
}
