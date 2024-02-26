<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    use HasFactory;
    protected $fillable=['number','name','image','new_price','old_price','status','description'];
    public function Order()
    {
        return $this->hasOne(Order::class);
    }
    public function Payment()
    {
        return $this->hasOne(Payment::class);
    }
}
