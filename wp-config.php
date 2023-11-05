<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'foodcafe' );

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
define( 'AUTH_KEY',         'V$0An><0(vhKe+Js>m&pjzh!fkR/(1,S#k68N$p5:z(xf@`C4Qj0S^}N0^~8v+L ' );
define( 'SECURE_AUTH_KEY',  'D5X&Ns+SETXT`!q|y3IX=yzarnsEw;ixB&Ey$d.<{oPkYh@Wuh>6??z.?e-3MKL{' );
define( 'LOGGED_IN_KEY',    '9W!c;X%i.78<fZ(p9f[JM4=ye_W|(e(76y5dKQ}OOB5}|?3_R*w9:}/O5p+2bCj9' );
define( 'NONCE_KEY',        ',n!:7d6l*o<OZ)k(v^ J]qi|>@]a1`;e{]NP1|/U8[f/,7xggF6D0T+P#~*KlQ#j' );
define( 'AUTH_SALT',        'p*sm:]Q@JSQ/hO-;i!c8m(Q[ePlpab#wcQ%bqL|ibb6a/Q2WFXyHK)/c!6EPtMt9' );
define( 'SECURE_AUTH_SALT', '2(,f=aZf13Gxt=/R)_r7mv%orZ}SX>^b1S^z69veDh~E8L]_b4P(5-}JlT`70}0r' );
define( 'LOGGED_IN_SALT',   'L*J^ue16W!nUmGg#AZ*Eq]]Sh5*wGM~v$Hw84L8RE$;DV=#[~6#7Vu6j] 56d[U@' );
define( 'NONCE_SALT',       'hYW6ZxJ70`J=H&w*9!E<k->88J@]-5q/%AQy`Nxx!U=as0/w%kvc9UtLI@L[EB@d' );

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
