<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    public $table = "rankinglocal";
    public $fillable = ['user_id','tag_id','voto'];

    public function tag(){

        return $this->belongsTo(Tag::class, 'tag_id');

    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');

    }
}
