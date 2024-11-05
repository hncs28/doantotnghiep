<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\contracts;

class services extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'serviceID';
    protected $table = 'services';
    use HasFactory;
    public function contracts()
    {
        return $this->hasMany(contracts::class, 'serviceID', 'serviceID');
    }
}
