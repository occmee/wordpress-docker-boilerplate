<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

/** for WP Super Cache plugin */
#define( 'WP_CACHE', true );
#define( 'WPCACHEHOME', '/var/www/html/wp-content/plugins/wp-super-cache/' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'user');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'mysql:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '$&@Wb+t0eM[2E6+7%wsJIskVH5o^6[~o5B}E}N8.8NeHj!Sq8B([RDkk~Zs`Rrtb');
define('SECURE_AUTH_KEY', '7Z(R3SB^dm4M&O7~?RYe-E(=(L)5#3V9NgUAHI6`MJ<(J7$~RE$<|"vOFn#(g)|R');
define('LOGGED_IN_KEY', 'Xf%R2X^HD7A9yI-3zvu-68:A3OMr>1B)u3l/BRbd8Mq{[^Di8uw)mE%cS{?(-"O{');
define('NONCE_KEY', 'PASJdJ3o|h@IrQsoEt*8qBJ>LP@m>U>C_S;X,s;U4?&*yGBZm}>WVMEHjnw8b#1U');
define('AUTH_SALT',        '24e232d8af11d0b4c970c75ba74ff723ec396d81');
define('SECURE_AUTH_SALT', '067d42537a82fa1df357e8c73d8ac33c7cdbcc9c');
define('LOGGED_IN_SALT',   'f721ef4c15eda1895c03f60a298a57a8de9d84ca');
define('NONCE_SALT',       'a626ceb7c25229b2f2e7acfb0d36762e41c934eb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);
if (WP_DEBUG) { // デバッグモードの時だけ
	define('WP_DEBUG_LOG', true); // debug.log ファイルに記録するか
	define('WP_DEBUG_DISPLAY', false); // ブラウザ上に表示するか
	@ini_set('display_errors',0); // ブラウザ上に表示するか
}

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

