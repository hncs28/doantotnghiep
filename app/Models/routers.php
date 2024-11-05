<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routers extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'routerID';
    protected $table = 'routers';
    use HasFactory;
}
