<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    public $table = "preguntas";
    public $fillable = ['tag_id','pregunta'];

    public function tag(){

        return $this->belongsTo(Tag::class, 'tag_id');

    }


}
