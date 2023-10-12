<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = "pessoas";

    protected $fillable = [
        "nome",
        "apelido",
        "nascimento",
        "stack",
    ];

    protected $casts = [
        "stack" => "array",
    ];
}