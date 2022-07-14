<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB; // why it dose not work??;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::connection('mysql')->table('categories')->insert([
            'name' => 'First Category',
            'slug' => 'First slug',
            'status' => 'active',

        ]);
        DB::table('categories')->insert([
            'name' => 'second Category',
            'slug' => 'second slug',
            'status' => 'draft',
        ]);


    }
}
