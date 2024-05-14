<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bill_detail extends Model
{
    //
    protected $table = 'bill_details';
    protected $primaryKey = 'billDetail_id';
    protected $fillable = [
        'bill_id',
        'product_id',
        'size_name',
        'quantity',
        'price'
    ];

    //Thach
    // public function bill(): BelongsTo
    // {
    //     return $this->belongsTo(Bill::class);
    // }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_id', 'product_id');
    }
}
