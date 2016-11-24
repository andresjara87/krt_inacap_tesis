<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    public $timestamps = false;
    protected $fillable = ['name_tag'];

    public function tidings(){
        return $this->hasMany(News::class, 'tag_id');
    }
}
