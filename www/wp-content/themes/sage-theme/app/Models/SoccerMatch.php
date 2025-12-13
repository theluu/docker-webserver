<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SoccerMatch extends Model
{
    protected $table = 'soccer_matches';  // <<< THÊM DÒNG NÀY (QUAN TRỌNG NHẤT)
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id', 'competition_id', 'home_team_id', 'away_team_id',
        'status_id', 'match_time', 'home_scores', 'away_scores'
    ];

    public function competition(): BelongsTo
    {
        return $this->belongsTo(SoccerCompetition::class, 'competition_id');
    }

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(SoccerTeam::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(SoccerTeam::class, 'away_team_id');
    }
}