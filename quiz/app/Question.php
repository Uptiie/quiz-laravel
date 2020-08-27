<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quiz;
use App\Answer;

class Question extends Model
{
    protected $fillable = ['question', 'quiz_id'];

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
