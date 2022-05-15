<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer',
        'attendant',
        'customer_conn_id',// custommer_conn_id
        'attendant_conn_id',
        'customer_cpfcnpj',
        'customer_external_id',
        'attendant_external_id',
        'attendant_id',
        'customer_external_username',
        'attendant_external_username',
        'end_session',
        'status',
    ];
    public function messages(){
        return $this->hasMany(ChatMessage::class);
    }
}
