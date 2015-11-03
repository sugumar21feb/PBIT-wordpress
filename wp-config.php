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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '?O%bj }sq,~0t`8!INg5`c:NhwV@0Mqf>DL!JlOgMefv1r2xNE,khUYuoU|<lh{I');
define('SECURE_AUTH_KEY',  'eUN!Oxg`LFujt+c,<@_BhiU!ySF:aVhjM[^SL!kcPVIkl)t@o?1A$9vO,1SNcX+j');
define('LOGGED_IN_KEY',    's2X~D1J?jChp*Z`_F{^Ka/z<ClGN=|qA0bL%g3R]4J.g(~JWr|Ga.RLp-jO7CFU}');
define('NONCE_KEY',        '[RRq-S:eqRE9Hnn8V{,Qg1-<3{PS2`hvWjwASU[gJ$SugC}lx;5[mX+++`[ ;Yj0');
define('AUTH_SALT',        '(=J<9_$3Dz~(}*fIJQ_bY <VB:[xd,6Lw1phU;oG!]iVVM9kgGFpge3mS*|tk$!o');
define('SECURE_AUTH_SALT', '>sF+w{X+1Wvq6D)0)_:$|86>/*2P@Vw4M~exncKU#(OTX;]}6Ka AqXHPr[K@)3 ');
define('LOGGED_IN_SALT',   '$Nwg!%DxSp4o 7.sFq<g2PWNC}|]FW*`LCD5kf^ZhFA)L4zW}4jm=?71^9MXHu[k');
define('NONCE_SALT',       'j7k1`U7K5q^2&RED-q.oOz.)kBS^?v>PN38Rx(/oa9!NC)g9=|s5HY6FjcUXBs9E');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
