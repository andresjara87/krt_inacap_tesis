<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    public $table = "publicidades";
    public $fillable = ['tag_id','nombre_publicidad','img_publicidad'];

    public function tag(){

        return $this->belongsTo(Tag::class, 'tag_id');

    }

}
