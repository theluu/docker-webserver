<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoccerCountry extends Model
{
    protected $table = 'soccer_countries';  // <<< THÊM DÒNG NÀY
    public $incrementing = false;
    protected $keyType = 'string';
}