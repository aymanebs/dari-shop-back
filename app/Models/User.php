<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    public static $statusOptions=[
        '1' => 'active',
        '2' => 'banned'
    ];

    //function to get the status

    public function getStatus(){
        return self::$statusOptions[$this->status];
    }


    // Relations between models 

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function customer(){
        return $this->hasOne(Customer::class);
    }

    public function seller(){
        return $this->hasOne(Seller::class);
    }
}
