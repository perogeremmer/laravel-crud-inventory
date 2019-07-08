<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CategoryModel::insert([
            'name' => "Makanan"
        ]);

        \App\CategoryModel::insert([
            'name' => "Alat Belajar"
        ]);

        \App\CategoryModel::insert([
            'name' => "Alat Mandi"
        ]);
    }
}
