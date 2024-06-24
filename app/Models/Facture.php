<?php

namespace App\Models;
use App\Models\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function client()
    {
        return $this->belongsTo(Client::class);
    } 
}
