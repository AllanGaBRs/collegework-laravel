<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cnpj',
        'phone'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id');
    }
}
