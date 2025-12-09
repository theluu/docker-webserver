<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Table countries
        Schema::create('soccer_countries', function (Blueprint $table) {
            $table->uuid('id')->primary();  // String UUID
            $table->string('name');
            $table->string('logo')->nullable();  // String URL
            $table->timestamps();  // created_at, updated_at
        });

        // Table competitions
        Schema::create('soccer_competitions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        // Table teams
        Schema::create('soccer_teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id')->nullable();  // Nullable theo Excel
            $table->uuid('country_id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->foreign('competition_id')->references('id')->on('soccer_competitions')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('soccer_countries')->onDelete('cascade');
            $table->timestamps();
        });

        // Table matches
        Schema::create('soccer_matches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id');
            $table->uuid('home_team_id');
            $table->uuid('away_team_id');
            $table->tinyInteger('status_id');  // Number 1-9
            $table->unsignedBigInteger('match_time');  // Number unix timestamp
            $table->json('home_scores');  // Array JSON
            $table->json('away_scores');  // Array JSON
            $table->foreign('competition_id')->references('id')->on('soccer_competitions')->onDelete('cascade');
            $table->foreign('home_team_id')->references('id')->on('soccer_teams')->onDelete('cascade');
            $table->foreign('away_team_id')->references('id')->on('soccer_teams')->onDelete('cascade');
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
