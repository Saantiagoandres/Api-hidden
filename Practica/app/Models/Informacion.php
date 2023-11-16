<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    use HasFactory;

    public function Estudiante()
    {
        return $this->belongsTo('app/Models/Estudiante');
    }
}
