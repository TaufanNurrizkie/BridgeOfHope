<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $dates = ['end_date'];

    public function getRemainingDaysAttribute()
    {
        $now = Carbon::now();
        if ($this->end_date) {
            // Hitung selisih hari dan pastikan selalu bilangan bulat
            $remainingDays = intval($now->diffInDays($this->end_date, false));
            return max($remainingDays, 0); // Hindari nilai negatif
        }
        return 0;
    }
}
