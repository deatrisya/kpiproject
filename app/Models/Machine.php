<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_id',
        'machine_code',
        'machine_type',
        'status',
        'location',
    ];

    public function units(){
        return $this->belongsTo(UnitMachine::class,'unit_id');
    }
}
