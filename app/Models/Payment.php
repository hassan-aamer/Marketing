<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=['product_id','offer_id','amount','transaction_time','transaction'];

    public function Order()
    {
        return $this->hasOne(Order::class);
    }
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
    public function Offer()
    {
        return $this->belongsTo(offer::class);
    }
}
