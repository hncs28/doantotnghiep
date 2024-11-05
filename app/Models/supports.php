<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supports extends Model
{
    
    public $timestamps = false;
    protected $primaryKey = 'supportID';
    protected $table = 'supports';
    use HasFactory;
}
