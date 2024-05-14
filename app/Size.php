<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    protected $table = 'sizes';
    protected $primaryKey = 'size_id';
    protected $fillable = ['size_name'];

}
