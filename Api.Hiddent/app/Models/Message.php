<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    
    public function headhunter(){
        return $this->belongsTo(Headhunter::class);
    }

    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }
}
