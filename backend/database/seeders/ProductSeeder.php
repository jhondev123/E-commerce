<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Produto 1',
                'description' => 'Descrição do Produto 1',
                'price' => 10.99,
            ],
            [
                'name' => 'Produto 2',
                'description' => 'Descrição do Produto 2',
                'price' => 19.99,
            ],
            [
                'name' => 'Produto 3',
                'description' => 'Descrição do Produto 3',
                'price' => 5.99,
            ],
        ]);
    }
}
