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
define('DB_NAME', 'casino_site');

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
define('AUTH_KEY',         'J6u+q3^`chnWq*nqb~Z%#16<7&18gYd*l7vhWr6x+C`)@UyIA0!zZOJqCgD=jGP&');
define('SECURE_AUTH_KEY',  'pKU[4w1<o{QVF]]tfk,$l+y0A61!zU/K-p)6@A)K>^XAPGvgNQxvH*n@3y?n*3>b');
define('LOGGED_IN_KEY',    'r2ykQLN7]d(=B:uC9P</.&[(+i%a(zSsMK:yElMN/SoOw9uUem^aqny2tCBq =5r');
define('NONCE_KEY',        '%6ae})IGhVVo]_azNLRP$c/>7p_&hC/c]{XFijwsri8f!SU4een6qe<_zSHiwf[~');
define('AUTH_SALT',        'y*<R=qhNF3Wnr39fSL(#dvi+7GHamO6-#yS?.!U {[i?-UDwn?1heb|Ds=&MOxFc');
define('SECURE_AUTH_SALT', 'zGhVyP9q!|:4PosFZ$aZ$Bvc365>):nkinN7Xmn%%/@-$}Fi_|42hWyepHz7Hrny');
define('LOGGED_IN_SALT',   ',KV.OjTRQMRVU3c 8RWjD=&Zx/6eLUcwf8%q|&<Mk.[X[HW6@h`-j6!} ]#@dDU~');
define('NONCE_SALT',       '[JGJpm4F1k?6)c7N~D,{PK/#!3kay;)YvV3AD!M;Hhzj:K^K}VDPg~DU#P 23N!t');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cswp_';

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
