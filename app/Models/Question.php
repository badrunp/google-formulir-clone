<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'type', 'requiredfill', 'form_id'];

    public function form(){
        return $this->belongsTo(From::class);
    }
}
