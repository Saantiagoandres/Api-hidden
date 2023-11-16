<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Commentary;
use App\Models\Message;


class headhunter extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','candidate_id'];

    protected $allowIncluded = ['comentaries','messages','comentaries.multimedia','user.roles' ];

    protected $allowFilter = ['descripcion','candidate_id'];
    
    protected $AllowSort = ['descripcion','candidate_id'];
    

 /////////////////////////////////////////////////////////////////////////////
    public function scopeIncluded(Builder $query){
       
        // if(empty($this->allowIncluded)||empty(request('included'))){
        //     return;
        // }
        
        $relations = explode(',', request('included'));//['posts','relation2']
       
        $allowIncluded=collect($this->allowIncluded);//colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']
    
        foreach($relations as $key => $relationship){//recorremos el array de relaciones
            
            if(!$allowIncluded->contains($relationship)){
                unset($relations[$key]);
            }
        
        }
      $query->with($relations);//se ejecuta el query con lo que tiene $relations en ultimas es el valor en la url de included
     
    }

//return $relations;
// return $this->allowIncluded;

///////////////////////////////////////////////////////////////////////////////////////////

public function scopeFilter(Builder $query){

    
    if(empty($this->allowFilter)||empty(request('filter'))){
        return;
    }
    
    $filters =request('filter');
    $allowFilter= collect($this->allowFilter);

    foreach($filters as $filter => $value){

         if($allowFilter->contains($filter)){

            $query->where($filter,'LIKE', '%'.$value.'%');

     
        }

    }

    //http://api.codersfree1.test/v1/categories?filter[name]=posts&filter[id]=2

    }
//////////////////////////////////////////////////////////////////////////////////

public function scopeSort(Builder $query){

    
    if(empty($this->allowSort)||empty(request('sort'))){
        return;
    }
    
    
    $sortFields = explode(',', request('sort'));
    $allowSort= collect($this->allowSort);

    foreach($sortFields as $sortField ){

         if($allowSort->contains($sortField)){

            $query->orderBy($sortField,'asc');
     
        }

    }

     //http://api.codersfree1.test/v1/categories?sort=name
    

    }


    
    public function comentaries(){
        return $this->hasMany(Commentary::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}

   

  
