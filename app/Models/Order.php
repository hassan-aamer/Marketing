<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['product_id','offer_id','email','phone','price','payment_id','location'];
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function offers(): BelongsTo
    {
        return $this->belongsTo(offer::class);
    }
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
