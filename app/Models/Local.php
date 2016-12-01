<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    public $table = "Locales";
    public $fillable = ['user_id','tag_id','logo','encabezado','telefono','direccion','precio_minimo'];

    public function tag(){

        return $this->belongsTo(Tag::class, 'tag_id');

    }
}
