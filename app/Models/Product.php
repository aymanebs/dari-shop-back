<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable =[

        'name',
        'price',
        'category_id',
        'stock',
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

    public function carts(){
        return $this->belongsToMany(Cart::class);
    }
}
