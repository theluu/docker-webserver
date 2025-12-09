<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SoccerTeam extends Model
{
    protected $table = 'soccer_teams';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'competition_id', 'country_id', 'name', 'logo'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(SoccerCountry::class, 'country_id');
    }

    public function competition(): BelongsTo
    {
        return $this->belongsTo(SoccerCompetition::class, 'competition_id');
    }

    public function homeMatches(): HasMany
    {
        return $this->hasMany(SoccerMatch::class, 'home_team_id');
    }

    public function awayMatches(): HasMany
    {
        return $this->hasMany(SoccerMatch::class, 'away_team_id');
    }
}
