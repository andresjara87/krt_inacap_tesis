<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    public $timestamps = false;
    protected $fillable = ['name_tag','name_obj'];

    public function tidings(){
        return $this->hasMany(News::class, 'tag_id');
    }
    public function votaciones(){
        return $this->hasMany(Voting::class, 'tag_id');
    }
    public function locales(){
        return $this->hasMany(Local::class, 'tag_id');
    }
}
