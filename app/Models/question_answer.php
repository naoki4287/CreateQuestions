<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_answer extends Model
{
    use HasFactory;
    
    // title_id と user_idはテストのために追加しました。後で削除するかも。
    protected $fillable = [
      'question',
      'answer',
      'title_id',
      'user_id',
    ];
}
