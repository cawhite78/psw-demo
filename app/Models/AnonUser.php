<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnonUser extends Model
{
    protected $table = 'products_master_fulltext';
    protected $guarded = [];
    protected $hidden = [];
    public $incrementing = false;
    public $timestamps = true;
}
