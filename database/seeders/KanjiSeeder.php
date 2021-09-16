<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kanji;

class KanjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = new Kanji;
        // $data->kanji='日本語';
        // $data->hira = 'にほんご';
        // $data->save();
        DB::table('kanjis')->insert([
            'kanji_id'=>'1000',
            'kanji'=>'日本語',
            'hira'=>'にほんご'
        ]);
    }
}
