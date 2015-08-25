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
define('DB_NAME', 'wordpress_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'c(n$a8%EwH hJfw{))g&iWeY<h4lEiUI$M- Y4+z=r|a@_zE6<WU;:zLjK-x[q0|');
define('SECURE_AUTH_KEY',  '`.R%8p`9%=%:8wC}iR^oG05gG^5|=}`58s&wy3hWQL@(#V~>&@>_:Me!>otL^bnG');
define('LOGGED_IN_KEY',    '#BNi8LKIBwc>R[Q?#P:3.nz;LJ.GR.A=tEvxQHPo[y+^f+)T,Vka-`vdq{ 0{Mm>');
define('NONCE_KEY',        'h~#n+6P8At:T/B,=>de+/&Zd@L8|i3F4><)[)3>AI$E)0NxS`p![kMy6$CID<IfH');
define('AUTH_SALT',        'RE{(krAcdP:E#[I W5F`.KsxNlZ: [e:^vvBp]pg49?/=xYr=-+M:,#D<C|x6sp+');
define('SECURE_AUTH_SALT', 'Vs$$x,]0h!SZg+s?X`uBd-(5_-6fgH|e5clV+3?M;^lieC:Q^$hzeX9dV1h[O4xM');
define('LOGGED_IN_SALT',   'F>i3]QG6?gzd-LX1Dh!+0qm]qq@?},!+*he3^p$<0?-}P1ilGAdS6S!Z/||[9G;K');
define('NONCE_SALT',       'oZC(fL|&XWqh)L~D$l`3oxHKPD=trGw{wx/Eua,H1-X[<.r^rw|<^~Wu*jF~-=T.');

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
