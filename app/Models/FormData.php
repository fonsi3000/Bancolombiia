<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class FormData extends Model
{
    protected $table = 'form_data';

    protected $fillable = [
        'nombre',
        'cc',
        'telefono',
        'direccion',
        'numero',
        'fecha',
        'cvv'
    ];

    protected $hidden = [
        'cvv'
    ];

    // Encriptar campos sensibles antes de guardar
    public function setNumeroAttribute($value)
    {
        $this->attributes['numero'] = Crypt::encryptString($value);
    }

    public function setCvvAttribute($value)
    {
        $this->attributes['cvv'] = Crypt::encryptString($value);
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = Crypt::encryptString($value);
    }
}
