<?php

use Illuminate\Database\Seeder;
use App\Element;

class ElementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 19 тестовых записей
        $insert = [];
        for ($i = 1; $i < 20; $i++) {
            $insert = array_merge($insert, [['name' => 'Element ' . $i]]);
        }
        Element::insert($insert);
    }
}
