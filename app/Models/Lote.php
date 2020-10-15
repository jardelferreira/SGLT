<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $fillable = ['name','project_id'];

    public function trechos()
    {
        return $this->hasMany(Trecho::class);
    }

    public function projeto()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
}
