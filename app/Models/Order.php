<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_adress',
        'shipping_city',
        'shipping_region',
        'additional_info',
        'delivery_method',
        'status',
        'customer_id',

    ];

    public static $deliveryOptions =[
        '1' => 'HomeDelivery',
        '2' => 'Pickup',
    ];

    public static $statusOptions =[
        '1' => 'pending',
        '2' => 'paid'
    ];

    public function getStatus(){
        return self::$statusOptions[$this->status];
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }


}
