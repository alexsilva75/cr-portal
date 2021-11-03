<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContactMessage extends Model
{
    use HasFactory;

    public $message;
    public function __construct($message)
    {
        $this->message = $message;
    }
}
