<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('soccer_countries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        Schema::create('soccer_competitions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        Schema::create('soccer_teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id')->nullable();
            $table->uuid('country_id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        Schema::create('soccer_matches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id');
            $table->uuid('home_team_id');
            $table->uuid('away_team_id');
            $table->tinyInteger('status_id');
            $table->unsignedBigInteger('match_time');
            $table->json('home_scores');
            $table->json('away_scores');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soccer_matches');
        Schema::dropIfExists('soccer_teams');
        Schema::dropIfExists('soccer_competitions');
        Schema::dropIfExists('soccer_countries');
    }
};
