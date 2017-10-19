<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public static function findByHash($hash)
    {
    	return static::whereHash($hash)->first();
    }
}
