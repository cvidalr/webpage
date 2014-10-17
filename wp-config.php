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
define('DB_NAME', 'allers');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'naZFyd^ppnzL$c#rWOaNjcZ@|Sjj@qC-Q~)EqEV.0K0Hsto7K$O[M14r)sP6w`RF');
define('SECURE_AUTH_KEY',  'QTE.14{%J*{a-0>IA|,$^6iYf/_Ef=a9r <Jcj)!Er&=0)*ETy$vQ_d2(mi5FbP3');
define('LOGGED_IN_KEY',    'hY?)F.7H2F=}t#XQ)an_>[;9{I [7~S|t=nl{/t+?*EBJHYBD~ILL+8)LB>W(,fc');
define('NONCE_KEY',        '9yI V5!?8YN-MZmvhb/}MEg{&DT3cj?AhP>tp!c[`$au*#.L0.8s49H>.h!EWHV+');
define('AUTH_SALT',        'E{p#A?}xY>Ysf8pTWkRK_r[jJrS~6Wq$L*hhMSU&<,^M?95*#qZb)#x]D@S##l;]');
define('SECURE_AUTH_SALT', 'r,*U~9)M[2.a[JXu3THz?:}MG)ae2Vodi!tEQ+k>H|]d~sy@Sy&Ruqh0HT3;Q/Vu');
define('LOGGED_IN_SALT',   '0H6g8B>S4z-:NFFejKoZL&gU9++O8&M,@qDPGHR$DwbR/e UAZGiuXN)!^aN_,s&');
define('NONCE_SALT',       ')QB3i2G3}0y94-OHSJm.?dfLp&UDAK#P9a5Y(dr|WRTP=C$f*,?G|X4/+KENQqQ4');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'z2awtnmj7_';

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
