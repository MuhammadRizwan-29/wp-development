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
define( 'DB_NAME', 'wp-development' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'Npe$b,[4AV!%9zaWr:y_716OZI*X~C2Gl-;akkFQVc=!g OWzle=0m}e(/%4f.![' );
define( 'SECURE_AUTH_KEY',  '?H,pB2Jl=rx[35g(=~O/RT>kchI7&[WiB_OMr7MuooWMl_D%R=.jS>y0=Xy_V`3n' );
define( 'LOGGED_IN_KEY',    'IzFTwi _jS&]Be{v6yrY<U]9PHS5Tecnk|=+t/!{=,|zy!)*SM(a*UEs[`W:J@QK' );
define( 'NONCE_KEY',        'Z#tG1)}1W+w1?j| +n|#KCwAE}y`$=0 :7kwwd>;s%NNXt_ ,8-:zrebih.?NkF:' );
define( 'AUTH_SALT',        'vs%RA4%xYqS/9%6/}(ZAm7@Qh%v0Dx oxx$uYA2Lw%I~<WYa l=l%3a7y FMJ[%*' );
define( 'SECURE_AUTH_SALT', '~,,W!= 5L`nn^[+I@&?cj83/$XFuMvjW9HTf7P_PvL2/GWzAulL]oH#/#!f.wh.b' );
define( 'LOGGED_IN_SALT',   'ur_bOx4}aJ`#9ex;J~rX2Dh{zkPJ2kcf[6=.|k9D8ofEOJ7q#?&L>$ZoiM{Tb$tz' );
define( 'NONCE_SALT',       'IE.ATif3&]RGC:z(poD%9QL:S/rjZS.(Qd[=LA%#R6}aH9yLI-+fY9ND5{CIRs%0' );

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
