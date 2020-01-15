<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamentos extends Model
{
    protected $fillable = ['categoria_id', 'forma_pagamento_id', 'valor', 'data_hora', 'tipo', 'obs'];
}
