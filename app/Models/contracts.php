<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\services;

class contracts extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'contractID';
    protected $table = 'contracts';
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function service()
    {
        return $this->belongsTo(services::class, 'serviceID', 'serviceID');
    }
}
