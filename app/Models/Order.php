<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_address',
        'shipping_city',
        'shipping_region',
        'additional_info',
        'delivery_method',
        'payement_status',
        'customer_id',

    ];

    public static $deliveryOptions =[
        '1' => 'HomeDelivery',
        '2' => 'Pickup',
    ];

    public static $payementOptions =[
        '1' => 'pending',
        '2' => 'paid'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
