<?php

namespace App\Models;

use App\Traits\MenuTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, MenuTrait;

    protected $fillable = [
        'name', 'description',
    ];

    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }

    public function stock()
    {
        return $this-> hasMany(Stock::class);
    }

    public function torres()
    {
        return $this->hasMany(Tower::class);
    }

    public function bases()
    {
        return $this->hasMany(Base::class);
    }
}
