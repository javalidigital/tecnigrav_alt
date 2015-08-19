<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'tecnigrav_alt');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'tecnigrav');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'tecnigrav2015');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Eck*pP+,O9Liu!W/y-pkUwQ]b3mf4Y9-DJ/UK+yQ_+(.*@Ow;[}Jd}~-}vl@W*6:');
define('SECURE_AUTH_KEY',  '!/|~W$oM`=rA>+IsMM5#F92w?-cxVq9kD@VNQDd9zYAre+F}Kw=;J`n4?_-H&E4-');
define('LOGGED_IN_KEY',    '*uK:SNl++}OvIuD:yWJ^*;JBtEimVL{u)lSQL}^K]y7,HZT06#N-x`&YW=RK7A(^');
define('NONCE_KEY',        'L^cJ%e(Ah:adG:h74JeF4HT9b4U9OEYv-$[V]vJht%X~_&x_monX|X:B$1$CV[|r');
define('AUTH_SALT',        'O}>V:S9T~c~~[J%Jt}?HD1A SY[PjPB8^t+2xaW,0T+}8%c$vWxg5ohe<#RD*e/J');
define('SECURE_AUTH_SALT', 'JtoT7-8ET+43 rr&6iLYie-0=FSC&qKL|1Q>L_]H_kybBi3S3@=cW&Ktyi_.)U:z');
define('LOGGED_IN_SALT',   ' T3B|$I}TX,%Rxhcnb/V|@ y&&b)y1xO)XcFwB*y{,.Mf1<u)#p:FbeaxqRILDV?');
define('NONCE_SALT',       'D)KW,O49[<v&Xcx*u~{_=TQ[TMrqR{O;PXQ0%`o8k)q=#dSyKx8+du<A!gsaVURN');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
