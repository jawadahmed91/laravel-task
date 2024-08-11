<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnionCouncil extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tehsil_id'];

    public function tehsil()
    {
        return $this->belongsTo(Tehsil::class);
    }
}
