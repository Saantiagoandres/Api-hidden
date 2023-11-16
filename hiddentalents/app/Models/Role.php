<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_rol'];

    protected $allowIncluded = [];

    protected $allowFilter = ['nombre_rol'];
    
    protected $AllowSort = ['nombre_rol'];
    

    public function users(){
        return $this->hasMany('App\Models\User');
    }

}

