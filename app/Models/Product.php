<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','user_id','image','price','weight',
            'amount_in_stock','is_available','brand_id','size','color','category_id','deal_status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function product_images()
    {
        return $this->hasMany('App\Models\ProductImages');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function order_references()
    {
        return $this->hasMany('App\Models\OrderReference');
    }

}
