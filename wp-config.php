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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\xampp\htdocs\wordpress\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'furnituredb' );

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
define( 'AUTH_KEY',         'U-$kA5kNp8o~}Cl#4-w.F@46<|v&Jtw:-&w.seRr**[_pm3Ts3;5Zg%q @9~H[QJ' );
define( 'SECURE_AUTH_KEY',  'UcrmQ~Cbz(KAEVLr75rTN.5^X@5tp$ae$)T0et`U{IC002ouva$*?$i5AO{03QUZ' );
define( 'LOGGED_IN_KEY',    ']7AzWg);NT/Ew<Vf&BibQ+m<}7:k+^lTrH-e#h!TM&7JypSF@a}O7OBc8y]5#WIC' );
define( 'NONCE_KEY',        '-Y+0yT):}zJ=jK|?0{UtM{.lDzhB2pcSEl4E%7dkYzzE8>F0Co@T)z;)OY)m,Vi8' );
define( 'AUTH_SALT',        'Oymp:QB>>mxl_.)-Bn5nps)WSJ+eFix2h$C/;t}@>f}!Z^ p1kXdtT$.20ac0RqW' );
define( 'SECURE_AUTH_SALT', 'aV:][M0%RwFtSB9m.==J3I?wyk0y>i+A*`N:ZBoc4UQXpiPJm^qt.`0wnkj*A3/Y' );
define( 'LOGGED_IN_SALT',   '8wz_,k<N!<!*fo8v0:9mNh6WZjm#2QEjQP&}!R#S*r`lwN/){z~;+#(Vwl$Z<OaM' );
define( 'NONCE_SALT',       'A{.1s|ONG!@l8I>bei@ 0r2Q8I2@fi(/eA(K&~scy64A^:;3R<SIzj$O(~xv2UZ_' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
