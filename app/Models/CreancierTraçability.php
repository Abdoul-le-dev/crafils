<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreancierTraçability extends Model
{
    use HasFactory;
    protected $guarded =[''];

    public static function Facture_montant_total($numeroFacture)
    {
        $facture = CompteFacture::where('num_factures', $numeroFacture)->first();
        return $facture ? $facture->montant_facture : null;
    }
    public static function Facture_montant_payer($numeroFacture)
    {
        $facture = CompteFacture::where('num_factures', $numeroFacture)->first();
        return $facture ? $facture->total_payer : null;
    }
    public static function differenceMontant($a,$b)
    {
        $c = $a - $b;
        return $c;
    }
}
