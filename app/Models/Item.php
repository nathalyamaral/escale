<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'item_idcustomer',
        'price',
        'description',
        'amount'
    ];

    public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
