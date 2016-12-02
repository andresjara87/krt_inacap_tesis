<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    public $table = "Locales";
    public $timestamps = false;
    public $fillable = ['user_id','tag_id','nombre_local','logo','encabezado','telefono','direccion','precio_minimo'];

    public function tag(){

        return $this->belongsTo(Tag::class, 'tag_id');

    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');

    }

}
