<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'origin',
        'brand',
        'quantity',
        'image',
        'category_id',
        'supplier_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier','supplier_id','id');
    }
}
