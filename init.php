<?php
namespace Test;

require_once(realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php'));

use Smarty;
use mPDF;
use \Simplon\Mysql as Mysql;

$dbConn = new Mysql\Mysql(
    'localhost',
    'user',
    'password',
    'database',
    $fetchMode = \PDO::FETCH_ASSOC,
    $charset = 'utf8',
    array('port' => 4040)
);

$sqlManager = new Mysql\Manager\SqlManager($dbConn);
