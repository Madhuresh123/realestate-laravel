<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllType extends Model
{
    protected $table = 'all_type';
    protected $fillable = ['typename', 'typeicon'];

}
