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
        return $this->hasMany(Facture::class);
    }
    public function creancier(){
        return $this->hasOne(Creancier::class);
    }
}
