<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','item_count','sum_cost_for_item',
                'user_id','item_unit_cost','fulfilment_date','delivery_fee','status'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function order_references()
    {
        return $this->hasMany('App\Models\OrderReference');
    }


}
