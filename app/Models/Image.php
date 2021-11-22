<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    
    protected $table='image_upload';
    public $timestamps = false;

    protected $fillable = [
        'provider_id', 'image', 'image_name', 
    ];
    
    
    
    
}
