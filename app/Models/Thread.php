<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
   use HasFactory;

    protected $fillable = ['content', "user_id"];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このスレッドの元投稿。（ Userモデルとの関係を定義）
     */
    public function rootThread()
    {
        return $this->belongsTo(Micropost::class);
    }
}
