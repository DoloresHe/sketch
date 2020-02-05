<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizOption extends Model
{
    protected $guarded = [];
    const UPDATED_AT = null;

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}