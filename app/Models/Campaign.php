<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'goal_amount', 'collected_amount','type','banner_image','start_date','end_date', 'created_by'];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}


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




