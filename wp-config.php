<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file definisce le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabella, Chiavi Segrete, Lingua di WordPress e ABSPATH.
 * E' possibile trovare ultetriori informazioni visitando la pagina: del
 * Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni per
 * MySQL dal proprio fornitore di hosting.
 *
 * Questo file viene utilizzato, durante l'installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web,è anche possibile copiare questo file in "wp-config.php" e
 * rimepire i valori corretti.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - E? possibile ottenere questoe informazioni
// ** dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'dimecasa19694');

/** Nome utente del database MySQL */
define('DB_USER', 'dimecasa19694');

/** Password del database MySQL */
define('DB_PASSWORD', 'dime26501');

/** Hostname MySQL  */
define('DB_HOST', 'sql.dime-casa.it');

/** Charset del Database da utilizare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione del Database. Da non modificare se non si ha
idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * E' possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * E' possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{`1iXK6=3I%=e&$|#v4+cNT4S}09zU`kg%9;NHUJzClIaum+C,DITz+C7+6H4@Qm');
define('SECURE_AUTH_KEY',  ':EtZ#E_bxg.C<<jWIQ-H3](4hKBp7t(b?L1FF8Rt}vHNH?_BMx0!P>H8 ^4:!~_:');
define('LOGGED_IN_KEY',    '@Qbkd_tsU1lVE$;`-N}lR2Q%Dl <u,nf_%e,leM`},_]`A_<>tf@94;IEjl2ws5>');
define('NONCE_KEY',        'Jq.HjRwk$I-=V-_=_GACjd8F&?h).na^;8l-0?#D2PuDi%}![$LA)9zuh_(8/p|c');
define('AUTH_SALT',        '#6hAp5FQ{oObOE(>qXPPHh/TM8JVrAY:YiV0TltnNxr6YVnnyFH6`{?Bb1z9+ES2');
define('SECURE_AUTH_SALT', 'zp>nGaeiE|>kZo|A1Q@o?|nRJ8?L`!45YR8F<OP-#d-xn|p*!P<yiuzp]DN$m=TM');
define('LOGGED_IN_SALT',   'sz#ogLl.c@C<.wWQ-;E`-psrN5Eo-1|)}tJ+fhWOPgyDw0-+k(~.:KP *v5N6FA4');
define('NONCE_SALT',       'KEN.]*X)(X=6[K_Tthu%Wo6pQgQ}XF-R6#t@?e2i|4T>REgeV|+jUZ|)/ZD]sP?a');


/**#@-*/

/**
 * Prefisso Tabella del Database WordPress .
 *
 * E' possibile avere installazioni multiple su di un unico database if you give each a unique
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Lingua di Localizzazione di WordPress, di base Inglese.
 *
 * Modificare questa voce per localizzare WordPress. Occorre che nella cartella
 * wp-content/languages sia installato un file MO corrispondente alla lingua
 * selezionata. Ad esempio, installare de_DE.mo in to wp-content/languages ed
 * impostare WPLANG a 'de_DE' per abilitare il supporto alla lingua tedesca.
 *
 * Tale valore è già impostato per la lingua italiana
 */
define('WPLANG', 'it_IT');

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * E' fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all'interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta lle variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
