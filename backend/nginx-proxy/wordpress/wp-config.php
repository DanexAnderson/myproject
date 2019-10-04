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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'realrealfans');

/** MySQL database username */
define( 'DB_USER', 'Dane');

/** MySQL database password */
define( 'DB_PASSWORD', 'Kn0x2@@5');

/** MySQL hostname */
define( 'DB_HOST', 'mysql');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0c8674deb4b26117d0649c4973753a2bfb35c1c0');
define( 'SECURE_AUTH_KEY',  '8ba75ec62c07a1be663dfd6c987961f5737ef919');
define( 'LOGGED_IN_KEY',    'a94b3643017145e27469c71660a218dc7b7c8ddd');
define( 'NONCE_KEY',        'f72adcfda898be28e4e417988487041f8bf10e9a');
define( 'AUTH_SALT',        '04a35b536e4a0a43e3859e3e0014459b22a8b83a');
define( 'SECURE_AUTH_SALT', 'fa6d943ed276a507259baa1b689b6f2455245db8');
define( 'LOGGED_IN_SALT',   'd0bd738aff59e8524d1d418b38c330e27a162cd9');
define( 'NONCE_SALT',       'a01b55765e8d1d137d0d33025df3ccd3ca13802a');

/**#@-*/

/**   JWT Authentication   */
define('JWT_AUTH_SECRET_KEY', 'DaneAnderson16');
define('JWT_AUTH_CORS_ENABLE', true);
// define('ALLOW_UNFILTERED_UPLOADS', true);


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
