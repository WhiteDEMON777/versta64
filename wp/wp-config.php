<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', '3006162-versta');


/** Имя пользователя MySQL */
define('DB_USER', 'root');


/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');


/** Имя сервера MySQL */
define('DB_HOST', 'localhost');


/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%Xg2+EK-]/mZpV??lfOzX,BV]UM*X1M3|MWjWwEw/.<Ey$lBJ%qu(S]BK]9scXRc');

define('SECURE_AUTH_KEY',  'xKf*)?Q%0qRA54MAW9W/~8++xziVvUVj.[C`ho?H/oC:7h})S/~I} $}?^Pn(qw1');

define('LOGGED_IN_KEY',    '|_VlkLaF{ZBLZKIbPvnP@ob3G0wKFg&.zaL?B1FAU(} c1V+A.3e!P5g^g<0FN`/');

define('NONCE_KEY',        '4#^:VfFo;,?4PB2=S-Nl65PJJ6QH(es)i<(T! 8^o/?0hAaSgQ~kLX5Z(5d`wQyQ');

define('AUTH_SALT',        '(7FJ$HR4P{TX}]QCI_QK6!v86^QUUahiT,+QzR }0.13MhZ}`2)|DAA:U[7&C/kX');

define('SECURE_AUTH_SALT', ')R+`3;!m q&0V/hZ5C>S1y|OHaI) JZ~Ym=gZD?w!^>+|kOs8![kZeFJ?gea~Sxe');

define('LOGGED_IN_SALT',   'F?R9BTxxBp@3:YLXMr5BA^o.[})3:@gJMu407bJ9/fC/ TT.#|Mry%w^Ywy<u^Vi');

define('NONCE_SALT',       'FIQ25&N1^qi VM7oUDXa|;-/A.=_a<p(W&C)KQPXKC8@d6]{}YX Wgh3= {(1|v?');


/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';


/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
