<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public $table = "comentarios";
    public $fillable = ['user_id','comentario'];


    public function user(){

        return $this->belongsTo(User::class, 'user_id');

    }
}
