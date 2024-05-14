<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address'
    ];
}
