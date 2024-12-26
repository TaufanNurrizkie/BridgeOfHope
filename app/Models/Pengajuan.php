<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $fillable = ['title', 'description', 'target_amount', 'deadline', 'image_path'];
}
