<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    
}
