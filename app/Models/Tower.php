<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tower extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function types()
    {
        return DB::table('types')->where('model','Torres')->get();
    }
}
