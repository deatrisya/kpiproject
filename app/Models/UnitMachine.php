<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMachine extends Model
{
    use HasFactory;
    protected $fillable = ['unit_name'];

    public function machines() {
        return $this->hasMany(Machine::class);
    }
}
