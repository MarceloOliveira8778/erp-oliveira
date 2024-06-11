<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimento extends Model
{
    protected $fillable = ["tipo_movimento", "ent_sai"];
}
