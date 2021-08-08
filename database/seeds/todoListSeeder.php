<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class todoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'comment' => 'testComment',
            'state' => false,
        ];
        DB::table('todos')->insert($param);

        $param = [
            'comment' => 'テストのコメントを挿入する...',
            'state' => true,
        ];
        DB::table('todos')->insert($param);

        $param = [
            'comment' => '君のコメントを挿入する...',
            'state' => false,
        ];
        DB::table('todos')->insert($param);
    }
}
