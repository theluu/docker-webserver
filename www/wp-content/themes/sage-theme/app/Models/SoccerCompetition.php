<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SoccerCompetition extends Model
{
    protected $table = 'soccer_competitions';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'name', 'logo'];

    public function teams(): HasMany
    {
        return $this->hasMany(SoccerTeam::class, 'competition_id');
    }

    public function matches(): HasMany
    {
        return $this->hasMany(SoccerMatch::class, 'competition_id');
    }
}
