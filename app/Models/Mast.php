<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mast extends Model
{
    use HasFactory;

    protected $fillable = ['height','weight','description'];
}
