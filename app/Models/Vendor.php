<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
