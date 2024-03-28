<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Seller extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'adress'
    ];

    // Relations between models

    public function user(){
        return $this->belongsTo(User::class);
    }
}
