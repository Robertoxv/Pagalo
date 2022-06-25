<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articulos extends Model
{
    use HasFactory;

    protected $table = 'articulos';
   protected $guarded = ['id'];
   protected $hidden = ['created_at','updated_at'];
}
