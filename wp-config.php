<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'flatsome');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '4C-~{J#?gAm/r`rrWgws0l{:2q+Axi(rc$Xs},2F_D{EO!q` Eb>=e?]Bi;*IEE=');
define('SECURE_AUTH_KEY',  'S2<)Q37ujSv58~y6l+~nX-x-zXGmR2{#TGEhApO7NKb<TSmwLP$__O%_VdPC2S)5');
define('LOGGED_IN_KEY',    '%]WeLH]-glH^2b;Y*1^2l(23IZ/xBlI}9Q)7r.R=T:dSyL.t3h{L,)I@4IvR ]@K');
define('NONCE_KEY',        '+f29aBk[t Hj_Q/@E/!|Gd_@:]EL^*Z8-DM+z+gI`XfKW}6 &z8S1y@Pd<Oolr_q');
define('AUTH_SALT',        '>dW>VQ?:[A(n+Pnz*2aFR{* S6CFZNr@Z:N0<@!@P(G* M*1@&vG{X~BXYSt#sgY');
define('SECURE_AUTH_SALT', '?kzKR(Tq*`2$nYX9#^T86Sm>$0 !iVrgbVcySBU=^d:+o+/2SM=^ZU)tI^}?|R,-');
define('LOGGED_IN_SALT',   '%OwZ)YT&0L:V,r-j2)ejD; ^n=W;*ShsJMLw|xGNtVvBKl:*0EY$+djfF1XHF+~K');
define('NONCE_SALT',       '@BN+E9a;W`.mrUNxmZ=/@.}z~Ovl/LApx*bO8a=2v+|Bt)sLHc]%d6U:_ZvG:81h');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
