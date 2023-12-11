<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/_salt.php';
require_once dirname(__DIR__) . '/_misc.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1), '.env');
$dotenv->load();
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV['DB_NAME']);

/** Database username */
define( 'DB_USER', $_ENV['DB_USER']);

/** Database password */
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD']);

/** Database hostname */
define( 'DB_HOST', $_ENV['DB_HOST']);

/** Database charset to use in creating database tables. */
/** if there is an $_ENV['DB_CHARSET'] value, use it here otherwise, we dont want to define anything */
if (isset($_ENV['DB_CHARSET'])) {
	define( 'DB_CHARSET', $_ENV['DB_CHARSET']);
}

/** if there is an $_ENV['DB_COLLATE'] value, use it here otherwise, we dont want to define anything */
if (isset($_ENV['DB_COLLATE'])) {
	define( 'DB_COLLATE', $_ENV['DB_COLLATE']);
}

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
/** moved to ./_salt.php */
/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = $_ENV['DB_TABLE_PREFIX'];


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if (!defined('WP_DEBUG')) {
	if(isset($_ENV['WP_DEBUG'])) {
		define('WP_DEBUG', $_ENV['WP_DEBUG']);
		define('WP_DEBUG_DISPLAY', dirname(__DIR__) . '/errors.log');
		define('WP_DEBUG_LOG', false);
	} else {
		define('WP_DEBUG', false);
	}
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
