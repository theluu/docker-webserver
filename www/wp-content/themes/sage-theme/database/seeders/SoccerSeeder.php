<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../app/setup-eloquent.php';

use Illuminate\Database\Capsule\Manager as DB;
use Faker\Factory as Faker;

// Helper GET random element
function get_random($array) {
    return $array[array_rand($array)];
}

$faker = Faker::create('en_US');

// 1. Seed soccer_countries (10 countries):
$countries = [];
for ($i=0; $i < 10; $i++) {
    $countries[] = [
        'id' => $faker->uuid,
        'name' => $faker->country,
        'logo' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
}
DB::table('soccer_countries')->insert($countries);

// 2. Seed soccer_competitions (10 competitions):
$competitions = [];
for ($i=0; $i < 10; $i++) {
    $competitions[] = [
        'id' => $faker->uuid,
        'name' => $faker->words(3, true).' Cup',
        'logo' => null,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
}
DB::table('soccer_competitions')->insert($competitions);

// 3. Seed soccer_teams (10 teams, random country & competition):
$team_rows = [];
foreach ($countries as $c) $country_ids[] = $c['id'];
foreach ($competitions as $c) $comp_ids[]    = $c['id'];
for ($i=0; $i < 10; $i++) {
    $team_rows[] = [
        'id'             => $faker->uuid,
        'competition_id' => get_random($comp_ids),
        'country_id'     => get_random($country_ids),
        'name'           => $faker->city.' FC',
        'logo'           => null,
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s'),
    ];
}
DB::table('soccer_teams')->insert($team_rows);

// 4. Seed soccer_matches (10 matches, random team, competition):
foreach ($team_rows as $t) $team_ids[] = $t['id'];
for ($i=0; $i < 10; $i++) {
    // Home team và Away team không được trùng
    do {
        $home = get_random($team_ids);
        $away = get_random($team_ids);
    } while ($home == $away);

    $competition_id = get_random($comp_ids);
    DB::table('soccer_matches')->insert([
        'id'             => $faker->uuid,
        'competition_id' => $competition_id,
        'home_team_id'   => $home,
        'away_team_id'   => $away,
        'status_id'      => $faker->numberBetween(1, 5),
        'match_time'     => strtotime($faker->dateTimeBetween('-1 week', '+1 week')->format('Y-m-d H:i:s')),
        'home_scores'    => json_encode([$faker->numberBetween(0, 5)]),
        'away_scores'    => json_encode([$faker->numberBetween(0, 5)]),
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
    ]);
}
echo "Seed thành công!\n";
