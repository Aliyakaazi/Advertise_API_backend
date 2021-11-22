<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table='video_upload';
    public $timestamps = false;
    protected $fillable = [
        'provider_id', 'video', 'video_name', 
    ];
}
