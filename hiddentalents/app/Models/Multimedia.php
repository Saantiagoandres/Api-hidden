<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;

    protected $fillable = ['name','archivo','descripcion','candidate_id'];

    protected $allowIncluded = [];

    protected $allowFilter = ['name','archivo','descripcion','candidate_id'];
    
    protected $AllowSort = ['name','archivo','descripcion','candidate_id'];
    

    public function commentaries(){
        return $this->hasMany(Commentary::class);
    }

    public function candidate(){
        return $this->hasMany(Candidate::class);
    }
}
