<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nf extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente','nf','cod','tipo','arquive','description','reference','val','project_id'
    ];
    // protected $appends = ['reference_id'];
    public function items()
    {
        return $this->hasMany(ItemNf::class);
    }

    public function projeto()
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    public function references($id)
    {
        return Nf::where('project_id',$id);
    }

    public function referenceNf()
    {
        return $this->hasOne(Nf::class,'id','reference')->get();
    }
}
