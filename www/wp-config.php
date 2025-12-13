<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'wppass123' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Vn(U}?4n+tqQAZ{_<kML%adGKF? F>!+XkpViO#/A8RXi$-{vYkuN@P_b}SsnTaX' );
define( 'SECURE_AUTH_KEY',  ';!.>F)5x>)cQkAtk-9Sz>,kv}Q,=vVcNNCanT^XD-oy=WvS!.{jfV_*.dj|tG5Q_' );
define( 'LOGGED_IN_KEY',    'ztbDbk*6SXy!Q1(y~=eNV}ANi*R>ZtS:7A4xx)1>4Bge%JIVPxG,D|@43GI|kevp' );
define( 'NONCE_KEY',        'Ztq2I.4M2b)2%MQ]mu:mzca_P-?gpRsKQwD}p(vtfB2La1SK0J_AS]Mo;o~o`(+U' );
define( 'AUTH_SALT',        '&NV&i%8V)~~J]yAv6Fb1aMl_4`9982yB!8SQ!kp|F=uLM(|Rte;f@4]{&9z[.9YK' );
define( 'SECURE_AUTH_SALT', 'i}=9+UMd<;#^<W5_Z>GGPlZx$mnnmq8`S7UEie{Os{cfQZkO9]V7r/cfX^obLP,m' );
define( 'LOGGED_IN_SALT',   'n3_&__5ca$i~~ -3; c{`fnU#%7=zpr$:hy+K1[ed]m*bw{h:,auwhN:uKQl/]lg' );
define( 'NONCE_SALT',       'otA`q!9NYb$i)T^`iXzILW0[.H2(f,WBa2q`mZ6|H<+YHWtM:EB`v3!i%2p-ItbZ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
// define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define( 'MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT );
