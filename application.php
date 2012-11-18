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

/**
 * Here, we run the initial checks for the application.
 */
Initial_Check::paths();

/**
 * Initial check class
 */
class Initial_Check
{
    public static function paths()
    {
        $pathNeedWrite = array(
            VAR_PATH,
            TMP_PATH,
            CACHE_PATH,
            LOG_PATH,
            SESSION_PATH,
        );

        $errorPaths = array();
        foreach ($pathNeedWrite as $path) {
            if (!is_writable($path)) {
                $errorPaths[] = $path;
            }
        }

        if (isset($errorPaths) && count($errorPaths) > 0) {
            $command = 'Fatal Error: some paths were not writeable:' . PHP_EOL;
            $linux = '';
            foreach ($errorPaths as $path) {
                $command .= $path . PHP_EOL;
                $linux .= 'chmod 777 ' . $path . PHP_EOL;
            }
        }
        if (isset($command)) {
            header('Content-type: text/plain');
            echo $command . PHP_EOL;
            if ('WIN' != strtoupper(PHP_OS)) {
                echo 'In linux, you could fix this by running the following commands:' . PHP_EOL;
                echo $linux;
            }
            exit(255);
        }
    }
}