<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'status',
        'customer_id'
    ];

    public static $statusOptions =[

        '1' => 'pending',
        '2' => 'completed',
        '3' => 'cancelled'

    ];

    //function to get the status

    public function getStatus(){
        return self::$statusOptions[$this->status];
    }

    // Relations between models

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    
}
