<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\product;

class keranjang extends Model
{
    use HasFactory;
    protected $guarded =['id'] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function checkout()
    {
        return $this->hasMany(Checkout::class);
    }
}
