<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
    
    public function tse()
    {
        return $this->hasOne(TechSupport::class);
    }
}
