<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemNf extends Model
{
    use HasFactory;

    public $table = 'item_nf';

    protected $fillable = [
        'description','und','qtd','val_unt','nf_id','cod'
    ];
}
