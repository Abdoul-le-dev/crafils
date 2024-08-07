<?php

namespace App\Models;

use App\Http\Controllers\Proformat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categorie;
//use Laravel\Scout\Searchable;

class produit extends Model
{
   // use Searchable;
    use HasFactory;
    protected $guarded=[''];

    public function categorie()
    {
        return $this->belongsTo(categorie::class);
    }
    public function ventes()
    {
        return $this->hasMany(Sale::class);
    }
    public function sales()
    {
        return $this->hasMany(Proformat::class);
    }

    public function scopeFilter(
        \Illuminate\Database\Eloquent\Builder $querry,
        ?string $categorie,
        ?string $direction,
    ):void
    {
        $querry->when(
            value:$categorie,
            callback: static function (\Illuminate\Database\Eloquent\Builder $querry, $categorie) use ($direction):void{
            match ($categorie) {
                'categorie' => $querry -> orderBy('categorie', $direction ?? 'DESC'),
                'status' => $query->orderByStatus($direction),
                default => throw new \RuntimeException('categorie parameter is missing or invalid.'),


            };

            }

        );
    }
}
