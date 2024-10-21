<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Word;
use Illuminate\Support\Facades\DB;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('words')->insert([
            [
                'user_id' => 1,
                'word' => 'aaa',
                'meaning' => 'bbb',
            ],
            [
                'user_id' => 1,
                'word' => 'aaaaaaaa',
                'meaning' => 'bbbaaaa',
            ]
        ]);
    }
}
