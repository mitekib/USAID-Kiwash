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

/*
 * cPanel & WHM® Site Software
 *
 * Core updates should be disabled entirely by the cPanel & WHM® Site Software
 * plugin, as Site Software will provide the updates.  The following line acts
 * as a safeguard, to avoid automatically updating if that plugin is disabled.
 *
 * Allowing updates outside of the Site Software interface in cPanel & WHM®
 * could lead to DATA LOSS.
 *
 * Re-enable automatic background updates at your own risk.
 */
define( 'WP_AUTO_UPDATE_CORE', false );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kiwashad_kiwashdb');

/** MySQL database username */
define('DB_USER', 'kiwashad_wp');

/** MySQL database password */
define('DB_PASSWORD', 'Q4OdRd!');

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
define('AUTH_KEY',         '6WLGt5r6LebAnKkHu2JE30v6RnJqMjIxJMXSc8k3dYcaarNVwddVmjwC0YoEdShZ');
define('SECURE_AUTH_KEY',  'THqcDBOBXlyKdkgIpIKdv4weeF0KSJLO7xw9B1BG1ZzvcYTAt3aHbWMX6EwvHq_3');
define('LOGGED_IN_KEY',    's0lIwJN41JnEFRUwsyPLPbyy6DmjZSoFHQ5xWP1wfqyXXK8fz41AgquWyvr9iqiw');
define('NONCE_KEY',        'sjTI1JKGPfTC79LPTtLB7MjcxJ7RGmVeVjKmVkGq3DDsYIeYgZjjCkXodjuqN8nU');
define('AUTH_SALT',        'X2MiAK5dAO2cyT8Y2ihPpV3a5roNaxxwCVZZAfRp2mMeIWpUBlrCvzASJd8MZsu4');
define('SECURE_AUTH_SALT', 'FYtip2BDq7RnymH5v15NapQIpTvCU_F2mstFYLWLCfBsyNmLDzHUrIW0pKVEDDyV');
define('LOGGED_IN_SALT',   '4bGcbt2AyRGgqkBTkxYzHUDPpqOIDHK8WBTlUU_7SO1M9c4OaIhbx5WArERZCbSM');
define('NONCE_SALT',       'hiXdHzG2WbcC9gpRmbVNLZFTOqSFpb5MvV_GDpOXHFxnVYzcmO5Zr_So9dYaDH_3');

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
