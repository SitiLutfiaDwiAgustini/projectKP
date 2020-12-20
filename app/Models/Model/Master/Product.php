<?php

namespace App\Models\Model\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'code', 'name', 'purchase_price', 'selling_price', 'information', 'active', 'user_modified', 'stock_available', 'stock_total',
    ];

    public function user_modify(){
        return $this->belongsTo('\App\User', 'user_modified');
    }
}
