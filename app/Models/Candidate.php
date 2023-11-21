<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Category;
use App\Models\Commentary;
use App\Models\Multimedia;
use App\Models\Message;


class Candidate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    protected $allowIncluded = ['categories','commentaries','commentaries.headhunter','multimedias', 'messages'];

    protected $allowFilter = ['user_id'];

    protected $AllowSort = ['user_id'];


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


    public function categories(){
        return $this->hasMany('App\Models\Category');
    }

    public function commentaries(){
        return $this->hasMany('App\Models\Commentary');
    }

    public function multimedias(){
        return $this->hasMany('App\Models\Multimedia');
    }

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }
}
