<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // 追加
    protected $fillable = [ 'user_id','status','title'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
