<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    public $table = "rutas";
    public $fillable = ['user_id','presupuesto','cantidad_personas'];

    public function local(){

        return $this->belongsTo(User::class, 'user_id');

    }
}
