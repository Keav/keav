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
define('DB_NAME', 'keav_trinity');

/** MySQL database username */
define('DB_USER', 'keav_neo');

/** MySQL database password */
define('DB_PASSWORD', '+L5~~x}g=hn_');

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
define('AUTH_KEY',         'iL9]IW,Cmg<P$Es@JOZU)w/4_rJ7~G/sT*H/e24&v?`=&h#Fo_,eM5IHE;Lj;FdA');
define('SECURE_AUTH_KEY',  '$ja|.[@B_S(+@m0sA`wQf_tC6v-ed!tEfT@}-|Qf6U`u`#*uI%qlx,w [$vSl$-m');
define('LOGGED_IN_KEY',    '5W}`-h.AVvJ7/>,)_.8Mdca]!Lj:+!m2 *p>qb)4OJTNym>hbp;_S }!]%@m2k5P');
define('NONCE_KEY',        'OSC%Cd2evd/!|Cb(JJlpU}4RR+BWq$C1CsY,#rK/mr198H+-+lKm=R`sc:yXi:/4');
define('AUTH_SALT',        'P~HhCIUisgp|wX0zK;3JQ]&+1clx_:ZivkHB|U25d82z-_]4p<-p*Z U-D:{!|ei');
define('SECURE_AUTH_SALT', 'e`_9e]GI]WgPr:WUZ`Xg+YL{W:ofip|FF%uw-Tv7Km%/Zq)4z`(sYuGs[q<<;RPS');
define('LOGGED_IN_SALT',   '|{y*1=LG:V_oc#,UDtj|dX9eb9.+Kq}4W)+~skC^j<FD$Vz^fj+kTj{v9CFazH<-');
define('NONCE_SALT',       '8)%W15H_n0`_%8}`><f6(,v>L]HVlk9)tE_+@vw/-InZp#RF(A`Z6XO|/<}*ZO7d');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'kvwp_';

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
