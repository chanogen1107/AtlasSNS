<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post',
    ];

    // usersテーブルとのリレーション（従テーブル側）
public function user()
 { //1対多の「１」側なので単数系
    return $this->belongsTo('App\User');
 }

}
