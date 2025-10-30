<?php
/**
 * WordPress Configuration for Vercel + Neon
 * Optimized for serverless deployment
 */

// Enable WordPress cache for better performance on Vercel
define( 'WP_CACHE', true );

// Database Configuration for Neon PostgreSQL
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?? 'netjag_wordpress' );

/** Database username */
define( 'DB_USER', $_ENV['DB_USER'] ?? getenv('DB_USER') ?? '' );

/** Database password */
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD') ?? '' );

/** Database hostname - Neon connection */
define( 'DB_HOST', $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?? '' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

// SSL Configuration for Neon
define( 'DB_SSL', true );

/**#@+
 * Authentication unique keys and salts.
 * 
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 * These should be stored as environment variables in Vercel for security.
 */
define( 'AUTH_KEY',          $_ENV['AUTH_KEY'] ?? 'kuF)OyLq&LL1,Yz~X_X23?)V8|/g0^~fk(WWBl3}H/qj*ft&5v7)E6:fpt:mBIi>' );
define( 'SECURE_AUTH_KEY',   $_ENV['SECURE_AUTH_KEY'] ?? 'q,15j.{XE=Jiwt)-/$}4sQ_Bu:R*P93nPLmmyjyeoIl<9`*(Ex=GfYG*:e5OB<cA' );
define( 'LOGGED_IN_KEY',     $_ENV['LOGGED_IN_KEY'] ?? '(J((A^v&R2-3<kq(rd=&/qXJPiU&/_gmh#1nCb8%=6bI0-62HXPmMabVlD-PttBb' );
define( 'NONCE_KEY',         $_ENV['NONCE_KEY'] ?? 'l#/C+lvCt1e6q[}G<ivE>DALFhuaa=~Ord?yW~t$+y]/SFr(yL/^=;_D<hw<as|a' );
define( 'AUTH_SALT',         $_ENV['AUTH_SALT'] ?? '+5mb0F@?Y1(4l[X{6AA;cwKo5,B1o%j0[tBnE;g6<<lw!JS!dMwNCWkIFGdJMQl_' );
define( 'SECURE_AUTH_SALT',  $_ENV['SECURE_AUTH_SALT'] ?? '7K3HsHh~5ELX|U:yYO.TTZrbuQB3y,hY_5ub-4x:l<&X&2!fS[EpszHx@QLV|~|J' );
define( 'LOGGED_IN_SALT',    $_ENV['LOGGED_IN_SALT'] ?? '|*GeqT+bY)Ezepg7DNpgFiM2m.(uTTRy*t56F^3$N?L)BRZWB}?2GFZPJCQAm(8C' );
define( 'NONCE_SALT',        $_ENV['NONCE_SALT'] ?? 'u^tyo[NghFW`>uMS{vG.|:mWsNk;w2HxD{wgec}4_t?C-I0j`-V,Ac6vPf#86!r$' );
define( 'WP_CACHE_KEY_SALT', $_ENV['WP_CACHE_KEY_SALT'] ?? 'G$fw?%Xz5$]^XEx=>;nXD.@xK^@syVD)&v1pdHf:54^IwX{B3wcDygHf{MaMmyp@' );

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

// ** Vercel-specific configurations ** //

// Site URL configuration for Vercel
define( 'WP_HOME', $_ENV['WP_HOME'] ?? getenv('WP_HOME') ?? 'https://your-vercel-domain.vercel.app' );
define( 'WP_SITEURL', $_ENV['WP_SITEURL'] ?? getenv('WP_SITEURL') ?? 'https://your-vercel-domain.vercel.app' );

// Force HTTPS on Vercel
define( 'FORCE_SSL_ADMIN', true );

// Disable file editing in WordPress admin for security
define( 'DISALLOW_FILE_EDIT', true );

// Optimize for Vercel's serverless environment
define( 'WP_MEMORY_LIMIT', '512M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

// File system method
define( 'FS_METHOD', 'direct' );

// Cookie configuration
define( 'COOKIEHASH', '87d730926efd31544527af7284ae05b5' );

// Auto-updates
define( 'WP_AUTO_UPDATE_CORE', 'minor' );

// Debug settings - disable in production
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

// Disable WordPress cron for Vercel (use external cron service)
define( 'DISABLE_WP_CRON', true );

// Increase timeout for external requests
define( 'WP_HTTP_BLOCK_EXTERNAL', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/public_html/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';