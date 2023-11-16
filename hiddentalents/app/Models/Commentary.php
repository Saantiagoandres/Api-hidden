<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Multimedia;
use App\Models\Candidate;
use App\Models\Headhunter;

class Commentary extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','multimedia_id'];

    protected $allowIncluded = [];

    protected $allowFilter = ['descripcion','multimedia_id'];
    
    protected $AllowSort = ['descripcion','multimedia_id'];
    

    public function headhunter(){
        return $this->belongsTo(Headhunter::class);
    }

    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }

    public function multimedia(){
        return $this->belongsTo(Multimedia::class);
    }
}
