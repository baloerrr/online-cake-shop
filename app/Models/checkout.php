<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

    public function metodePembayaran()
    {
        return $this->hasMany(metodePembayaran::class);
    }
}
