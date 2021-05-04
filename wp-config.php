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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'starboar_makita' );

/** MySQL database username */
define( 'DB_USER', 'starboar_makita' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k!-FmxRBw((bgMtTc9~Yw-{aCLR=2rl/,W(hhC)[1i2!wwc1=3PiJ:,q^fOyo%vd' );
define( 'SECURE_AUTH_KEY',  'l  YV4a`IhGW8Fp3Y7MbB[`|E|xwj-k8WBLwc~/l~`<~rg*TTI15426g6ktsGZ/Y' );
define( 'LOGGED_IN_KEY',    'BhWIz0|KiZiqA.6#^u>wx$Y2^=|rG:T_!:B>m[t?euzs?A_tY_LF:{V;ohFbAc9H' );
define( 'NONCE_KEY',        '/2H0LVf2O{=w$J$`R6x0|l=VWL6It+l ;ltm>QbKuk!PV?E2$KtQC FKkSsLvz+:' );
define( 'AUTH_SALT',        '3h;&yT2rZ|J;08;m4oyCq(32x`$3Ghu`t+%<GVY&B1_age=txdqS.bSR/J42Fz3V' );
define( 'SECURE_AUTH_SALT', '_LnMxt;uVR>_FKx!3st 13r<j@tEMg67qWWSIm9zYcmW= VhpTYS*zA5,gu;Wg1M' );
define( 'LOGGED_IN_SALT',   '),jZhF )Y7b<$.ZGAqcM0e7+8C`am#gl)7XDQ|!@$w1lb]#n^KY-%$DL2s$d#tTh' );
define( 'NONCE_SALT',       'n!n0T?yMyY(`?lPx8ZtR<3D<pf/ZNq|oI0#7@LC_2IFOfL>g/`.f|]ydNpY(awE0' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
