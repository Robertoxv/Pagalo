<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
   protected $guarded = ['id'];
   protected $hidden = ['created_at','updated_at'];
}
