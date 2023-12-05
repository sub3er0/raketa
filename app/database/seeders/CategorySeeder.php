<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Категория 1'
            ],
            [
                'id' => 2,
                'name' => 'Категория 2'
            ],
            [
                'id' => 3,
                'name' => 'Категория 3'
            ],
            [
                'id' => 4,
                'name' => 'Категория 4'
            ],
        ]);
    }
}
