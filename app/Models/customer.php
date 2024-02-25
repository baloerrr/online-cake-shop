<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'name',
        'email',
        'alamat',
        'no_hp',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
