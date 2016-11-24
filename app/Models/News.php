<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $fillable = ['tag_id','nameNews','bodyNews','imgNews'];

    public function tag(){

        return $this->belongsTo(Tag::class, 'tag_id');

    }






}
