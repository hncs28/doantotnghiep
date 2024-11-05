<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requests extends Model
{
    protected $primaryKey = 'requestID';
    protected $table = 'requests';
    use HasFactory;
}
