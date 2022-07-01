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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

$url =  "{$_SERVER['HTTP_HOST']}";
if ($url == "defaulttheme.test") {
	define( 'WP_HOME', 'https://defaulttheme.test' );
	define( 'WP_SITEURL', 'https://defaulttheme.test' );
} else {
	define( 'WP_HOME', 'https://defaulttheme.inthemake.nl' );
	define( 'WP_SITEURL', 'https://defaulttheme.inthemake.nl' );
}


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'defaultt_wp_bp7of' );

/** MySQL database username */
define( 'DB_USER', 'defaultt_wp_zwywv' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Ut&PAw9^9jy@WmB5' );

/** MySQL hostname */
define( 'DB_HOST', '128.199.34.29' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY', 'shw9_L8y~;81_|5%]fw4lqVd/03+pt|l6n7*3J;9(93tX@8lk#5IV0#W-BrI|uu2');
define('SECURE_AUTH_KEY', 'yR2o521_U(6~4EFH40;-D3D99s6QWoG6]F[XA8la+)7]od37%tP539rv~058_Ig3');
define('LOGGED_IN_KEY', '4+h&+]3O-304vSkqRM*h3_0%24+g1x-*a0Hx57Hy0vBSdLH41i0r@6h@YR4y)%41');
define('NONCE_KEY', '|[45g/F2[Af~W~@U;8fqMdb59K3cXYUVjEh696q11qN9a7!L8JE1d2IB+5fL13&]');
define('AUTH_SALT', '1t5gdaJFyG#U5E+z478#c;4~-@_[[4U9e_6N*I7qFf1RR]RU]u6/_B#7fe5Ek@(R');
define('SECURE_AUTH_SALT', 'Tk0f-5B16S|646h1F*uf1OB)72mZ%9TDO5XSfy3G:H7D&xz~2g;d;42Zqw:~m[wL');
define('LOGGED_IN_SALT', ';|*%F+;r4h&BEy|:Mr;i+~E0%]+/I9~vz2ZLNan7f8:TObO+G52Z3f*t354UJ64N');
define('NONCE_SALT', '~+1443dU!@(U|CX1(~9Rfc(-ovhz(~5Q8&K#78ZR-~m6_34-6Y]9U!uH[r2M[5j(');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'lXPkyOf_';


define('WP_ALLOW_MULTISITE', false);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
