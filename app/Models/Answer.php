<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['answer', 'user_id', 'type', 'option_id', 'question_id', 'form_id'];

    public function option(){
        return $this->belongsTo(Option::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
