<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'id', // Add 'id' field to the fillable array
        
        // Add other fields as needed
    ];
    
}
