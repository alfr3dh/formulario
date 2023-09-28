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
define( 'DB_NAME', 'wp' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'wpuser' );

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
define( 'AUTH_KEY',         '%P}T_8Kq (S|z~-]wk2NI,q|@rt(#CNp_A%ikd&`Hw8JC:fbko~`;BcQWM,TfIQ.' );
define( 'SECURE_AUTH_KEY',  'a{ Z&Fm@vm0M`8c(;Jz.`?v(L~OTySWnIk%7#_n+(Tx9g_R[}YU%ie59:e#!?qK!' );
define( 'LOGGED_IN_KEY',    ')r|CvvGsIm Pas/GNe`,T 2@ATKi|0KWdlE}SgO0.G]0<kCQ72Vv8U5lHq&DN57r' );
define( 'NONCE_KEY',        'Qd;gLdJAjK]ZR^G&sK.[*L_aHg9Cn,M/63qF]8!~#~hQ4j^t<PURj&ih<r9NUC=D' );
define( 'AUTH_SALT',        '-vH^iHV06!GK4yzYtk1c=&InIMVxr[JwFbg5fv_o7V+-8pEb|wiB&+bbwIB0oD1K' );
define( 'SECURE_AUTH_SALT', '6ZlIvlV}eoqdU=g15I];xJKwxT-q2j@rOHsJ0vnI!FW8fLtNh}[[dPw {K`+Z&tC' );
define( 'LOGGED_IN_SALT',   'rVT7fO*2?liMA2T.J,eIvv&K^!@!m[JeC~&S!|QNrK$%z:R9I)5,1)P8}Z|R*$<V' );
define( 'NONCE_SALT',       'H6k1MWn1J.Ms/<o)v|H92k_Nw+iHSxtS*&3X77TAJ<sag?GTOG.uTTy_J8ai[TzI' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'donweaproyecto1234_';

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
