<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $table = "eventos";
    public $fillable = ['tag_id','nombre_evento','descripcion','img_eventos'];

    public function tag(){

        return $this->belongsTo(Tag::class, 'tag_id');

    }


}
