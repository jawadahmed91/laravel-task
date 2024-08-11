<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['polio_worker_id', 'union_council_id'];

    public function polioWorker()
    {
        return $this->belongsTo(User::class, 'polio_worker_id');
    }

    public function unionCouncil()
    {
        return $this->belongsTo(UnionCouncil::class, 'union_council_id');
    }
}
