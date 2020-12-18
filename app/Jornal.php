<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornal extends Model
{
    protected $guarded = [];

    public function todosJornales($users){
        $jornadas = 0;
        foreach($users as $user){
            $jornadas = Jornal::all()->where('id_user', $user->id);
        }
        return $jornadas;
    }
}
