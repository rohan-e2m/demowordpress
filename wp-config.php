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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'demo' );

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
define( 'AUTH_KEY',         '{AVp{OL@I4@,F*A*m/%#PC<S9R$fHwK^vT^ [uE=Fw/IM,WM0,NEB%DNMOD1lzx^' );
define( 'SECURE_AUTH_KEY',  'de&mdR$v5N_)zBb(oZc5l.ofu7/ue~hs|,L1u,dzz1>m< qx>H!-=>^a+u!E;]ff' );
define( 'LOGGED_IN_KEY',    '?{;xS_<K-q0%~1yJZU3f`pc~lzexP^(^;m^@bl.2@<Blp?]Qc1W Bfo90Ud9@WYm' );
define( 'NONCE_KEY',        '1kYn9RZzUR;Fo?eO{>,>6` Mi|s|}6?cOTQ9iht5N8Y/?)iDY.A6j78^k0g/vPXp' );
define( 'AUTH_SALT',        'XC IRNoy^196#8p=BX36,e3ydaH}H&Ziwz5+k;C0;e4@%OoHX!n8n02C;d4Ei^sq' );
define( 'SECURE_AUTH_SALT', '8+]-*av}m63&4 ,i_/nq2nu|F.z!*R.vsX3in7m}$m$w5w ,H^EGf3hM=i.[000{' );
define( 'LOGGED_IN_SALT',   'DNsW^.IXgG%+=P~s(*Kf=KS*- (&K?Z5~Y):dBLRiR.!rF-$ICV<)vWzNu-L){y/' );
define( 'NONCE_SALT',       '|yS_DQ,_Mpkw!jut2+Hi]R6 /Pq]%GTs:BzY5kt*AV[X^jAs:k8J}SB8[npG/dOq' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
