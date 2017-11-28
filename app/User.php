<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
	use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
