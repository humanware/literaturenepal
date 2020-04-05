<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = '/images/';

    protected $fillable = ['path'];

    public function getPathAttribute($picture) {
        return $this->uploads . $picture;
    }
}
