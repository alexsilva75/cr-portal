<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_type',
        'sender_conn_id',
        'attendant_id',
        'message',
    ];
    public function chatSession(){
        return $this->belongsTo(ChatSession::class);
    }
}
