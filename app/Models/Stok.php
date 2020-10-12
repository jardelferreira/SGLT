<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'item','cod','courtyard_id','und','description','qtd','trecho_id','lote_id','project_id'];
}
