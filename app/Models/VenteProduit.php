<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Notifications\Notifiable;

class VenteProduit extends Model
{
    use HasFactory;
    protected $guarded =[''];

    public static function boot()
    {
        parent::boot();
        self::creating(function($vente)
        {
            $vente->user()->associate(auth()->user()->id);
            //$vente->category()->associate(request()->categorie);
        });
        self::updating(function($post)
        {
            $post->category()->associate(request()->categorie);
        });
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    } 

  
}
