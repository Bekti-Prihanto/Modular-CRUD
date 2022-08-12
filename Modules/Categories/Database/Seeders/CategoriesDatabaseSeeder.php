<?php

namespace Modules\Categories\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Categories\Entities\Category;

class CategoriesDatabaseSeeder extends Seeder
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

        Category::create([
            'name' => 'Backend',
        ]);
        Category::create([
            'name' => 'Frontend',
        ]);
        Category::create([
            'name' => 'UI/UX',
        ]);
    }
}
