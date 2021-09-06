<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description','base_id'];

    public function canteiro()
    {
        return $this->belongsTo(Courtyard::class,'base_id');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function base()
    {
        return $this->belongsTo(Base::class);
    }
}
