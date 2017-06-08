<?php

define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', 'leappsa');
define('URL_INDEX_FILE', 'index.php' . '/');

if (defined('URL_SUB_FOLDER')) {
    define('URL', URL_PROTOCOL . URL_DOMAIN . '/' . URL_SUB_FOLDER . '/');
    define('URL_WITH_INDEX_FILE', URL_PROTOCOL . URL_DOMAIN . '/' . URL_SUB_FOLDER . '/' . URL_INDEX_FILE);
} else {
    define('URL', URL_PROTOCOL . URL_DOMAIN . '/');
    define('URL_WITH_INDEX_FILE', URL_PROTOCOL . URL_DOMAIN . '/' . URL_INDEX_FILE);
}