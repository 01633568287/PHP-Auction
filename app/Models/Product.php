<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'product_name',
        'price',
        'image',
        'description',
        'name_active',
        'user_id',
        'auction_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function productDetail()
    {
        return $this->hasOne(productDetail::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
