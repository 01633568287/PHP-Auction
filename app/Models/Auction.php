<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'auctions';

    protected $fillable = [
        'name',
        'status',
        'start_time',
        'end_time',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function bids(){
        return $this->hasMany(Bid::class);
    }
}
