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
define( 'DB_NAME', getenv('WP_DB_NAME'));

/** Database username */
define( 'DB_USER', getenv('WP_DB_USER'));

/** Database password */
define( 'DB_PASSWORD',getenv('WP_DB_PASSWORD'));

/** Database hostname */
define( 'DB_HOST',getenv('DB_HOST'));

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define('WP_REDIS_HOST', getenv('REDIS_HOST'));
define('WP_REDIS_PORT', getenv('REDIS_PORT'));
define('WP_REDIS_TIMEOUT', 1);
define('WP_REDIS_DATABASE', 0);
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
define( 'AUTH_KEY',         'jsf{cxCy3F[h`cZ5Bol6/a?[mH~p!:VUgn~Z9A~7B@{|ho-n&&RoV2qT8-xTGpY>' );
define( 'SECURE_AUTH_KEY',  'pN1Ulj3nwK1Mm#;))LdC78dn$hY>NMwT/Kg{;p{z?AC 9-OUl+>,^eOkr0gG[?0p' );
define( 'LOGGED_IN_KEY',    'NYK[*V?MI 2Ue#2sFl&E5/@MHN>4X8{*END,$>Qck(hr+{if4u{gnB/zX/)1uJ+)' );
define( 'NONCE_KEY',        '6l2I0ST$ t+AK[q`yS}~AeB:RyXhGx/B6~Gs|V?E&;t?C|8D8vCXH g{DkY9@[1n' );
define( 'AUTH_SALT',        ',qUv}lv{wGh^jI$bK[N~/>tGnKziPEG.0cw fDqk~0[-;]~-ncIt`j*=hcdvM3,s' );
define( 'SECURE_AUTH_SALT', 'Ny(h4l7vw~h87U^;GRQg2nO@KW(/Sci&.g2.A&N6McqG;rbFOU{AF.IzZstL3S7{' );
define( 'LOGGED_IN_SALT',   'pq[QkeAt#E[]N`h.S>3nORnU?|62;V /j831 |f7(k;I:.i##/J]DC.rIegY26cj' );
define( 'NONCE_SALT',       '2b<Ic@ks@IpSz%?(z7&+41>{N(1C8Wjb8{$=1}-Q%z%|H2[pI_GeiHY Vc<D@f?S' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

define('FS_METHOD','direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
