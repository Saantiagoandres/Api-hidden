<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['descripcion', 'candidate_id'];

    protected $allowIncluded = [];

    protected $allowFilter = ['descripcion', 'candidate_id'];
    
    protected $AllowSort = ['descripcion', 'candidate_id'];
    

    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }
}
