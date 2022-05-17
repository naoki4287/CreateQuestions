<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class title extends Model
{
    use HasFactory;
    // テストをするために記載した。削除する可能性あり。
    protected $fillable = [
      'title',
      'user_id'
    ];
}
