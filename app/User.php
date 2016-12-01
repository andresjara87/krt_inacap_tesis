<?php

namespace App;

use App\Models\Similitud;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function votaciones(){
        return $this->hasMany(Voting::class, 'user_id');
    }

    public function usuariosX(){
        return $this->hasMany(Similitud::class, 'userX_id');
    }

    public function usuariosY(){
        return $this->hasMany(Similitud::class, 'userY_id');
    }

    public function getNameAttribute(){


        return $this->first_name . ' ' . $this->last_name;

    }

}


