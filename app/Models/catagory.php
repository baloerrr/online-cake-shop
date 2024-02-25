<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class catagory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products (){
        return $this->belongsTo(product::class);
    }
}
