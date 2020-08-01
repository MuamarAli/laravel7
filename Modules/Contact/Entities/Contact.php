<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'message'];
}
