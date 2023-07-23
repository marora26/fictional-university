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
define( 'DB_NAME', 'fictionaluniversity-udemy' );

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
define( 'AUTH_KEY',         'goe tCZJ(=GebiPVHfSO|UcKKS.li{$:7r|V26F(:omv5O*5Mb7x;hvJRhaI<q4=' );
define( 'SECURE_AUTH_KEY',  '-:%A}!v(pY-yHOvm2r&9pP^E!MRqJhD/Zi7hEC<cC^.?J*#PO.V`{Sn5}EKU!s+s' );
define( 'LOGGED_IN_KEY',    'Nx5!VeD_J_xw82RWHr^%mQT8!gy]I&]n]@0:MTBY&)?*VT(U:k/2q#sV/aq.{T`:' );
define( 'NONCE_KEY',        'O w&-1E$~OIs:ri^K[/j7Uh1oUmn6k.[t*+N%{zJ+A7U!K]O98Zz~ExUuR<_K]{Z' );
define( 'AUTH_SALT',        '<3O]CGb:yVU(]hYO{/U<ZFP];/5mZxFC]-AMdTRorf}U<=+cfHcs_K?qR+sq,^Iq' );
define( 'SECURE_AUTH_SALT', '%t{43rHrquaJS8dnxy-a7e4yKJ-xdib3GSRjM.[Z[MnrrJGg]x$Ik5)|dL5xK@ek' );
define( 'LOGGED_IN_SALT',   '[,E!f!o#4t^PFb?&S>I#oPvo Y!(D9xh[!Y6ps~g|S;*yg%wR>kZDy:RNQ4j)l!,' );
define( 'NONCE_SALT',       'm8GKwWX&H_1hRa#G)%}G.<tKRNpf,Ac}DIbdJT>_.yDQ4w]Zs!UY1$FueHE7ZCT^' );

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
