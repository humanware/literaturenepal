<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'picture_id',
        'title',
        'body'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function picture() {
        return $this->belongsTo('App\Photo');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
}