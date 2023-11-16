<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;



class Candidate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    protected $allowIncluded = ['categories','commentaries','commentaries.headhunter'];

    protected $allowFilter = ['user_id'];
    
    protected $AllowSort = ['user_id'];
    
    












    public fun
    ction categories(){
        return $this->hasMany(Category::class);
    }

    public function commentaries(){
        return $this->hasMany(Commentary::class);
    }

    public function multimedias(){
        return $this->hasMany(Multimedia::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
