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
define('DB_NAME', getenv("WP_DB_DB"));

/** MySQL database username */
define('DB_USER',getenv("SIL_DB_USER"));

/** MySQL database password */
define('DB_PASSWORD',getenv("SIL_DB_PASSWORD"));

/** MySQL hostname */
define('DB_HOST', getenv("SIL_DB_HOST"));

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
define('AUTH_KEY',         'RpViZSkf%$Ez3msm+f6;%m+Rjd]J{p<L5}.,zd$*Ku=j<[6;VXa/kC>FH(VqtF$a');
define('SECURE_AUTH_KEY',  '? 0CLULcSx-[`(]z~;t#*Xp/m0FqpQ5)XiZ5`s0G.(1vbo8&8y1m!2m<+<p$p8[[');
define('LOGGED_IN_KEY',    'EXr@TMU@N4<yjnj_Nx/xS;z8]r,?.h^;lBMIwRoC&8y*_a}8i,N-qhpHOTSJSk}m');
define('NONCE_KEY',        'qvx_?oLTs?7 |A6 ?Eh.%hmlLn>Pv-F}f.l?,>q(g%V}w/h>cgU/.R-$[$.t{QYE');
define('AUTH_SALT',        'L9U%[Hc4HjJ=~/e~a)L;o1;.PrYDLwJJ;7r8Nc?st8M{nH/`fXQ6g2p[A}lSDDnZ');
define('SECURE_AUTH_SALT', '[@q{(feSo!^dnQ;@nGcH4[w?lJn/U~1#M_gOvbEN@_e&9lm)T_N%=g{8+_&]q/Ve');
define('LOGGED_IN_SALT',   ' hz[M3cP0X4mOXF}Wt;yG:KKoQkY>,RGx#gBG(59[y{>xQ57v[|PwJ}ud6E=4.a*');
define('NONCE_SALT',       '#rIYtI:<QhNn{kJhy5{X8L4ODL7= vgBFO_7om;/eIODAx)9v7PcVc@_[<@I9aL:');

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

if (!session_id())
    session_start();

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
