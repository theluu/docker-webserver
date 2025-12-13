<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SoccerTeam extends Model
{
    protected $table = 'soccer_teams';  // <<< THÊM DÒNG NÀY
    public $incrementing = false;
    protected $keyType = 'string';

    public function competition(): BelongsTo
    {
        return $this->belongsTo(SoccerCompetition::class, 'competition_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(SoccerCountry::class, 'country_id');
    }
}