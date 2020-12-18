<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Cuadrilla extends Model
{
    protected $guarded = [];
    public function user(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function estaCuadrilla($id){
        return ;
    }
}
