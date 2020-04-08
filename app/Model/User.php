<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table='user';
    public $primaryKey='user_id';
    protected $fillable=['user_name','user_pwd','user_email'];

}
