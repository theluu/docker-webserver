<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {  // soccer_countries thực tế
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        Schema::create('competitions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id')->nullable();  // Nullable vì cup không related
            $table->uuid('country_id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->foreign('competition_id')->references('id')->on('soccer_competitions')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('soccer_countries')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('matches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id');
            $table->uuid('home_team_id');
            $table->uuid('away_team_id');
            $table->tinyInteger('status_id');  // 1-9
            $table->unsignedBigInteger('match_time');  // Unix timestamp
            $table->json('home_scores');  // Array as JSON
            $table->json('away_scores');
            $table->foreign('competition_id')->references('id')->on('soccer_competitions')->onDelete('cascade');
            $table->foreign('home_team_id')->references('id')->on('soccer_teams')->onDelete('cascade');
            $table->foreign('away_team_id')->references('id')->on('soccer_teams')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matches');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('competitions');
        Schema::dropIfExists('countries');
    }
};
