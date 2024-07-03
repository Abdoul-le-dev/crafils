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
    public static function UserName($id)
    {
        $user= User::where('id', $id)->first();
        return $user ? $user->name: null;
    }
    public static function Due($a, $b, $d = null)
    {   
        if ($d !== null) {
            $du = ($a + $d) - $b;
        } else {
            $du = $a - $b;
        }
        return $du;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}    

   
