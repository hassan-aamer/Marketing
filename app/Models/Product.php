<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','image','price','status','description'];

    public function Reviews()
    {
        return $this->hasOne(review::class, 'user_id');
    }
}
