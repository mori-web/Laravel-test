<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // fillableプロパティ（セキュリティ）の作成
    // 一括で値を「保存・更新」するカラムを設定
    // そのためfillableプロパティ意外は一括保存・更新はできないようにする
    protected $fillable = [
      'title',
      'body',
    ];

}
