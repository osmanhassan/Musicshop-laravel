<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class order extends Model
{
	use Notifiable;

    protected $primaryKey = 'id';
    
    public $timestamps = false;
}
