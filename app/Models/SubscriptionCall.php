<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionCall extends Model
{
    use HasFactory;

    protected $table = 'subscription_call';
    protected $fillable = [
        'name',
        'surname',
        'email',
        'cpf_cnpj',
        'birthdate',
        'address',
        'address_number',
        'neighborhood',
        'address_reference',
        'city',
        'phone',
        'whatsapp',
        'lat',
        'lng'

    ];
}
