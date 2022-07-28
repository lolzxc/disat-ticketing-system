<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechSupport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function triage()
    {
        return $this->belongsTo(Triage::class);
    }
}
