<?php

namespace App;

use App\Models\juri;
use App\Models\unitBiro;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = "nip";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip','nama', 'email', 'password', 'jekel',  'unit_biro','jabatan', 'role_id'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function juris(){
        return $this->belongsTo(juri::class, 'nip', 'nip');
    }

    public function units(){
        return $this->belongsTo(unitBiro::class, 'unit_biro', 'kode');
    }

    public function departemens(){
        return $this->belongsTo(unitBiro::class, 'departemen_id', 'kode');
    }
}
