<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'document',
        'name',
        'type'
    ];

    public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
