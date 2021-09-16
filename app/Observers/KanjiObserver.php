<?php

namespace App\Observers;

use App\Models\Kanji;
use Illuminate\Support\Facades\DB;

class KanjiObserver
{
    /**
     * Handle the Kanji "created" event.
     *
     * @param  \App\Models\Kanji  $kanji
     * @return void
     */
    public function created(Kanji $kanji)
    {
        $empty = Kanji::all()->last();
        if($empty===null)
        {
            DB::table('counters')->insert(['table_name'=>'Kanji','data_counter'=>1]);
            DB::table('Kanji')->where("kanji_id",-1)->update(['kanji_id',1]);
        }
        else{
            
        }
    }

    /**
     * Handle the Kanji "updated" event.
     *
     * @param  \App\Models\Kanji  $kanji
     * @return void
     */
    public function updated(Kanji $kanji)
    {
        //
    }

    /**
     * Handle the Kanji "deleted" event.
     *
     * @param  \App\Models\Kanji  $kanji
     * @return void
     */
    public function deleted(Kanji $kanji)
    {
        //
    }

    /**
     * Handle the Kanji "restored" event.
     *
     * @param  \App\Models\Kanji  $kanji
     * @return void
     */
    public function restored(Kanji $kanji)
    {
        //
    }

    /**
     * Handle the Kanji "force deleted" event.
     *
     * @param  \App\Models\Kanji  $kanji
     * @return void
     */
    public function forceDeleted(Kanji $kanji)
    {
        //
    }
}
