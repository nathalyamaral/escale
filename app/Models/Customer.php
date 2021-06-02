<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_document',
        'customer_idcliente'
    ];

    public function item()
	{
		return $this->belongsTo(Item::class);
	}
}
