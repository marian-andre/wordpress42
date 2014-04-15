<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'db_mandre');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'db_mandre');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'mandre');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         's}1dP%x55Np3~*#ux=&S$n@57q39z&<N*_C :+MLPQIFQc5zR}>h]j&>>yd$Qq&s');
define('SECURE_AUTH_KEY',  'x%Oa+C&<6SU^A5$s;|.FFy,yPI0]|Zh^6|zIy#|8-Q$2NQdUc3g}}jqR,u~^KM*P');
define('LOGGED_IN_KEY',    '-UIcrq-#d)-.fqj1asn$QzfM 3(]WsCH ,@>xFq!#b*#]SaHC4s.L/|sPnOt/qu$');
define('NONCE_KEY',        'xr+j9t98cnz#}E1M9+FlY9`~mfH4C1[nHH|!B>(V-Tyg1KYRLSZ3|+O4RvW2{9Hx');
define('AUTH_SALT',        'u!qgVSwa],(;X-RT{fT*Iux<l}U-,.<7<C*&|mD#@+DyoH-WG) eIe=D.n@SFR|R');
define('SECURE_AUTH_SALT', '*xJf|.DBaEVZLKtR7ZqkP!V:fYcgk[w`%6{`2jeqv;,+I+i|K(Rbz00.d^4XLyB)');
define('LOGGED_IN_SALT',   'rN(>U7fY6Qy)ZOr(0,AB yo|+3AJ}x3v:5!}r7.ldJc;e1TSd#;+NVu[B?HXXOb@');
define('NONCE_SALT',       'wt<MVB2sC}M^:3V?Oe#(khV@Bj!}GGt`E/J<^Z:q-gBa~!~?hX(,d}8qs;E]zUyt');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');