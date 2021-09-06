<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','project_id'];

    public function sectors()
    {
        return $this->hasMany(Sector::class);
    }

}
