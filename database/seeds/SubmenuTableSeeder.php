<?php

use Illuminate\Database\Seeder;
use App\Submenu;

class SubmenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Добавим связи между элементами (из примера)
        $insert = [
            // ['parent_id' => 0, 'child_id' => 1],
            ['parent_id' => 1, 'child_id' => 2],
            ['parent_id' => 1, 'child_id' => 3],
            ['parent_id' => 3, 'child_id' => 4],
            ['parent_id' => 3, 'child_id' => 5],
            ['parent_id' => 1, 'child_id' => 6],
            ['parent_id' => 6, 'child_id' => 4],
            ['parent_id' => 1, 'child_id' => 7],
            ['parent_id' => 1, 'child_id' => 8],
            ['parent_id' => 8, 'child_id' => 3]
        ];

        Submenu::insert($insert);
    }
}
