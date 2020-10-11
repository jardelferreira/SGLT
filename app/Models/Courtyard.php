<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courtyard extends Model
{
    use HasFactory;

    protected $fillable = ['name','location','trecho_id','description'];
}
