<?php
defined('APPLICATION_ENV') ||
    define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);
define('BASE_PATH', dirname(realpath(__FILE__)));

define('LIBRARY_PATH', BASE_PATH . DS . 'library');
define('APPLICATION_PATH', BASE_PATH . DS . 'application');
define('CONFIGS_PATH', BASE_PATH . DS . 'configs');

define('VAR_PATH', BASE_PATH  . DS . 'var');
define('TMP_PATH', VAR_PATH  . DS . 'tmp');
define('CACHE_PATH', VAR_PATH  . DS . 'cache');
define('LOG_PATH', VAR_PATH  . DS . 'log');
define('SESSION_PATH', VAR_PATH . DS . 'session');

set_include_path(implode(PS, array(get_include_path(), LIBRARY_PATH)));