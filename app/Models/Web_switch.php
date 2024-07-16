<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Web_switch extends Model
{
    use HasFactory;
    protected $table = 'Web_switches';
    protected $fillable = ['is_under_construction'];
}
