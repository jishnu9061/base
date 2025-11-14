<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'xero_contact_id',
    ];

    public function members()
    {
        return $this->hasMany(ResidentMembers::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
