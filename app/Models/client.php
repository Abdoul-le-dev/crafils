<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facture;
use Illuminate\Notifications\Notifiable;

class client extends Model
{
    use HasFactory,Notifiable;
    protected $guarded =[''];

    public function factures()
    {
        return $this->hasMany(CompteFacture::class);
    }
    public function creancier(){
        return $this->hasOne(Creancier::class);
    }
    public function totalDette($id)
    {
        $facture = Creancier::where('Client_id', $id)->first();
        return $facture ? $facture->montant : null;
    }
}
