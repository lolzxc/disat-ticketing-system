<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    protected $attributes = [
        'status' => 'OPEN'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function triage()
    {
        return $this->hasOne(Triage::class);
    }
}
