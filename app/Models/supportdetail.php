<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supportdetail extends Model
{
   
    public $timestamps = false;
    protected $primaryKey = 'detailID';
    protected $table = 'supportdetail';
    public function support()
    {
        return $this->belongsTo(supports::class, 'supportID', 'supportID');
    }
    use HasFactory;
}
