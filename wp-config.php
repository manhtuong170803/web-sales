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
define( 'DB_NAME', 'web_sales_wp' );

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
define('AUTH_KEY',         'p8JS[4-Qau(Rz#B$j]ZJLqct )rIE{,?Ya!K )A<0Wd53XD|K-{BgI6K+W.xXH^T');
define('SECURE_AUTH_KEY',  '(m7`e_H($?(rth &7|R|ysFN((}/FruN^a|BotR`Sqhppa7of,FRN1>&$l<w(Se4');
define('LOGGED_IN_KEY',    '37-S_e2a-gKU;1LPHdxuTr,{w4bk3D;q0ZiV2 w9LAmA8=WNnoQpy+M|%|r]Fohw');
define('NONCE_KEY',        '7x(.Jj[P ?}5V<!QUYUv3i.zem+P.bT5y]U5?b0tF&9 $}0w#q]Botj1?i7@-l/m');
define('AUTH_SALT',        'fG!f*%;<~c:v0Cb6ux>4?L}d$w32.BG[E*x)+W-F<C~JHvZ3*TqF:sD]QWA.XW2x');
define('SECURE_AUTH_SALT', 'R$P[`.zGD6AZ6X)V<[fY47W9/LC;nWTMXBhT[~zjf-v()`R;tcj#.VVHEeK~jm,L');
define('LOGGED_IN_SALT',   'S+ehoP`DFf$@@NlPp+$u@L%`<Ou R=WQVK;yeL<!-`PzxHMF9d=ok{VNcoiEjz-0');
define('NONCE_SALT',       '_u;Ar=PO8Gkz|~sXpZmMkaMRz|3+TUR0a*QHJG-cKyQ5{wB&T@7!d<R(.y`u^uZD');

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
