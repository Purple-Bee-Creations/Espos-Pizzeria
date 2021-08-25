<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'espoi7jHRQ5sZ1h2');

/** MySQL database username */
define('DB_USER', 'espo891YXYmB37bZ');

/** MySQL database password */
define('DB_PASSWORD', 'espob&Iqx0HPOJ#l');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('DISABLE_WP_CRON', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0YxRFB5F1jqGZzfBk98Uu0Cs9Vze0Virhxkrhg2xqwadDmuYJ6DylAvqNLWgcKX1');
define('SECURE_AUTH_KEY',  'YFT7RtLVN1o2koTJZGBgGno95HKe50KV1SiiHZtVXsLMQpxzb7UZEu6F9fHv0sJ0');
define('LOGGED_IN_KEY',    '6U6D7wh8saoi11aLis8IpuhkuEKu2ReFIaKkiImMkKnsXFdwkLumuLzeqodx7wEB');
define('NONCE_KEY',        'N7e0FK3j3tVNcdIcVHqgGEdkw1ZSBAyrfeps32gOOzseHz4PYzc1lSBDsyI4P5BH');
define('AUTH_SALT',        'BCdU8jaXeKd4MNdh2Bsnus13CXaS09Ikx16iwC5gQvwLNr6sHDecrkCpfuGpPss2');
define('SECURE_AUTH_SALT', 'F9xQodnNtrFL1MlybFMYst344XREwG4R96LtT9Srck3H74iAd5gru8DVfBNncvjY');
define('LOGGED_IN_SALT',   'GCnkL7MQI0Q7vgOzwKuKl7dI5Z5xUc8AcGu1YRmM7GRY7LYYzsPbv5V6O17qnHmN');
define('NONCE_SALT',       'bDntSMfZG0ApVkYzrZ5VKVTu9iB1hXiqIeKDkpHuzTKcxlsyOzRhL78sVBW23ABg');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
