<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable =[

        'name',
        'price',
        'category_id',
        'quantity',
        'seller_id',
        'description',
        'status',

    ];

    public static $statusOptions = [
        '1' => 'pending',
        '2' => 'accepted',
    ];

    Public function getStatus(){
        return self::$statusOptions[$this->status];
    }


    public function category(){
        
        return $this->belongsTo(Category::class);
    }

    public function seller(){
        
        return $this->belongsTo(Seller::class);
    }
}
