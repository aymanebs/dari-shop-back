<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        "amount",
        "payment_method",
        "status",
        "order_id"
    ];

    public static $statusOptions =[
        '1' =>'unpaid',
        '2' =>'paid'
    ];

    public function getStatus(){
        return self::$statusOptions[$this->status];
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
