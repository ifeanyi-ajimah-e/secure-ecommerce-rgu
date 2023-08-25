<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReferences extends Model
{
    use HasFactory;

    // protected $fillable = ['name','description'];

    protected $fillable = ['order_reference_code', 'order_id', 'product_id', 'product_quantity', 'item_unit_price'];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
