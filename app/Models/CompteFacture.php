<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteFacture extends Model
{
    use HasFactory;
    protected $guarded =[''];
    public function client()
    {
        return $this->belongsTo(client::class);
    } 
}
