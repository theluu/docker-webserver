-- soccer_countries
CREATE TABLE `wp_soccer_countries` (
  `id` CHAR(36) PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `logo` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
);

-- soccer_competitions
CREATE TABLE `wp_soccer_competitions` (
  `id` CHAR(36) PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `logo` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
);

-- soccer_teams
CREATE TABLE `wp_soccer_teams` (
  `id` CHAR(36) PRIMARY KEY,
  `competition_id` CHAR(36) DEFAULT NULL,
  `country_id` CHAR(36) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `logo` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
);

-- soccer_matches
CREATE TABLE `wp_soccer_matches` (
  `id` CHAR(36) PRIMARY KEY,
  `competition_id` CHAR(36) NOT NULL,
  `home_team_id` CHAR(36) NOT NULL,
  `away_team_id` CHAR(36) NOT NULL,
  `status_id` TINYINT NOT NULL,
  `match_time` BIGINT UNSIGNED NOT NULL,
  `home_scores` JSON NOT NULL,
  `away_scores` JSON NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL
);