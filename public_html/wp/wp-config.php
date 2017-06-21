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
define('DB_NAME', 'shaheedo_wp875');

/** MySQL database username */
define('DB_USER', 'shaheedo_wp875');

/** MySQL database password */
define('DB_PASSWORD', '7]44pBS-zR');

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
define('AUTH_KEY',         'yrpwywd1szuet9qxngefb1ctkdrnirkduaape2ln0nejfght9h00mas8zohbglp0');
define('SECURE_AUTH_KEY',  'skj3tgyipegy5pxpog2scxv8mrnu233c1qal6qn6hptepshologkj72fdailszue');
define('LOGGED_IN_KEY',    'akrmpvc7zv8m0eihooj1rhif3n6mehz7rhlyfuj7ky6zeis3omooo1ft1cndkudc');
define('NONCE_KEY',        'tqseyuplvoiq6gnduuqzkzaxrpn8j8bpqb0piei5vi9zjfvctf10bh0h0qtcbj1f');
define('AUTH_SALT',        'uv0nntpuxebetbvi9fr7vcrgo4vwvnukrz91bi7ini5jz6k4adtzhwxbqit2liki');
define('SECURE_AUTH_SALT', '2o8v1wgywgiqurpnwfvbygn7ztcvzd9eg1mevqg4p0owgivhaknwskzqwpe0vodg');
define('LOGGED_IN_SALT',   '5muyhe8nsfiedrl9oukjttyxjhscpvus8ydswxdn4bdzmz9uqs8ptiktrqdrsodd');
define('NONCE_SALT',       'dyhevvs2rt8re4ffo7zj78y9omzd71ugnz3g6ivxolepjpkebslxazjasvdqulcd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpvy_';

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
