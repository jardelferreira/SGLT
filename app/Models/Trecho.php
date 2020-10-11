<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trecho extends Model
{
    use HasFactory;

    protected $fillable = ['name','lote_id'];

    public function canteiros()
    {
        return $this->hasMany(Courtyard::class);
    }
}
