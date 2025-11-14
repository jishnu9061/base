<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'name',
        'email',
        'phone',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
