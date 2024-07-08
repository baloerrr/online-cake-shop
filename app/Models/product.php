<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\catagory;

class product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function catagory(){
        return $this->belongsTo(catagory::class);
    }

}
