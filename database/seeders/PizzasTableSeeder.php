<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            [
                'name' => 'Margherita',
                'description' => 'Tomato sauce, mozzarella and fresh basil',
                'price' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pepperoni',
                'description' => 'Tomato sauce, mozzarella and pepperoni',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Prosciutto e Funghi',
                'description' => 'Tomato sauce, mozzarella, mushrooms and ham',
                'price' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
