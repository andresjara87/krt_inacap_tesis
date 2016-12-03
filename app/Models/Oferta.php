<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    public $table = "ofertas";
    public $fillable = ['local_id','tag_id','nombre_oferta','precio','fecha_inicio','fecha_termino','hora_termino','descripcion'];

    public function tag(){

        return $this->belongsTo(Tag::class, 'tag_id');

    }

    public function local(){

        return $this->belongsTo(Local::class, 'local_id');

    }
}
