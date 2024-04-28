<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
'nombre',
'apellido',
'cedula',
'email',
'HabeasData',
'celular',
'country_id',
'department_id',
    ];

    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
 }
