<?php

namespace App\Models;
use App\Models\produit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class categorie extends Model
{
    use HasFactory;
    protected $guarded=[''];

    public function produits():HasMany
    {
        return $this->hasMany(produit::class);
    }



}
