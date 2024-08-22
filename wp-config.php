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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'WD18314' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
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
define( 'AUTH_KEY',         'rgMluY1bZI2XlqrcOcvMlEKuneD6ISxTPkqRTXXJG7Pz7XHVLQVecfUloOWmMoL1' );
define( 'SECURE_AUTH_KEY',  'fKXmgGY7S0HbQVEDbsRbsjEQfu4dAo14d98l3KF59cbgcrN7eZU8SkiTNNyyL9fe' );
define( 'LOGGED_IN_KEY',    '0bfksCvWdxY8156YtUaRiCtnhMPxj19aDSTQJhMUwWrncLtNuu5e8TI05fcPQUwf' );
define( 'NONCE_KEY',        '1MbegUbyugQtpZiHkXVa14I49WPizrzzE8tP1SHCTjbVNjhmP0ARr7s58gejfYqD' );
define( 'AUTH_SALT',        'K4KRtBukyn0qI3yUnns191BjlzHI34m51qeLIIQRggPbINAsppwA8RqAayMCT9Lv' );
define( 'SECURE_AUTH_SALT', 'APlGSfkKMsEblKw1L2FWHzg93AVTQh9KBbBeCnzsEi30TAwUNdoKwHt0X0bjBthf' );
define( 'LOGGED_IN_SALT',   'zKESh9nchO7UOyFepHDJZvRezi3XWvg3gnZiuJfE37RZ0bPXSgvhumXtZTHXKqI0' );
define( 'NONCE_SALT',       'Mtlytxk90LiOGSrOddt8izzkgXD5ba4pOXNX8FiHrqkOk0hRwga0QxgiIFx9HrRr' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
