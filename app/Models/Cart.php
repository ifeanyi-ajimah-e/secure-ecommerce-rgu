<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['size','product_id','color','quantity','price','total_price','user_id'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}

